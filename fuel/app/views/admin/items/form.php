<form method="post" action="" class="normal-form" enctype="multipart/form-data">
	<?= Form::csrf(); ?>
	<fieldset>
		<label for="is_public">公開:</label>
		<input type="checkbox" name="is_public" id="is_public" value="1" <?php if(isset($is_public) && $is_public == 1) echo "checked"; ?>>
	</fieldset>
	<fieldset>
		<label for="name">名前:</label>
		<input type="text" required="" name="name" id="name" value="<?php if(isset($name)) echo $name; ?>">
	</fieldset>
	<fieldset>
		<label for="price">値段:</label>
		<input type="text" required="" name="price" id="price" value="<?php if(isset($price)) echo $price; ?>">
	</fieldset>
	<fieldset>
		<label for="stock">在庫:</label>
		<input type="text" required="" name="stock" id="stock" value="<?php if(isset($stock)) echo $stock; ?>">
	</fieldset>
	<fieldset>
		<label for="title">画像:</label>
		<?php if(isset($img_path)) echo "<img src=\"/assets/img/upload/{$img_path}\"><br>"; ?>
		<input type="file" name="upload_file">
	</fieldset>
	<fieldset>

		<label for="detail">詳細:</label>
		<textarea class="normal-textarea" required="" name="detail" id="detail"><?php if(isset($detail)) echo $detail; ?></textarea>
	</fieldset>
	<button type="submit" class="normal-button center">確定</button>
</form>