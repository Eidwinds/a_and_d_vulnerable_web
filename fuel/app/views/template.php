<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title; ?>｜<?= __('com_name'); ?></title>
	<?= Asset::css('style.css'); ?>
</head>
<body>
<div class="container">
	<header>
		<a href="/"><?= Asset::img('s_ad.png', ["width" => 100, "height" => 100, "alt" => "a_and_d"]); ?></a>

			<ul>
				<li><a href="/topics"><?= __('topics'); ?></a></li>
				<li><a href="/items"><?= __('items'); ?></a></li>
				<li><a href="/cart"><?= __('cart'); ?></a></li>
				<?php if($is_signin): ?>
				<li><a href="/purchases"><?= __('history'); ?></a></li>
				<li class="logout">
					<form action="" method="post">
						<input type="hidden" name="logout" value="1">
						<?= Form::csrf(); ?>
						<button class="logout-button"><?= __('signout'); ?></button>
					</form>
				</li>
				<li class="header_user"><a href="/setting"><?= $user->name; ?></a></li>
				<?php else: ?>
					<li class="logout">
						<a href="/signin" class="radius-button"><?= __('signin'); ?></a>
					</li>
					<li class="logout">
						<a href="/signup" class="radius-button"><?= __('signup'); ?></a>
					</li>
				<?php endif; ?>
			</ul>

	</header>
	<section>
		<h1><?= $title; ?></h1>
		<?= $content; ?>
	</section>
	<footer>
		<div><a href="/policy"><?= __('policy'); ?></a> | <a href="/role"><?= __('term'); ?></a> | <a href="/company"><?= __('company'); ?></a> | <a href="/inquiry"><?= __('inquiry'); ?></a></div>
		<p>Copyright 2015 <?= __('com_name'); ?> All rights reserved.</p>
	</footer>
</div>
</body>
</html>
