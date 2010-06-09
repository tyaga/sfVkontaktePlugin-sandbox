<div id="main-tab" class="tab">
	<h3>app.User properties</h3>
	<div id="userinfo">
	</div>
</div>

<div id="secure-tab" class="tab">
	<h3>Send notification to yourself</h3>

	Type message to send:<br/>
	<textarea id="notice-message">It works!</textarea><br/>

	<button onclick="send_notice()">Do send!</button><br/>
	<div id="notice-result">Result will appear here</div>

</div>

<div id="activity-tab" class="tab">
	<h3>Your current activity status</h3>

	<div id="activity-result">Result will appear here</div>
</div>

<div id="image-tab" class="tab">
	<h3>Send the image to the album</h3>

	<select name="albums" id="albums"><option value="0">You have no albums, create one.</option></select><br/>

	<div id='album-title-container'>
		or type the name of album to create: <br/>

		<input type="text" value="sfVkontaktePlugin album" id='album-title'/>
	</div>

	<h4>Click image to start upload!</h4>
	
	<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" id="fire-upload-img" style="cursor:pointer"/><br/>

	<div id="image-result">Result will appear here</div>

</div>

<div id="wall-tab" class="tab">
	<h3>Post message and image to your friends walls</h3>
	<select id="friends" multiple="multiple" style="width:400px; height:200px;">
		<option value="<?=$vkontakteUser->id?>">You</option>
		<? foreach($vkontakteUser->Friends as $friend ):?>
			<option value="<?=$friend->id?>"><?=$friend->first_name . ' ' . $friend->last_name?></option>
		<? endforeach;?>
	</select><br/>

	Type message to post:<br/>
	<textarea id="wall-message">sfVkontaktePlugin does work!!!</textarea><br/>

	<button onclick="send_walls()">Do send!</button>

	<h4>Click image or button to start post!</h4>

	<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" id="fire-post-wall" style="cursor:pointer"/><br/>

	<div id="wall-result">Result will appear here</div>

</div>
