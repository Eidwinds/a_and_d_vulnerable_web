<p class="center"><?= __("inquiry_message2"); ?></p>
<form method="post" action="" class="normal-form">
	<input type="hidden" name="name" value="<?= Input::post("name"); ?>">
	<input type="hidden" name="email" value="<?= Input::post("email"); ?>">
	<input type="hidden" name="title" value="<?= Input::post("title"); ?>">
	<input type="hidden" name="body" value="<?= Input::post("body"); ?>">
	<input type="hidden" name="kakunin" value="1">
	<fieldset>
		<label for="name"><?= __("name"); ?>:</label>
		<?= Input::post("name"); ?>
	</fieldset>
	<fieldset>
		<label for="email"><?= __("email"); ?>:</label>
		<?= Input::post("email"); ?>
	</fieldset>
	<fieldset>
		<label for="title"><?= __("title"); ?>:</label>
		<?= Input::post("title"); ?>
	</fieldset>
	<fieldset>
		<label for="body"><?= __("body"); ?>:</label>
		<?= nl2br(Input::post("body")); ?>
	</fieldset>
	<button type="submit" class="normal-button center"><?= __("send"); ?></button>
</form>