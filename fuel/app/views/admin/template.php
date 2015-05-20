<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title; ?></title>
	<?= Asset::css('style.css'); ?>
</head>
<body>
	<div class="container">
		<header>
			<?= Asset::img('s_ad.png', ["width" => 100, "height" => 100, "alt" => "a_and_d"]); ?>
			<?php if($is_signin): ?>
			<ul>
				<li><a href="/admin">ダッシュボード</a></li>
				<li><a href="/admin/topics">お知らせ</a></li>
				<li><a href="/admin/users">ユーザ</a></li>
				<li><a href="/admin/items">商品</a></li>
				<li><a href="/admin/purchases">購入履歴</a></li>
				<li><a href="/admin/inquiries">お問い合わせ</a></li>
				<li class="logout">
					<form action="" method="post">
						<input type="hidden" name="logout" value="1">
						<?= Form::csrf(); ?>
						<button class="normal-button">ログアウト</button>
					</form>
				</li>
			</ul>
			<?php endif; ?>
		</header>
		<section>
			<h1><?= $title; ?></h1>
<?= $content; ?>
		</section>
		<footer>
			<p>Copyright 2015 Attack and Defense All rights reserved.</p>
		</footer>
	</div>
</body>
</html>