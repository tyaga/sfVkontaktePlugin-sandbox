<div id="tabs">

	<ul>
		<li><a href="#tabs-main">User</a></li>
		<li><a href="#tabs-secure"">Secure</a></li>
		<li><a href="#tabs-activity"">Unsecure</a></li>
		<li><a href="#tabs-image"">Image</a></li>
		<li><a href="#tabs-wall"">Wall</a></li>
	</ul>

<div id="tabs-main">
	<h2>app.User properties</h2>

	<div class="description">The app object has User property, that contains fetched from VK profile fields. Let's show some of them!</div>

	<div id="userinfo">
	</div>
</div>

<div id="tabs-secure">
	<h2>Send notification to yourself</h2>

 	<div class="description">Secure method executes on the server, so type the text to send and press the button. AJAX request will be performed, and message will be sent. After sent notification you have to reload page (F5 button) to see it in the applications list.</div>

	<br/>Type message to send:<br/>
	<textarea id="notice-message">It works!</textarea><br/>

	<button class=fire-notice>Do send!</button><br/>
	<div id="notice-result" class="ui-state-highlight">Result will appear here</div>
</div>

<div id="tabs-activity">
	<h2>Your current activity status</h2>

	<div class="description">Unsecure methods executes on the client side, by performing VK.api function call. Now you can see your current activity status.</div>

	<div id="activity-result" class="ui-state-highlight">Result will appear here</div>
</div>

<div id="tabs-image">
	<h2>Send the image to the album</h2>

	<div class="description">The image is located on your server.</div>

	<select name="albums" id="albums"><option value="0">You have no albums, create one.</option></select><br/>

	<div id='album-title-container'>
		or type the name of album to find it by name or create it: <br/>

		<input type="text" value="sfVkontaktePlugin album" id='album-title'/>
	</div>

	<button class="fire-upload-img">Do send!</button>

	<h3>Click image to start upload!</h3>
	
	<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" class="fire-upload-img"/><br/>

	<div id="image-result" class="ui-state-highlight">Result will appear here</div>

</div>

<div id="tabs-wall">
	<h2>Post message and image to your friends walls</h2>

	<div class="description">The image is located on your server.</div>

	<?php if (count($vkontakteUser->Friends)):?>
		<select id="friends" multiple="multiple">
			<option value="<?php echo $vkontakteUser->id?>" selected="selected">You</option>
			<?php foreach($vkontakteUser->Friends as $friend ):?>
				<option value="<?php echo $friend->id?>"><?php echo $friend->first_name . ' ' . $friend->last_name?></option>
			<?php endforeach;?>
		</select><br/>

		Type message to post:<br/>
		<textarea id="wall-message">sfVkontaktePlugin does work!!!</textarea><br/>

		<button class="fire-post-wall">Do send!</button>

		<h3>Click image or button to start post!</h3>

		<img src="/sfVkontaktePlugin/images/uploads/test_upload.jpg" class="fire-post-wall"/><br/>

		<div id="wall-result" class="ui-state-highlight">Result will appear here</div>
	<?php else:?>
		<h3>RELOAD PAGE TO SEE FETCHED FRIENDS!</h3>
	<?php endif;?>

</div>

</div>