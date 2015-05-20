<form class="search" method="get">
	<button type="submit">検索</button>
	<input name="search" value="<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>">
</form>
<div>
	<ul class="item_list">
		<?php foreach($items as $item): ?>
			<li>
				<a href="/items/detail/<?= $item["id"]; ?>">
					<img width="180" src="/assets/img/upload/<?= $item["img_path"]; ?>">
					<p><?= $item["name"]; ?></p>
					<p><?= date("Y-m-d", $item["created_at"]); ?></p>
				</a>
			</li>
		<?php endforeach; ?>
		<?= $pager; ?>
	</ul>
</div>