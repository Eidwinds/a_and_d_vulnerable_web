<p class="center"><?= __("inquiry_message"); ?></p>
<form method="post" action="" class="normal-form">
	<fieldset>
		<label for="name"><?= __("name"); ?>:</label>
		<input type="text" required="" name="name" id="name" value="">
	</fieldset>
	<fieldset>
		<label for="email"><?= __("email"); ?>:</label>
		<input type="text" required="" name="email" id="email" value="">
	</fieldset>
	<fieldset>
		<label for="title"><?= __("title"); ?>:</label>
		<input type="text" required="" name="title" id="title" value="">
	</fieldset>
	<fieldset>
		<label for="body"><?= __("body"); ?>:</label>
		<textarea class="normal-textarea" required="" name="body" id="body"></textarea>
	</fieldset>
	<button type="submit" class="normal-button center"><?= __("confirm"); ?></button>
</form>