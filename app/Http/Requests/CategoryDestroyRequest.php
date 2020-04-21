<?php

namespace App\Http\Requests;
use config;
use Illuminate\Foundation\Http\FormRequest;

class CategoryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('categories') == config('cms.category.default_category_id'));
    }

    public function forbiddenResponse(){
        toastr()->error('You Cant delete the default category', 'Error');
        return redirect()->back();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
