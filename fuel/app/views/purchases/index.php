<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __('name'); ?></th>
			<th class="small"><?= __('number'); ?></th>
			<th><?= __('total'); ?></th>
			<th><?= __('purchase_date'); ?></th>
			<th><?= __('status'); ?></th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
		<tr id="purchase_<?= $purchase->id; ?>">
			<td><?= $purchase->id; ?></td>
			<td><?= $purchase->item->name; ?></td>
			<td><?= $purchase->number; ?></td>
			<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
			<td><?= Date(__('datetime_style'), $purchase->created_at); ?></td>
			<td>
				<?php
				switch($purchase->status)
				{
					case 0:
						echo __('wait_accepting');
						break;
					case 1:
						echo __('already_accepted');
						break;
					case 2:
						echo __('wait_shipping');
						break;
					case 3:
						echo __('already_shipped');
						break;
				}

				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>