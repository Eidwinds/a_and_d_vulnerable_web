<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th>ユーザ名</th>
			<th>商品名</th>
			<th class="small">個数</th>
			<th>小計</th>
			<th>作成日</th>
			<th>状態</th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
		<tr id="purchase_<?= $purchase->id; ?>">
			<td><?= $purchase->id; ?></td>
			<td><?= $purchase->user->name; ?></td>
			<td><?= $purchase->item->name; ?></td>
			<td><?= $purchase->number; ?></td>
			<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
			<td><?= Date("Y-m-d H:i:s", $purchase->created_at); ?></td>
			<td>
				<select onchange="changeStatus(<?= $purchase->id; ?>)" id="status_<?= $purchase->id; ?>">
					<option value="0" <?php if($purchase->status == 0) echo "selected"; ?>>受付待ち</option>
					<option value="1" <?php if($purchase->status == 1) echo "selected"; ?>>受付済み</option>
					<option value="2" <?php if($purchase->status == 2) echo "selected"; ?>>発送待ち</option>
					<option value="3" <?php if($purchase->status == 3) echo "selected"; ?>>発送済み</option>
				</select>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>
<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function changeStatus(id){

		$.ajax({
			url: '/admin/api/changepurchase.json',
			type: 'POST',
			data: {
				"id": id,
				"status": $("#status_" + id).val(),
				"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
			},

			complete: function(){

			},
			success: function(res) {
			}
		})
	}
</script>