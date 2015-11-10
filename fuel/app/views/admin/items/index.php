<a class="create_button" href="/admin/items/create"><?= __("create"); ?></a>
<div>
	<table class="normal-table">
		<tr>
			<th class="small"><?= __("public"); ?></th>
			<th class="small">ID</th>
			<th><?= __("name"); ?></th>
			<th><?= __("stock"); ?></th>
			<th><?= __("price"); ?></th>
			<th><?= __("created_datetime"); ?></th>
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
			<td><?= Date(__("datetime_style"), $item->created_at); ?></td>
			<td><a class="normal-button" href="/admin/items/update/<?= $item->id; ?>"><?= __("edit"); ?></a></td>
			<td><button class="normal-button" onclick="deleteTopic(<?= $item->id; ?>)"><?= __("delete"); ?></button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteTopic(id){
		if(confirm('<?= __("do_you_want_to_delete_it"); ?>')){
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
			url: '/admin/api/changeitem.json',
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