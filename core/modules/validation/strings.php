<?php
	
	namespace Core\Modules\Validation;

	trait Strings 
	{
		public function name (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^\p{L}+$/u', $this->data)) 
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

		public function alpha (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[a-zA-Z]+$/', $this->data)) 
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

		public function alphas (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[a-zA-Z\s]*$/', $this->data)) 
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

		public function alnum (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[a-zA-Z0-9]+$/', $this->data)) 
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

		public function alnums (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all('/^[a-zA-Z0-9\s]+$/', $this->data)) 
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

		public function length ($length): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (strlen($this->data) !== $length)
						{
							$this->error[$this->input] = $this->message['length'].' '.$length;
							$this->errors_count++;
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['length'].' '.$length;
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		public function min_str ($length): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (strlen($this->data) < $length)
						{
							$this->error[$this->input] = $this->message['min_str'].' '.$length;
							$this->errors_count++;
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['min_str'].' '.$length;
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		public function max_str ($length): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (strlen($this->data) > $length)
						{
							$this->error[$this->input] = $this->message['max_str'].' '.$length;
							$this->errors_count++;
						}
					}
					else
					{
						$this->error[$this->input] = $this->message['max_str'].' '.$length;
						$this->errors_count++;
					}
				}
			}

			return $this;
		}

		public function regex ($pattern): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!preg_match_all($pattern, $this->data)) 
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

		public function email (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!filter_var($this->data, FILTER_VALIDATE_EMAIL)) 
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

		public function url (): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if (!filter_var($this->data, FILTER_VALIDATE_URL)) 
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

		public function confirm (String $inputConfirm): Examine
		{
			if ($this->is_request())
			{
				if (!empty($this->data)) 
				{
					if (is_string($this->data))
					{
						if ($this->data === $_REQUEST[$inputConfirm]) 
						{
							
						}
						else 
						{
							$this->error[$this->input] = $this->message['confirm'];
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
	}
?>