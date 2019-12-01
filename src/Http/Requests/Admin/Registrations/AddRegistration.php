<?php

namespace JakeRw\EventRegistration\Http\Requests\Admin\Registrations;
use Illuminate\Foundation\Http\FormRequest;

class AddRegistration extends FormRequest
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
            'cf_fname.required'        => 'First Name is required',
            'cf_lname.required'        => 'Surname is required',
            'cf_email.required'        => 'Email is required',
            'cf_email.unique'          => 'This email has already been taken',
            'cf_tel.required'          => 'Telephone is required',
            'cf_job_title.required'    => 'Job title is required',
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
            'cf_fname'        => 'required|max:255',
            'cf_lname'        => 'required|max:255',
            'cf_email'        => 'required|email|unique:registrations',
            'cf_job_title'    => 'required|max:255',
            'cf_tel'          => 'required|max:255',           
            'cf_company'      => 'nullable|max:255',
            'cf_consent'      => 'nullable',
        ];
    }
}
