<h3><?= __("new_history"); ?></h3>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __("user"); ?></th>
			<th><?= __("name"); ?></th>
			<th class="small"><?= __("number"); ?></th>
			<th><?= __("total"); ?></th>
			<th><?= __("created_datetime"); ?></th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
			<tr id="purchase_<?= $purchase->id; ?>">
				<td><?= $purchase->id; ?></td>
				<td><?= $purchase->user->name; ?></td>
				<td><?= $purchase->item->name; ?></td>
				<td><?= $purchase->number; ?></td>
				<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
				<td><?= Date(__("datetime_style"), $purchase->created_at); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<h3><?= __("new_inquiries"); ?></h3>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __("title"); ?></th>
			<th><?= __("created_datetime"); ?></th>
		</tr>
		<?php foreach($inquiries as $inquiry): ?>
			<tr id="inquiry_<?= $inquiry->id; ?>">
				<td><?= $inquiry->id; ?></td>
				<td><?= $inquiry->title; ?></td>
				<td><?= Date(__("datetime_style"), $inquiry->created_at); ?></td>
			</tr>
			<tr id="inquiry_body_<?= $inquiry->id; ?>">
				<td colspan="4"><?= $inquiry->body; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>