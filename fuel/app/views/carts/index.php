<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th class="small">画像</th>
			<th>名前</th>
			<th class="small">在庫</th>
			<th>値段</th>
			<th></th>
		</tr>
		<?php foreach($items as $item): ?>
			<tr id="item_<?= $item["id"]; ?>">
				<td><?= $item["id"]; ?></td>
				<td><img src="/assets/img/upload/<?= $item["img_path"]; ?>" width="50"></td>
				<td><?= $item["name"]; ?></td>
				<td><?= $item["stock"]; ?></td>
				<td>\<?= number_format($item["price"]); ?></td>
				<td><button class="normal-button" onclick="deleteItem(<?= $item["id"]; ?>)">削除</button></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php if($user != null): ?>
		<?php if(count($items) != 0): ?>
			<a href="/cart/confirm" class="radius-button center">購入へ進む</a>
		<?php endif?>
	<?php else: ?>
		<a href="/signin" class="radius-button center">ログイン画面へ</a>
	<?php endif; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Asset::js("jquery.cookie.js"); ?>
<script>
	function deleteItem(id){
		if(confirm('消してよろしいですか？')){
			var cartString = $.cookie("cart");
			if(cartString == undefined){
				var items = new Array();
			}else{
				var items = cartString.split(",");
			}

			if($.inArray(id.toString(), items) != -1){
				items.splice($.inArray(id.toString(), items), 1);
				$("#item_" + id).hide();
			}
			$.cookie("cart", items.join(","), { path: "/" });

		}
	}
</script>