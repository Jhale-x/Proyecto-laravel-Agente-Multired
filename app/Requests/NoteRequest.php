<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NoteRequest extends FormRequest
{
    public function authorize(): bool
    {

        return true;
        
    }

    public function rules(): array
    {
        return [
            'dni' => ['required','min:8'],
            'nombre' => ['required','max:50'],
            'apellido' => ['required','max:50'],
            'telefono' => ['required','min:9','max:9'],
            'direccion' => ['required','max:100'],
            'fecha_nacimiento' => ['required','date'],
            'password' => [$this->isMethod('post') ? 'required' : 'nullable'],
            'usuario' => ['required','max:20'],
            'rol' => ['required','in:admin,user'],
            'foto' => ['nullable','image','max:2048'],
            'estado' => ['required','in:0,1,2'],
            'fecha_reg' => ['nullable','date'],
        ];
    }
}
