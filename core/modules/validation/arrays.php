<?php
	namespace Core\Modules\Validation;

	trait Arrays
	{

		/**
		 *	Any type of array
		 */
		public function array (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (!is_array($this->data)) 
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Associative Array
		 *  EX: ['key' => 'value', 'key' => 'value']
		 */
		public function assoc (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (!is_array($this->data)) 
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
					else
					{
						if (!count(array_filter(array_keys($this->data), 'is_string')) > 0) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;	
						}
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential Array
		 *  EX: ['value', 'value', 'value']
		 */
		public function sequential (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (!is_array($this->data)) 
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
					else
					{
						if (!count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;	
						}
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain single positive number only [0,1,2,3,4,5]
		 */
		public function array_digit (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^\\d$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain positive numbers only [0,1,2,3,4,5,33 ...]
		 */
		public function array_digits (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^[0-9]+$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain rational numbers
		 */
		public function array_rational (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^-?\d+(?:\.\d+)?$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}
		
		/**
		 *	Sequential array contain whole numbers
		 */
		public function array_whole (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^[0-9]+$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain natural numbers
		 */
		public function array_natural (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^[1-9][0-9]*$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain positive numbers
		 */
		public function array_positive (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^\d+(?:\.\d+)?$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain negative numbers
		 */
		public function array_negative (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^-\d+(?:\.\d+)?$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		/**
		 *	Sequential array contain integers
		 */
		public function array_integers (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if (!preg_match_all('/^-?\d+(?:\d+)?$/', $value)) {
								$this->error[$this->input] = $this->message['invalid'];
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['invalid'];
						$this->errors_count++;
					}
				}
			}

			return $this;
		}		

		public function array_max ($num): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if ($value > $num) {
								$this->error[$this->input] = $this->message['max_num'].' '.$num;
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['max_num'].' '.$num;
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		public function array_min ($num): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_array($this->data) && count(array_filter(array_keys($this->data), 'is_string')) <= 0) 
					{
						foreach ($this->data as $value) 
						{
							if ($value < $num) {
								$this->error[$this->input] = $this->message['min_num'].' '.$num;
								$this->errors_count++;
							}
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['min_num'].' '.$num;
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

	}
?>