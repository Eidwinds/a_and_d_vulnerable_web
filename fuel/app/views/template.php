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
		<a href="/"><?= Asset::img('s_ad.png', ["width" => 100, "height" => 100, "alt" => "a_and_d"]); ?></a>

			<ul>
				<li><a href="/topics">お知らせ一覧</a></li>
				<li><a href="/items">商品一覧</a></li>
				<li><a href="/cart">カート</a></li>
				<?php if($is_signin): ?>
				<li><a href="/purchases">購入履歴</a></li>
				<li class="logout">
					<form action="" method="post">
						<input type="hidden" name="logout" value="1">
						<?= Form::csrf(); ?>
						<button class="normal-button">ログアウト</button>
					</form>
				</li>
				<li class="header_user"><a href="/setting"><?= $user->name; ?></a></li>
				<?php else: ?>
					<li class="logout">
						<a href="/signin" class="radius-button">ログイン</a>
					</li>
					<li class="logout">
						<a href="/signup" class="radius-button">ユーザ登録</a>
					</li>
				<?php endif; ?>
			</ul>

	</header>
	<section>
		<h1><?= $title; ?></h1>
		<?= $content; ?>
	</section>
	<footer>
		<div><a href="/policy">プライバシーポリシー</a> | <a href="/role">利用規約</a> | <a href="/company">会社概要</a> | <a href="/inquiry">お問い合わせ</a></div>
		<p>Copyright 2015 Attack and Defense All rights reserved.</p>
	</footer>
</div>
</body>
</html>
