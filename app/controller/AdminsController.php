<?php
	namespace App\Controller;

	use Core\Modules\Template\Render;
	use Core\Modules\Validation\Examine;
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

				// Validation
				$data = new Examine();
				$data->request('firstname')->required()->name()->max_str(15)->min_str(2);
				$data->request('lastname')->required()->name()->max_str(15)->min_str(2);
				$data->request('email')->required()->email()->max_str(45)->min_str(5);
				$data->request('phone')->digits()->max_str(15)->min_str(3)->custom('has invalid format');
				$data->request('password')->required()->min_str(6)->max_str(30)->confirm('confirm-password');
				$data->request('gender')->required()->digit()->min_num(1)->max_num(2)->custom('has invalid value');
				$data->request('account_privacy')->required()->digit()->min_num(1)->max_num(2)->custom('has invalid value');
				$data->request('birth_day')->required()->digits()->min_num(1)->max_num(31)->custom('has invalid value');
				$data->request('birth_month')->required()->digits()->min_num(1)->max_num(12)->custom('has invalid value');
				$data->request('birth_year')->required()->digits()->min_num(date('Y')-100)->max_num(date('Y'))->custom('has invalid value');
				$data->file('photo')->file_extension(['png','jpg','jpeg'])->file_size(2099999);
				$data->file('cover')->file_extension(['png','jpg','jpeg'])->file_size(2099999);

				var_dump($data->errors());exit();

				if ($data->is_valid())
				{
					// Sanitization
					$id        = intval($admins->select(['COUNT(*) AS id'])->fetch_row()->id)+1;
					$firstname = empty($_REQUEST['firstname']) ? null : strtolower(sz_name(request('firstname')));
					$lastname  = empty($_REQUEST['lastname']) ? null : strtolower(sz_name(request('lastname')));
					$username  = empty($_REQUEST['firstname']) ? null : strtolower($firstname.rand(0,9).'@'.$id);
					$email     = empty($_REQUEST['email']) ? null : sz_email(request('email'));
					$phone     = empty($_REQUEST['phone']) ? null : request('phone');
					$photo     = null;
					$cover     = null;
					$password  = empty($_REQUEST['password']) ? null : password_hash(request('password'), PASSWORD_DEFAULT, ['cost' => 12]);
					$confirm   = empty($_REQUEST['confirm-password']) ? null : request('confirm-password');
					$gender    = in_array($_REQUEST['gender'], [1,2]) ? intval(sz_digits(request('gender'))): 1;
					$privacy   = in_array($_REQUEST['account_privacy'], [1,2]) ? intval(sz_digits(request('account_privacy'))): 1;
					$day       = empty($_REQUEST['birth_day']) || $_REQUEST['day'] < 1 || $_REQUEST['day'] > 31 ? null : intval(sz_digits(request('day')));
					$month     = empty($_REQUEST['birth_month']) || $_REQUEST['month'] < 1 || $_REQUEST['month'] > 12 ? null : intval(sz_digits(request('month')));
					$year      = empty($_REQUEST['birth_year']) || $_REQUEST['year'] < date('Y')-100 || $_REQUEST['year'] > date('Y') ? null : intval(sz_digits(request('year')));

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
				else
				{

				}

				redirect('dashboard/admin/create');
				exit();
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