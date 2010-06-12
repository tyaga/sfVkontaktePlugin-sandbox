DEBUG = true;
$(function() {
	init_loader();
	show_loader();
	app = new vkApp( function() {

		$('#content').show().tabs({select: function(event, ui){
			[main_tab, secure_tab, activity_tab, image_tab, wall_tab][ui.index]();
			//tab_callbacks[ui.index]();
			app.resizeWindow();
		}});
		hide_loader();

		$('button').button();

		main_tab();

	}, { mandatory_settings: Settings.FRIENDS | Settings.NOTIFY | Settings.PHOTOS | Settings.STATUS } );
});

function main_tab() {
	$('#userinfo').html(
		app.User.first_name + ' ' +
		app.User.last_name	+ ' ' +
		app.User.bdate + ' ' +
		'<br/><img src="'+app.User.photo_big+'"/>');
}
/**
 * send notice functions
 */
function secure_tab() {
	$('.fire-notice').click(function(){
		$.get(Urls.notice, { 'message': $('#notice-message').val() }, send_notice_success);
	});
}
function send_notice_success(data) {
	$('#notice-result').html(data);
}
function activity_tab() {
	// get activity
	show_loader();
	VK.api('activity.get', {}, function(data){if (data.response){
		var date = new Date(data.response.time*1000);

		$('#activity-result').html(
				date.getDay() + '.' + date.getMonth() + '.' + date.getYear() + ' ' +
				date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()+
				' <b>' + data.response.activity + '</b>' );
		hide_loader();
	}});
}
function image_tab() {
	// get your albums and fill select tag
	show_loader();
	VK.api('photos.getAlbums', {}, function(data){if (data.response){
		str = '<option value="0">select the album</option>';
		for (var i in data.response){
			str = str + '<option value="' + data.response[i].aid + '">' + data.response[i].title + '</option>';
		}
		$('#albums').html(str);
		hide_loader();
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
	$('.fire-upload-img').click(function() {
		show_loader();
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
			hide_loader();
			$('#image-result').html('Image uploaded');
		}, options);
	})
}
function wall_tab() {
	$('.fire-post-wall').click(function(){
		show_loader();
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
			hide_loader();
			$('#wall-result').html('Walls updated');
		}, options);
	});
}

function show_loader(){
	$("#loading").width($(document.body).innerWidth()).height($(document.body).innerHeight()).css({display: 'block'}).animate({'opacity': 0.7}, 'fast');
}
function hide_loader() {
	$("#loading").css({'opacity': 0, 'display': 'none'});
}
function init_loader(){
	$("#loading").bind("ajaxSend", function() { show_loader(); }).bind("ajaxComplete", function() { hide_loader(); });
}
