<?php

namespace App\Http\Requests;

use App\Models\employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'id_card' => ['required'],
            'role' => ['required'],
            'salary_month' => ['required'],
            'depart_id' => ['required'],
            'vacation_balance' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name Is required',
            'id_card.required' => 'id_card Is required',
            'role.required' => 'role Is required',
            'salary_month.required' => 'salary_month Is required',
            'depart_id.required' => 'depart_id Is required',
            'vacation_balance.required' => 'vacation_balance Is required',



        ];
    }
}
