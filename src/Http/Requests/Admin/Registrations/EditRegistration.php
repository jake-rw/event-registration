<?php

namespace App\Http\Requests\Admin\Registrations;

use Illuminate\Foundation\Http\FormRequest;

class EditRegistration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cf_fname.required' => 'First Name is required',
            'cf_lname.required' => 'Family Name is required',
            'cf_email.required' => 'Email is required',            
            'cf_tel.required' => 'Telephone is required',
            'cf_job_title.required' => 'Job title is required',
            'cf_requirements.required' => 'Dietry requirements is required',
            'cf_medical.required' => 'Medical information is required',
            'cf_company.required' => 'Company name is required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bid' => 'required|numeric',
            'cf_fname' => 'required|max:255',
            'cf_lname' => 'required|max:255',
            'cf_email' => 'required|max:255|email',
            'cf_tel' => 'required|max:255',
            'cf_job_title' => 'required|max:255',
            'cf_requirements' => 'required|max:255',
            'cf_medical' => 'required|max:255',
            'cf_company' => 'required|max:255',
        ];
    }
}
