<form method="post" action="" class="normal-form">
	<?= Form::csrf(); ?>
	<fieldset>
		<label for="title">タイトル:</label>
		<input type="text" required="" name="title" id="title" value="<?php if(isset($title)) echo $title; ?>">
	</fieldset>
	<fieldset>
		<label for="body">本文:</label>
		<textarea class="normal-textarea" required="" name="body" id="body"><?php if(isset($body)) echo $body; ?></textarea>
	</fieldset>
	<button type="submit" class="normal-button center">確定</button>
</form>