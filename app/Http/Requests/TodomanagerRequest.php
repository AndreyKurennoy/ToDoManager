<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Created by PhpStorm.
 * User: moga
 * Date: 16.03.17
 * Time: 9:55
 */
class TodomanagerRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'title'       => "required|min:1|max:64",
			'date'        => "required|date",
		];
	}

	/**
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function getValidatorInstance()
	{
		$data = $this->all();

		$data['status'] = isset($data['status']) ? 1 : 0;

		$this->getInputSource()->replace($data);

		return parent::getValidatorInstance();
	}

	public function all()
	{
		$data = parent::all();

		return $data;
	}
}