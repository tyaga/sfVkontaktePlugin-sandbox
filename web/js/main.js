DEBUG = true;
var app = new vkApp( function() {
	$('#content').show();
	main_tab();
}, { mandatory_settings: Settings.FRIENDS | Settings.NOTIFY | Settings.PHOTOS | Settings.STATUS } );

function main_tab() {
	$('.tab').hide();
	$('#main-tab').show();

	$('#userinfo').html(
		app.User.first_name + ' ' +
		app.User.last_name	+ ' ' +
		app.User.bdate + ' ' +
		'<br/><img src="'+app.User.photo_big+'"/>');
	app.resizeWindow();
}
/**
 * send notice functions
 */
function secure_tab() {
	$('.tab').hide();
	$('#secure-tab').show();
	app.resizeWindow();
}
function send_notice() {
	$.get(Urls.notice, { 'message': $('#notice-message').val() }, send_notice_success);
}
function send_notice_success(data) {
	$('#notice-result').html(data);
}
function activity_tab() {
	$('.tab').hide();
	$('#activity-tab').show();
	// get activity
	VK.api('activity.get', {}, function(data){if (data.response){
		var date = new Date(data.response.time*1000);

		$('#activity-result').html(
				date.getDay() + '.' + date.getMonth() + '.' + date.getYear() + ' ' +
				date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()+
				' <b>' + data.response.activity + '</b>' );
	}});
	app.resizeWindow();
}
function image_tab() {
	$('.tab').hide();
	$('#image-tab').show();
	// get your albums and fill select tag
	VK.api('photos.getAlbums', {}, function(data){if (data.response){
		str = '<option value="0">select the album</option>';
		for (var i in data.response){
			str = str + '<option value="' + data.response[i].aid + '">' + data.response[i].title + '</option>';
		}
		$('#albums').html(str);
	}});
	// make it more beautyful
	$('#albums').change(function(){
		if ($(this).val() != 0) { $('#album-title-container').hide(); }
		else { $('#album-title-container').show(); }
	});
	$('#album-title').keyup(function(){
		if ($(this).val() != 'sfVkontaktePlugin album') { $('#albums').hide(); }
		else { $('#albums').show(); }
	});
	// onclick event - upload photo
	$('#fire-upload-img').click(function(){
		var options = {};
		// if album entered
		if ($('#albums').val() == 0) {
			options.album_title = $('#album-title').val();
		}
		// otherwise, album selected
		else {
			options.album_id = $('#albums').val();
		}
		// do upload
		app.upload_photo(function() {
			$('#image-result').html('Image uploaded');
		}, options);
	})
	app.resizeWindow();
}
function wall_tab() {
	$('.tab').hide();
	$('#wall-tab').show();

	$('#fire-upload-wall').click(function(){
		send_walls();
	});
	app.resizeWindow();
}

function send_walls() {
	var friend_ids = [];
	$('#friends :selected').each(function(i, selected){
		friend_ids.push($(selected).val());
		log($(selected).val());
	});
	var options = {
		uids: friend_ids,
		message: $('#wall-message').val()
	};
	app.post_walls(function(){
		$('#wall-result').html('Walls updated');
	}, options);
}