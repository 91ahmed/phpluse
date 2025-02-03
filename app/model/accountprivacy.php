<?php
	namespace App\Model;

	use Core\Modules\Database\Sql\Db;

	class AccountPrivacy extends Db
	{
		protected $table = 'account_privacy';

		/** Configure new connection
		----------------------------
		protected $connection = [
			'driver' => 'pgsql',
			'host' => 'localhost',
			'user' => 'ahmed',
			'password' => '24882533',
			'database' => 'sys',
			'port' => '5432'
		];
		**/
	}
?>