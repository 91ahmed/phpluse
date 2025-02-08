<?php
	namespace Core\Modules\Validation;

	trait Numbers
	{
		/**
		 *	Accept any positive or negative numbers
		 */
		public function numbers (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^-?\d+$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Digits (accept positive numbers only)
		 *  [0,1,2,3,4,59 ...]
		 */
		public function digits (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[0-9]+$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Digit (accept single positive numbers)
		 *  [0,1,2,3,4,5,6,7,8,9]
		 */
		public function digit (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^\\d$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Rational Numbers
		 *  Q = [... -1,-2,-3,-4,-5,0,1,2,3,4,5,1/2,0.56,4/3 ...]
		 */
		public function rational (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^-?\d+(?:\.\d+)?$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Natural / Counting Numbers
		 *  N = [1,2,3,4,5 ...]
		 */
		public function natural (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[1-9][0-9]*$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Whole Numbers
		 *  W = [0,1,2,3,4,5 ...]
		 */
		public function whole (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[0-9]+$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 *	Integer Numbers
		 *  Z = [... -1,-2,-3,-4,-5,0,1,2,3,4,5 ...]
		 */
		public function integer (): Examine
		{
			if ($this->is_request()) 
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^-?\d+(?:\d+)?$/', $this->data)) {
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 * Positive Numbers
		 * [0,1,2,3...]
		 */
		public function positive (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^\d+(?:\.\d+)?$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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
		 * Negative Numbers
		 * [... -3,-2,-1]
		 */
		public function negative (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^-\d+(?:\.\d+)?$/', $this->data)) 
						{
							$this->error[$this->input] = $this->message['invalid'];
							$this->errors_count++;
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

		public function max_num ($num): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if ($this->data > $num) 
						{
							$this->error[$this->input] = $this->message['max_num'].' '.$num;
							$this->errors_count++;
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

		public function min_num ($num): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if ($this->data < $num) 
						{
							$this->error[$this->input] = $this->message['min_num'].' '.$num;
							$this->errors_count++;
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