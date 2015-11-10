<div>
	<ul class="topic_list">
		<?php foreach($topics as $topic): ?>
			<li>
				<a href="/topics/detail/<?= $topic->id; ?>"><?= $topic->title; ?> (<?= date(__("date_style"), $topic->created_at); ?>)</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?= $pager; ?>
</div>