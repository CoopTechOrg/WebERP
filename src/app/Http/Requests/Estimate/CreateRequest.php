<?php

namespace App\Http\Requests\Estimate;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (bool) 'true';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 見積も作成画面で入力したデータを取得
        return [
            "estimate_number" => 'required',
            "subject" => 'required',
            "clients" => 'required',
            "staff" => 'required',
            "publish_date" => 'required',
            "effective_date" => 'required',
            "remarks" => 'required',
        ];
    }
}
