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
				<li><a href="/admin"><?= __("dashboard"); ?></a></li>
				<li><a href="/admin/topics"><?= __("topics"); ?></a></li>
				<li><a href="/admin/users"><?= __("users"); ?></a></li>
				<li><a href="/admin/items"><?= __("items"); ?></a></li>
				<li><a href="/admin/purchases"><?= __("history"); ?></a></li>
				<li><a href="/admin/inquiries"><?= __("inquiry"); ?></a></li>
				<li class="logout">
					<form action="" method="post">
						<input type="hidden" name="logout" value="1">
						<?= Form::csrf(); ?>
						<button class="logout-button"><?= __("signout"); ?></button>
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
