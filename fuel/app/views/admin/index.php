<h3>最新の購入履歴</h3>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th>ユーザ名</th>
			<th>商品名</th>
			<th class="small">個数</th>
			<th>小計</th>
			<th>作成日</th>
		</tr>
		<?php foreach($purchases as $purchase): ?>
			<tr id="purchase_<?= $purchase->id; ?>">
				<td><?= $purchase->id; ?></td>
				<td><?= $purchase->user->name; ?></td>
				<td><?= $purchase->item->name; ?></td>
				<td><?= $purchase->number; ?></td>
				<td>\<?= number_format($purchase->number * $purchase->item->price); ?></td>
				<td><?= Date("Y-m-d H:i:s", $purchase->created_at); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<h3>最新のお問い合わせ</h3>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th>タイトル</th>
			<th>作成日</th>
		</tr>
		<?php foreach($inquiries as $inquiry): ?>
			<tr id="inquiry_<?= $inquiry->id; ?>">
				<td><?= $inquiry->id; ?></td>
				<td><?= $inquiry->title; ?></td>
				<td><?= Date("Y-m-d H:i:s", $inquiry->created_at); ?></td>
			</tr>
			<tr id="inquiry_body_<?= $inquiry->id; ?>">
				<td colspan="4"><?= $inquiry->body; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>