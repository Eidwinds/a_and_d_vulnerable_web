<p class="center"><?= __("please_check_below"); ?></p>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th class="small"><?= __("image"); ?></th>
			<th><?= __("name"); ?></th>
			<th class="small"><?= __("stock"); ?></th>
			<th><?= __("price"); ?></th>
		</tr>
		<?php foreach($items as $item): ?>
			<tr id="item_<?= $item["id"]; ?>">
				<td><?= $item["id"]; ?></td>
				<td><img src="/assets/img/upload/<?= $item["img_path"]; ?>" width="50"></td>
				<td><?= $item["name"]; ?></td>
				<td><?= $item["stock"]; ?></td>
				<td>\<?= number_format($item["price"]); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<table class="prof_table">
		<tr>
			<th><?= __("your_name"); ?></th>
			<td><?= $user->name; ?><?= __("sir"); ?></td>
		</tr>
		<tr>
			<th><?= __("destination"); ?></th>
			<td>〒<?= $user->zip_code; ?><br>
				<?= Config::get("prefectures.names")[$user->prefecture_id]; ?><br>
				<?= $user->address; ?>
			</td>
		</tr>
	</table>
	<a href="/cart/sent" class="radius-button center"><?= __("submit"); ?></a>
</div>
