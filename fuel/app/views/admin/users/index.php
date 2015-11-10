<a class="create_button" href="/admin/users/create"><?= __("create"); ?></a>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th><?= __("group"); ?></th>
			<th><?= __("name"); ?></th>
			<th><?= __("email"); ?></th>
			<th><?= __("created_datetime"); ?></th>
			<th><?= __("last_login"); ?></th>
			<th class="middle"></th>
			<th class="middle"></th>
		</tr>
		<?php foreach($users as $user): ?>
		<tr id="user_<?= $user->id; ?>">
			<td><?= $user->id; ?></td>
			<td><?= $user->getGroup(); ?></td>
			<td><?= $user->name; ?></td>
			<td><?= $user->email; ?></td>
			<td><?= Date(__("datetime_style"), $user->created_at); ?></td>
			<td><?= Date(__("datetime_style"), $user->last_login); ?></td>
			<td><a class="normal-button" href="/admin/users/update/<?= $user->id; ?>"><?= __("edit"); ?></a></td>
			<td><button class="normal-button" onclick="deleteUser(<?= $user->id; ?>)"><?= __("delete"); ?></button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteUser(id){
		if(confirm('<?= __("do_you_want_to_delete_it"); ?>')){
			$.ajax({
				url: '/admin/api/deleteuser.json',
				type: 'POST',
				data: {
					"id": id,
					"<?= Config::get('security.csrf_token_key'); ?>": fuel_csrf_token()
				},

				complete: function(){

				},
				success: function(res) {
					$("#user_" + id).hide();
				}
			})
		}
	}
</script>