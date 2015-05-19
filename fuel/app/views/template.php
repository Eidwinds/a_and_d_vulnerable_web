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
				<li><a href="/patrash">Top</a></li>
				<li><a href="/patrash/teams">Teams</a></li>
				<li><a href="/patrash/users">Users</a></li>
				<li><a href="/patrash/topics">Topics</a></li>
				<li><a href="/patrash/roles">Roles</a></li>
				<li><a href="/patrash/defenses">Defense</a></li>
				<li><a href="/patrash/defensetypes">Def Types</a></li>
				<li><a href="/patrash/attacks">Attack</a></li>
				<li><a href="/patrash/attacktypes">Atk Types</a></li>
				<li><a href="/patrash/attacklog">Atk Log</a></li>
				<li><a href="/patrash/loginlog">Login Log</a></li>
				<li><a href="/patrash/setting">Setting</a></li>
				<li class="logout">
					<form action="" method="post">
						<input type="hidden" name="logout" value="1">
						<?= Form::csrf(); ?>
						<button class="normal-button">Logout</button>
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
			<p>Created by Yuichi HATTORI</p>
		</footer>
	</div>
</body>
</html>
