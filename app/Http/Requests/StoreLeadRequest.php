<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:leads',
            'message' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.required' => 'Имя обязательно для заполнения.',
            'first_name.string' => 'Имя должно быть строкой.',
            'first_name.max' => 'Имя не должно превышать 255 символов.',
            'last_name.required' => 'Фамилия обязательна для заполнения.',
            'last_name.string' => 'Фамилия должна быть строкой.',
            'last_name.max' => 'Фамилия не должна превышать 255 символов.',
            'phone.required' => 'Номер телефона обязателен для заполнения.',
            'phone.string' => 'Номер телефона должен быть строкой.',
            'phone.max' => 'Номер телефона не должен превышать 20 символов.',
            'email.required' => 'E-mail обязателен для заполнения.',
            'email.email' => 'Введите корректный e-mail адрес.',
            'email.max' => 'E-mail не должен превышать 255 символов.',
            'email.unique' => 'E-mail не должен превышать 255 символов.',
            'message.required' => 'Текст обращения обязателен для заполнения.',
            'message.string' => 'Текст обращения должен быть строкой.',
        ];
    }

}
