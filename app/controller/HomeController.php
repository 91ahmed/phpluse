<?php
	namespace App\Controller;

	use Core\Modules\Template\Render;
	use App\Model\Admins;

	class HomeController 
	{
		public function index () 
		{
			// $admins = new Admins();
			// $all = $admins->select(['*'])->fetch();

			Render::view('home');
		}

		public static function admin () 
		{
			return 'ahmed hassan';
		}
	}
?>