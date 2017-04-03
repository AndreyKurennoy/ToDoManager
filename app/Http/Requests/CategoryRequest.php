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
            'color'        => "required|min:1|max:64",
        ];
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $data = $this->all();

        $this->getInputSource()->replace($data);
        return parent::getValidatorInstance();
    }

    public function all()
    {
        $data = parent::all();

        return $data;
    }
}