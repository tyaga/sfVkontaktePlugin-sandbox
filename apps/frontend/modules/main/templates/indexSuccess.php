<div id="main-tab" class="tab">
	<h2>app.User properties</h2>

	<div class="description">The app object has User property, that contains fetched from VK profile fields. Let's show some of them!</div>

	<div id="userinfo">
	</div>
</div>

<div id="secure-tab" class="tab">
	<h2>Send notification to yourself</h2>

 	<div class="description">Secure method executes on the server, so type the text to send and press the button. AJAX request will be performed, and message will be sent. After sent notification you have to reload page (F5 button) to see it in the applications list.</div>

	<br/>Type message to send:<br/>
	<textarea id="notice-message">It works!</textarea><br/>

	<button onclick="send_notice()">Do send!</button><br/>
	<div id="notice-result" class="ajax-result">Result will appear here</div>

</div>

<div id="activity-tab" class="tab">
	<h2>Your current activity status</h2>

	<div class="description">Unsecure methods executes on the client side, by performing VK.api function call. Now you can see your current activity status.</div>

	<div id="activity-result" class="ajax-result">Result will appear here</div>
</div>

<div id="image-tab" class="tab">
	<h2>Send the image to the album</h2>

	<div class="description">The image is located on your server.</div>

	<select name="albums" id="albums"><option value="0">You have no albums, create one.</option></select><br/>

	<div id='album-title-container'>
		or type the name of album to find it by name or create it: <br/>

		<input type="text" value="sfVkontaktePlugin album" id='album-title'/>
	</div>

	<h3>Click image to start upload!</h3>
	
	<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" id="fire-upload-img" style="cursor:pointer"/><br/>

	<div id="image-result" class="ajax-result">Result will appear here</div>

</div>

<div id="wall-tab" class="tab">
	<h2>Post message and image to your friends walls</h2>

	<div class="description">The image is located on your server.</div>

	<?if (count($vkontakteUser->Friends)):?>
		<select id="friends" multiple="multiple">
			<option value="<?=$vkontakteUser->id?>" selected="selected">You</option>
			<? foreach($vkontakteUser->Friends as $friend ):?>
				<option value="<?=$friend->id?>"><?=$friend->first_name . ' ' . $friend->last_name?></option>
			<? endforeach;?>
		</select><br/>

		Type message to post:<br/>
		<textarea id="wall-message">sfVkontaktePlugin does work!!!</textarea><br/>

		<button onclick="send_walls()">Do send!</button>

		<h3>Click image or button to start post!</h3>

		<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" id="fire-post-wall" style="cursor:pointer"/><br/>

		<div id="wall-result" class="ajax-result">Result will appear here</div>
	<?else:?>
		<h3>RELOAD PAGE TO SEE FETCHED FRIENDS!</h3>
	<?endif;?>

</div>
