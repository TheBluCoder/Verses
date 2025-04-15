<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
//        dd($this->all());
        $validationRules = [
            "comment" => "bail|required|string",
            "commentableId" => "prohibited",
            "commentableType" => "prohibited"
        ];
        return $this->getValidationRules($validationRules);
    }


    private function getValidationRules(Array &$defaultValidationRule): array{
        $postValidationRules = [
            "commentableId" => "bail|required|exists:posts,id",
            "commentableType" => "bail|required|string",
        ];
        $commentValidationRules = [
            "commentableId" => "bail|required|exists:comments,id",
            "commentableType" => "bail|required|string",
        ];
        if($this->get("commentableType") === "post"){
            return array_merge($defaultValidationRule, $postValidationRules );
        }
        elseif($this->get("commentableType") === "comment"){
            return array_merge($defaultValidationRule, $commentValidationRules );
        }
        return $defaultValidationRule;
    }


}
