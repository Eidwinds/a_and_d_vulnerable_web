<a class="create_button" href="/admin/topics/create"><?= __("create"); ?></a>
<div>
	<table class="normal-table">
		<tr>
			<th>ID</th>
			<th><?= __("title"); ?></th>
			<th><?= __("created_datetime"); ?></th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($topics as $topic): ?>
		<tr id="topic_<?= $topic->id; ?>">
			<td><?= $topic->id; ?></td>
			<td><?= $topic->title; ?></td>
			<td><?= Date(__("datetime_style"), $topic->created_at); ?></td>
			<td><a class="normal-button" href="/admin/topics/update/<?= $topic->id; ?>"><?= __("edit"); ?></a></td>
			<td><button class="normal-button" onclick="deleteTopic(<?= $topic->id; ?>)"><?= __("delete"); ?></button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteTopic(id){
		if(confirm('<?= __("do_you_want_to_delete_it"); ?>')){
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