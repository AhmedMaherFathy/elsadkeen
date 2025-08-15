<?php

namespace App\Http\Requests;

use App\Rules\NoLinksOrPhones;
use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreUserAttributeRequest extends FormRequest
{
    use HttpResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nationality_id'            => 'required|exists:nationalities,id',
            'country_id'                => 'required|exists:countries,id',
            'city_id'                   => 'required|exists:cities,id',
            'health_condition_id'       => 'required|string|max:255',
            'financial_situation_id'    => 'required|string|max:255',
            'qualification_id'          => 'required|string|max:255',
            'skin_color_id'             => 'required|string|max:255',
            'physique_id'               => 'required|string|max:255',
            'marital_status'            => 'required|in:single,married,divorced,widower',
            'type_of_marriage'          => 'required|in:only_one,multi',
            'age'                       => 'required|integer|min:18|max:99',
            'children_number'           => 'required|integer|max:99',
            'weight'                    => 'required|integer|min:30|max:300',
            'height'                    => 'required|integer|min:50|max:250',
            'religious_commitment'      => 'required|in:religious,little_religious,irreligious',
            'prayer'                    => 'required|in:always,interittent,no_pray',
            'smoking'                   => 'required|in:0,1',  //0 => no
            'hijab'                     => 'required|in:hijab,not_hijab,hijab_and_veil', //hijab,not_hijab,hijab_and_veil
            'job'                       => 'required|string|max:255',
            // 'work_field'                => 'nullable|string|max:255',
            'income'                    => 'required|integer',
            'life_partner'              => ['required','string', new NoLinksOrPhones],
            'about_me'                  => ['required','string',new NoLinksOrPhones()],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $this->throwValidationException($validator);
    }
}
