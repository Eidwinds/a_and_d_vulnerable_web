<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th>商品名</th>
			<th class="small">個数</th>
			<th>小計</th>
			<th>購入日</th>
			<th>状況</th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
		<tr id="purchase_<?= $purchase->id; ?>">
			<td><?= $purchase->id; ?></td>
			<td><?= $purchase->item->name; ?></td>
			<td><?= $purchase->number; ?></td>
			<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
			<td><?= Date("Y-m-d H:i:s", $purchase->created_at); ?></td>
			<td>
				<?php
				switch($purchase->status)
				{
					case 0:
						echo "受付待ち";
						break;
					case 1:
						echo "受付済み";
						break;
					case 2:
						echo "発送待ち";
						break;
					case 3:
						echo "発送済み";
						break;
				}

				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>