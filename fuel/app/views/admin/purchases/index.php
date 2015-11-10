<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __("user"); ?></th>
			<th><?= __("name"); ?></th>
			<th class="small"><?= __("number"); ?></th>
			<th><?= __("total"); ?></th>
			<th><?= __("created_datetime"); ?></th>
			<th><?= __("status"); ?></th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
		<tr id="purchase_<?= $purchase->id; ?>">
			<td><?= $purchase->id; ?></td>
			<td><?= $purchase->user->name; ?></td>
			<td><?= $purchase->item->name; ?></td>
			<td><?= $purchase->number; ?></td>
			<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
			<td><?= Date(__("datetime_style"), $purchase->created_at); ?></td>
			<td>
				<select onchange="changeStatus(<?= $purchase->id; ?>)" id="status_<?= $purchase->id; ?>">
					<option value="0" <?php if($purchase->status == 0) echo "selected"; ?>><?= __("wait_accepting"); ?></option>
					<option value="1" <?php if($purchase->status == 1) echo "selected"; ?>><?= __("already_accepted"); ?></option>
					<option value="2" <?php if($purchase->status == 2) echo "selected"; ?>><?= __("wait_shipping"); ?></option>
					<option value="3" <?php if($purchase->status == 3) echo "selected"; ?>><?= __("already_shipped"); ?></option>
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