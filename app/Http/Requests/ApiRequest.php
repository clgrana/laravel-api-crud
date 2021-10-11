<?php


namespace App\Http\Requests;
use App\Utils\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();
        $message=[];
        foreach ($errors as $ke => $e){
            /**  Adaptaçao para retorno das mensagens em forma de array quando a validaçao for em array de objetos */
            $isArray = strpos($ke, '.');
            if (!empty($isArray)){
                $keys = explode('.', $ke);
                $message[$keys[0]][$keys[1]][$keys[2]] = str_replace('.', '', implode(', ', $e));

            }else {
                $message[$ke] = str_replace('.', '', implode(', ', $e));
            }
        }

        throw new HttpResponseException(response()->json(['message' => $message], Status::API_ERROR_VALIDATION));
    }
}
