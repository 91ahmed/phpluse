<?php
	namespace App\Controller;

	use PhpFileUploader\Uploader;

	use Core\Modules\Template\Render;
	use Core\Modules\Validation\Examine;
	use Core\Modules\Http\Request;
	use Core\Modules\Http\Response;
	use Core\Modules\Sessions\Session;

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

			$last_admin = $admins->all()->orderBy(['admin_id'], 'DESC')->fetch_row();

			Render::view('admins/create', compact('all_admins', 'all_genders', 'all_privacy', 'last_admin'));
		}

		public function createRequest ()
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

			if ($data->is_valid())
			{
				// Sanitization
				$id        = intval($admins->select(['COUNT(*) AS id'])->fetch_row()->id)+1;
				$path      = ROOT.DS.'public'.DS.'assets'.DS.'images'.DS.'users'.DS; // Path for user images photo and cover
				$firstname = empty($_REQUEST['firstname']) ? null : strtolower(sz_name(Request::post('firstname')));
				$lastname  = empty($_REQUEST['lastname']) ? null : strtolower(sz_name(Request::post('lastname')));
				$username  = empty($_REQUEST['firstname']) ? null : strtolower($firstname.rand(0,9).'@'.$id);
				$email     = empty($_REQUEST['email']) ? null : sz_email(Request::post('email'));
				$phone     = empty($_REQUEST['phone']) ? null : Request::post('phone');
				$photo     = null;
				$cover     = null;
				$password  = empty($_REQUEST['password']) ? null : password_hash(Request::post('password'), PASSWORD_DEFAULT, ['cost' => 12]);
				$confirm   = empty($_REQUEST['confirm-password']) ? null : Request::post('confirm-password');
				$gender    = in_array($_REQUEST['gender'], [1,2]) ? intval(sz_digits(Request::post('gender'))): 1;
				$privacy   = in_array($_REQUEST['account_privacy'], [1,2]) ? intval(sz_digits(Request::post('account_privacy'))): 1;
				$day       = empty($_REQUEST['birth_day']) || $_REQUEST['birth_day'] < 1 || $_REQUEST['birth_day'] > 31 ? null : intval(sz_digits(Request::post('birth_day')));
				$month     = empty($_REQUEST['birth_month']) || $_REQUEST['birth_month'] < 1 || $_REQUEST['birth_month'] > 12 ? null : intval(sz_digits(Request::post('birth_month')));
				$year      = empty($_REQUEST['birth_year']) || $_REQUEST['birth_year'] < date('Y')-100 || $_REQUEST['birth_year'] > date('Y') ? null : intval(sz_digits(Request::post('birth_year')));

				if (isset_file('photo')) 
				{
					$photo = gn_char(20);
					$file = new Uploader('photo'); // input name
					$file->path($path.$id);
					$file->createFileName($photo); // custom name
					$file->upload();
					$photo = $photo.$file->getExtension();
				}

				if (isset_file('cover')) 
				{
					$cover = gn_char(20);
					$file = new Uploader('cover'); // input name
					$file->path($path.$id);
					$file->createFileName($cover); // custom name
					$file->upload();
					$cover = $cover.$file->getExtension();
				}

				try {
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

					// Set Session
					Session::set('success', 'Admin data has been successfully inserted into the database!');
				} 
				catch (\Exception $e) 
				{
					$response = new Response();
					echo $response->status(500)->sendJson(['Error: ' => 'Unable to create a new admin account due to a database issue. Possible reasons include - Duplicate entry or Invalid value.']);

					// The existing user images directory has been removed due to the error.
					if (is_dir($path.$id)) {
						delete_dir($path.$id);
					}

					return false;
				}

				$response = new Response();
				echo $response->status(200)->sendJson(['You have successfully' => ' created a new admin account.']);
			}
			else
			{
				$response = new Response();
				echo $response->status(500)->sendJson($data->errors());			
			}			
		}
	}
?>