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
            'marital_status'            => 'required|in:single,married,divorced,widower',
            'type_of_marriage'          => 'required|string|max:255',
            'age'                       => 'required|integer|min:18|max:99',
            'children_number'           => 'required|string|max:255',
            'weight'                    => 'required|integer|min:30|max:300',
            'height'                    => 'required|integer|min:50|max:250',
            'skin_color'                => 'required|string|max:255',
            'physique'                  => 'required|string|max:255',
            'religious_commitment'      => 'required|string|max:255',
            'prayer'                    => 'required|string|max:255',
            'smoking'                   => 'required_if:gender,male',
            'hijab'                     => 'required_if:gender,female|string|max:255', //hijab,not_hijab,hijab_and_veil
            'educational_qualification' => 'required|string|max:255',
            'financial_situation'       => 'required|string|max:255',
            'job'                       => 'required|string|max:255',
            'work_field'                => 'nullable|string|max:255',
            'income'                    => 'required|string',
            'health_condition'          => 'required|string|max:255',
            'life_partner'              => ['required','string', new NoLinksOrPhones],
            'about_me'                  => ['required','string',new NoLinksOrPhones()],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $this->throwValidationException($validator);
    }
}
