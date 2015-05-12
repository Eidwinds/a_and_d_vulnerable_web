<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => getenv('DB_DSN'),
			'username'   => getenv('DB_USERNAME'),
			'password'   => getenv('DB_PASSWORD')
		)
	)
);
