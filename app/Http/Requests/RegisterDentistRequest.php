<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDentistRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'company_name' => 'required',
            'rfc' => 'required|min:13|alpha_num',
            'street' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required|min:5',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric|digits:10',
            'terms' => 'accepted'
        ];

    }

    
    public function messages()
{
    return [
        'name.required' => 'Es necesario que ingreses tu nombre',
        'name.max' => 'tu nombre debe contener solo 100 caracteres',
        'surname.required' => 'Es necesario que ingreses tu apellido',
        'email.required' => 'Es necesario que ingreses tu corre electronico',
        'email.unique' => 'El email ingresado, ya se encuentra en uso',
        'email.email' => 'Recuerda que debe tener formato email, ejemplo - algo@gmail.com',
        'password.required' => 'Es neceario que ingreses tu password',
        'password.confirmed' => 'Las contraseñas ingresadas no coinciden',
        'password.min' => 'Tu password debe contener minimo 6 caracteres',
        'company_name.required' => 'Es necesario que ingreses el nombre de tu consultorio',
        'rfc.required' => 'Es necesario que ingreses tu RFC',
        'rfc.min' => 'Recuerda que tu RFC esta compuesta por 13 numeros y letras',
        'rfc.alpha_num' => 'Recuerda que tu RFC debe contener caracteres alfanumericos',
        'street.required' => 'Es necesario que ingreses tu calle',
        'house_number.required' => 'Es necesario que ingreses el numero de tu casa',
        'postal_code.required' => 'Es necesario que ingreses el codigo postal',
        'postal_code.min' => 'Recuerda que el codigo postal son minimo 5 digitos',
        'state.required' => 'Es necesario que ingreses el estado',
        'city.required' => 'Es necesario que ingreses la ciudad',
        'phone.required' => 'Es necesario que ingreses algun numero de contacto a 10 digitos',
        'phone.numeric' => 'Recuerda que el telefono solo debe contener numeros',
        'phone.digits' => 'Tu telefono debe contener 10 dijitos',
        'terms.accepted' => 'Debes aceptar los terminos y condiciones'
    ];
}
}
