<p class="center">下記の内容で購入手続きを行います。よろしければ送信ボタンを押してください。</p>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th class="small">画像</th>
			<th>名前</th>
			<th class="small">在庫</th>
			<th>値段</th>
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
			<th>宛名</th>
			<td><?= $user->name; ?>様</td>
		</tr>
		<tr>
			<th>送付先</th>
			<td>〒<?= $user->zip_code; ?><br>
				<?= Config::get("prefectures.names")[$user->prefecture_id]; ?><br>
				<?= $user->address; ?>
			</td>
		</tr>
	</table>
	<a href="/cart/sent" class="radius-button center">購入する</a>
</div>
