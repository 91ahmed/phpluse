<?php
	namespace App\Controller;

	use Core\Modules\Template\Render;
	use App\Model\Admins;
	use App\Model\AccountStatus;
	use App\Model\AccountPrivacy;
	use App\Model\Genders;

	class AdminsController 
	{
		public function create () 
		{
			$admins = new Admins();
			$all_admins = $admins->all()->fetch();

			$genders = new Genders();
			$all_genders = $genders->all()->fetch();

			$privacy = new AccountPrivacy();
			$all_privacy = $privacy->all()->fetch();

			Render::view('admins/create', compact('all_admins', 'all_genders', 'all_privacy'));
		}
	}
?>