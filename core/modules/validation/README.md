```php
	/**
	 * check the data that comes from http GET and POST request.
	 * @param string (input name)
	 */
	request('input name')

	/**
	 * check the user data.
	 * @param mixed (data)
	 * @param string *optional* (label)
	 */
	data('your data', 'label')

	/**
	 * check the file inputs.
	 * @param string (file input name)
	 */
	file('file input name')

	/** EG. **/
	$data = new Examine();
	$data->request('username')->required()->alnums()->min_str(8);
	$data->request('age')->required()->rational()->min_num(7);
	$data->request('id')->required()->array_digits()->array_max(8);
	$data->data(['user' => 'ahmed91'], 'name')->assoc();
	$data->data([23], 'age')->sequential();
	$data->file('image')->file_required()->file_extension(['png','jpg'])->file_size(2034449);

	var_dump($data->errors());

	if ($data->is_valid())
	{
		echo 'success';
	}
```