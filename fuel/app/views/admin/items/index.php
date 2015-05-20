<a class="create_button" href="/admin/items/create">商品を作る</a>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">公開</th>
			<th class="small">ID</th>
			<th>名前</th>
			<th>在庫</th>
			<th>値段</th>
			<th>作成日</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($items as $item): ?>
		<tr id="item_<?= $item->id; ?>">
			<td><input type="checkbox" onclick="changePublic(<?= $item->id; ?>)" <?php if($item->is_public == 1) echo "checked"; ?>></td>
			<td><?= $item->id; ?></td>
			<td><?= $item->name; ?></td>
			<td><?= $item->stock; ?></td>
			<td>\<?= number_format($item->price); ?></td>
			<td><?= Date("Y-m-d H:i:s", $item->created_at); ?></td>
			<td><a class="normal-button" href="/admin/items/update/<?= $item->id; ?>">編集</a></td>
			<td><button class="normal-button" onclick="deleteTopic(<?= $item->id; ?>)">削除</button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteTopic(id){
		if(confirm('消してよろしいですか？')){
			$.ajax({
				url: '/admin/api/deleteitem.json',
				type: 'POST',
				data: {
					"id": id,
					"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
				},

				complete: function(){

				},
				success: function(res) {
					$("#item_" + id).hide();
				}
			})
		}
	}

	function changePublic(id){
		$.ajax({
			url: '/patrash/api/changeitem.json',
			type: 'POST',
			data: {
				"id": id,
				"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
			},

			complete: function(){

			},
			success: function(res) {
			}
		})
	}
</script>