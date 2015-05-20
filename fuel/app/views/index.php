<h3>最新のお知らせ</h3>
<div>
	<ul class="topic_list">
		<?php foreach($topics as $topic): ?>
			<li>
				<a href="/topics/detail/<?= $topic->id; ?>"><?= $topic->title; ?> (<?= date("Y-m-d", $topic->created_at); ?>)</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<h3>最新の商品</h3>
<div>
	<ul class="item_list">
		<?php foreach($items as $item): ?>
			<li>
				<a href="/items/detail/<?= $item->id; ?>">
					<img width="180" src="/assets/img/upload/<?= $item->img_path; ?>">
					<p><?= $item->name; ?></p>
					<p><?= date("Y-m-d", $item->created_at); ?></p>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>