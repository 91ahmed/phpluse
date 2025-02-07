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
			if (is_request('register')) 
			{
				$admins = new Admins();

				// Sanitize data
				$id        = intval($admins->select(['COUNT(*) AS id'])->fetch_row()->id)+1;
				$firstname = empty($_REQUEST['firstname']) ? null : strtolower(sz_name(request('firstname')));
				$lastname  = empty($_REQUEST['lastname']) ? null : strtolower(sz_name(request('lastname')));
				$username  = empty($_REQUEST['email']) ? null : strtolower(current(explode('@', request('email'))).'_'.$id);
				$email     = empty($_REQUEST['email']) ? null : sz_email(request('email'));
				$phone     = empty($_REQUEST['phone']) ? null : request('phone');
				$photo     = null;
				$cover     = null;
				$password  = empty($_REQUEST['password']) ? null : password_hash(request('password'), PASSWORD_DEFAULT, ['cost' => 12]);
				$confirm   = empty($_REQUEST['confirm-password']) ? null : request('confirm-password');
				$gender    = in_array($_REQUEST['gender'], [1,2]) ? intval(sz_digits(request('gender'))): 1;
				$privacy   = in_array($_REQUEST['privacy'], [1,2]) ? intval(sz_digits(request('privacy'))): 1;
				$day       = empty($_REQUEST['day']) || $_REQUEST['day'] < 1 || $_REQUEST['day'] > 31 ? null : intval(sz_digits(request('day')));
				$month     = empty($_REQUEST['month']) || $_REQUEST['month'] < 1 || $_REQUEST['month'] > 12 ? null : intval(sz_digits(request('month')));
				$year      = empty($_REQUEST['year']) || $_REQUEST['year'] < date('Y')-100 || $_REQUEST['year'] > date('Y') ? null : intval(sz_digits(request('year')));


				// Insert into database
				$admins->insert([
					'admin_id' => $id,
					'admin_first_name' => $firstname,
					'admin_last_name' => $lastname,
					'admin_user_name' => $username,
					'admin_email' => $email,
					'admin_password' => $password,
					'admin_phone' => $phone,
					'admin_gender' => $gender,

					'admin_photo' => $photo,
					'admin_cover' => $cover,

					'account_privacy' => $privacy,
					'public_code' => gn_char(15),
					'token' => gn_char(128),

					'admin_birth_day' => $day,
					'admin_birth_month' => $month,
					'admin_birth_year' => $year,

					'admin_created_day' => date('d'),
					'admin_created_month' => date('m'),
					'admin_created_year' => date('Y'),
				])->execute();
			}

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