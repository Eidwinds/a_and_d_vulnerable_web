<a class="create_button" href="/admin/topics/create">お知らせを作る</a>
<div>
	<table class="normal-table">
		<tr>
			<th>ID</th>
			<th>タイトル</th>
			<th>作成日</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($topics as $topic): ?>
		<tr id="topic_<?= $topic->id; ?>">
			<td><?= $topic->id; ?></td>
			<td><?= $topic->title; ?></td>
			<td><?= Date("Y-m-d H:i:s", $topic->created_at); ?></td>
			<td><a class="normal-button" href="/admin/topics/update/<?= $topic->id; ?>">編集</a></td>
			<td><button class="normal-button" onclick="deleteTopic(<?= $topic->id; ?>)">削除</button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteTopic(id){
		if(confirm('消してよろしいですか？')){
			$.ajax({
				url: '/admin/api/deletetopic.json',
				type: 'POST',
				data: {
					"id": id,
					"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
				},

				complete: function(){

				},
				success: function(res) {
					$("#topic_" + id).hide();
				}
			})
		}
	}
</script>