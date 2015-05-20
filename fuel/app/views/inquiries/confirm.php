<p class="center">お問い合わせ内容をご確認ください。</p>
<form method="post" action="" class="normal-form">
	<input type="hidden" name="name" value="<?= Input::post("name"); ?>">
	<input type="hidden" name="email" value="<?= Input::post("email"); ?>">
	<input type="hidden" name="title" value="<?= Input::post("title"); ?>">
	<input type="hidden" name="body" value="<?= Input::post("body"); ?>">
	<input type="hidden" name="kakunin" value="1">
	<fieldset>
		<label for="name">お名前:</label>
		<?= Input::post("name"); ?>
	</fieldset>
	<fieldset>
		<label for="email">メールアドレス:</label>
		<?= Input::post("email"); ?>
	</fieldset>
	<fieldset>
		<label for="title">タイトル:</label>
		<?= Input::post("title"); ?>
	</fieldset>
	<fieldset>
		<label for="body">内容:</label>
		<?= nl2br(Input::post("body")); ?>
	</fieldset>
	<button type="submit" class="normal-button center">送信</button>
</form>