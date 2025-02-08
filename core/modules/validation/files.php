<?php
	namespace Core\Modules\Validation;
	
	trait Files
	{
		private $file = array();

		private $fname = array();
		private $fextension  = array();
		private $ftmp_name  = array();
		private $ftype = array();
		private $fsize = array();

		private function files () 
		{
			if ($this->is_request()) 
			{
				if (isset($this->data)) 
				{
					if (is_string($this->data['name'])) // if single file
					{
						if (!empty($this->data['name'])) 
						{
							array_push($this->fname, $this->data['name']);
							array_push($this->ftmp_name, $this->data['tmp_name']);
							array_push($this->ftype, $this->data['type']);
							array_push($this->fsize, $this->data['size']);

							$ext = explode('.', $this->data['name']);
							$ext = end($ext);
							array_push($this->fextension, strtolower($ext));
						}
					}
					elseif (is_array($this->data['name'])) // if multiple files
					{
						if (!empty($this->data['name'][0])) 
						{
							foreach ($this->data['name'] as $key => $value)
							{
								array_push($this->fname, $value);

								$ext = explode('.', $value);
								$ext = end($ext);
								array_push($this->fextension, strtolower($ext));
							}

							foreach ($this->data['tmp_name'] as $key => $value)
							{
								array_push($this->ftmp_name, $value);
							}

							foreach ($this->data['type'] as $key => $value)
							{
								array_push($this->ftype, $value);
							}						

							foreach ($this->data['size'] as $key => $value)
							{
								array_push($this->fsize, $value);
							}
						}
					}
				}
			}

			$this->file['name'] = $this->fname;
			$this->file['tmp_name'] = $this->ftmp_name;
			$this->file['type'] = $this->ftype;
			$this->file['size'] = $this->fsize;
			$this->file['extension'] = $this->fextension;
		}

		public function file_required () 
		{
			if (isset($this->file['name']) && empty($this->file['name'])) 
			{
				$this->error[$this->input] = $this->message['required'];
			}

			return $this;
		}

		public function file_extension (array $exts) 
		{
			if (isset($this->file['extension']) && !empty($this->file['extension']))
			{
				foreach ($this->file['extension'] as $ex) {
					if (!in_array($ex, $exts)) {
						$this->error[$this->input] = $this->message['file_extension'].' ('.implode(', ', $exts).')';
					}
				}
			}

			return $this;
		}

		public function file_type (array $types) 
		{
			if (isset($this->file['type']) && !empty($this->file['type']))
			{
				foreach ($this->file['type'] as $ty) {
					if (!in_array($ty, $types)) {
						$this->error[$this->input] = $this->message['file_type'].' ('.implode(', ', $types).')';
					}
				}
			}

			return $this;
		}

		public function file_size (int $size) 
		{	
			if (isset($this->file['size']) && !empty($this->file['size']))
			{
				foreach ($this->file['size'] as $si) {
					var_dump($si);
					var_dump($size);
					var_dump($this->human_readable_size($size));
					if ($si > $size) {
						$this->error[$this->input] = $this->message['file_size'].' '.$this->human_readable_size($size);
					}
				}
			}

			return $this;
		}

		public function human_readable_size ($bytes, $decimals = 2) 
		{
		    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
		    $factor = floor((strlen($bytes) - 1) / 3);
		    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
		}
	}
?>