<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __("title"); ?></th>
			<th><?= __("created_at"); ?></th>
			<th></th>
		</tr>
		<?php foreach($inquiries as $inquiry): ?>
		<tr id="inquiry_<?= $inquiry->id; ?>">
			<td><?= $inquiry->id; ?></td>
			<td><?= $inquiry->title; ?></td>
			<td><?= Date(__("datetime_style"), $inquiry->created_at); ?></td>
			<td><button class="normal-button" onclick="deleteInquiry(<?= $inquiry->id; ?>)"><?= __("delete"); ?></button></td>
		</tr>
		<tr id="inquiry_body_<?= $inquiry->id; ?>">
			<td colspan="4"><?= $inquiry->body; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteInquiry(id){
		if(confirm('<?= __("do_you_want_to_delete_it"); ?>')){
			$.ajax({
				url: '/admin/api/deleteinquiry.json',
				type: 'POST',
				data: {
					"id": id,
					"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
				},

				complete: function(){

				},
				success: function(res) {
					$("#inquiry_" + id).hide();
					$("#inquiry_body_" + id).hide();
				}
			})
		}
	}
</script>