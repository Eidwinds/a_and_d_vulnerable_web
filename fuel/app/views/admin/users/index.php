<a class="create_button" href="/admin/users/create">ユーザを作る</a>
<div>
	<table class="normal-table">
		<tr>
			<th class="small">ID</th>
			<th>権限</th>
			<th>名前</th>
			<th>メールアドレス</th>
			<th>作成日</th>
			<th>最終ログイン</th>
			<th class="middle"></th>
			<th class="middle"></th>
		</tr>
		<?php foreach($users as $user): ?>
		<tr id="user_<?= $user->id; ?>">
			<td><?= $user->id; ?></td>
			<td><?= $user->getGroup(); ?></td>
			<td><?= $user->name; ?></td>
			<td><?= $user->email; ?></td>
			<td><?= Date("Y-m-d H:i:s", $user->created_at); ?></td>
			<td><?= Date("Y-m-d H:i:s", $user->last_login); ?></td>
			<td><a class="normal-button" href="/admin/users/update/<?= $user->id; ?>">編集</a></td>
			<td><button class="normal-button" onclick="deleteUser(<?= $user->id; ?>)">削除</button></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?= $pager; ?>
</div>

<?= Asset::js("jquery.min.js"); ?>
<?= Security::js_fetch_token(); ?>
<script>
	function deleteUser(id){
		if(confirm('消してよろしいですか？')){
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