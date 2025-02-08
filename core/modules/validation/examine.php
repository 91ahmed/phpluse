<?php
	namespace Core\Modules\Validation;

	use Core\Modules\Validation\Numbers;
	use Core\Modules\Validation\Strings;
	use Core\Modules\Validation\Arrays;
	use Core\Modules\Validation\Files;

	class Examine
	{
		use Numbers, Strings, Arrays, Files;

		private $data;
		private $input;
		private $error = array();
		private $errors_count = 0;

		private $message = [
			'required' => 'is required',
			'invalid'  => 'format is invalid',
			'confirm' => 'confirmation doesn’t match the original password',

			// Length
			'length'  => 'string length should be equal',
			'min_str' => 'minimum string length should be',
			'max_str' => 'maximum string length should be',			
			'min_num' => 'minimum number should be',
			'max_num' => 'maximum number should be',

			// Files
			'file_extension' => 'extension should be',
			'file_type' => 'type should be',
			'file_size' => 'max size should be',
		];

		public function request (string $inputName): Examine
		{
			if (isset($_REQUEST[$inputName])) {
				$this->data  = $_REQUEST[$inputName];
				$this->input = $inputName;
			} else {
				throw new \Exception("({$inputName}) request doesn't exists", 1);
			}

			return $this;
		}

		public function file (string $inputName): Examine
		{
			if (isset($_FILES[$inputName]['name']) && !empty($_FILES[$inputName]['name'])) 
			{
				$this->data  = $_FILES[$inputName];
				$this->input = $inputName;
				$this->files();
			}

			return $this;
		}

		public function data ($data, string $label = ''): Examine 
		{
			$this->data = $data;

			if (empty($label)) {
				$this->input = 'error';
			} else {
				$this->input = $label;
			}
			
			return $this;
		}

		/**
		 *	Check empty values
		 */
		public function required (): Examine
		{
			if ($this->is_request()) 
			{
				if (is_string($this->data)) 
				{
					if ($this->data == null || is_null($this->data) || $this->data == '') 
					{
						$this->error[$this->input] = $this->message['required'];
						$this->errors_count++;
					}
				}
				else if (is_array($this->data)) 
				{
					if (empty($this->data) || count($this->data) == 0) 
					{
						$this->error[$this->input] = $this->message['required'];
						$this->errors_count++;
					}
					else 
					{
						foreach ($this->data as $key => $value) {
							if (empty($value) || is_null($value) || $value == '') {
								$this->error[$this->input] = $this->message['required'];
								$this->errors_count++;
								break;
							}
						}
					}
				}
			}

			return $this;
		}

		public function custom (String $message) 
		{
			if (isset($this->error[$this->input])) 
			{
				$this->error[$this->input] = $message;
			}
		}

		private function is_request (): bool
		{
			return (bool) !empty($this->input) && isset($this->data);
		}

		public function errors (): array 
		{
			return (array) $this->error;
		}

		public function is_valid (): bool
		{
			if ($this->errors_count == 0) 
			{
				if (empty($this->error) && count($this->error) == 0) 
				{
					return true;
				}
			}

			return false;
		}
	}
?>