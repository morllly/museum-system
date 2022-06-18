<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "inventory_number"  => "required|max:255",
            "title"             => "required|max:255",
            "keyword_id"        => "required",
            "collection_id"     => "required",
            "creator"           => "required|max:255",
            "receipt_date"      => "required|date",
            "entry_method"      => "required",
            "creation_time"     => "required|max:255",
            "characteristics"   => "required",
            "description"       => "required",
            "safety"            => "required",
            "image"             => "mimes:jpeg,jpg,png",
        ];
    }
}
