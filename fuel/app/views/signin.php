<?php if((int)Input::get("error", 0) === 1): ?>
<p class="error"><?= __("signin_failed"); ?></p>
<?php endif; ?>
<form method="post" action="" class="normal-form">
	<?= Form::csrf(); ?>
	<fieldset>
		<label for="email">Email:</label>
		<input type="email" required="" name="email" id="email">
	</fieldset>
	<fieldset>
		<label for="password">Password:</label>
		<input type="password" required="" name="password" id="password">
	</fieldset>
	<p class="center"><a href="/signup"><?= __('to_signup'); ?></a></p>
	<button type="submit" class="normal-button center"><?= __('signin'); ?></button>
</form>