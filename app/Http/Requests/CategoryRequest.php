<?php
/**
 * Created by PhpStorm.
 * User: 19ofi
 * Date: 03.04.2017
 * Time: 9:34
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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