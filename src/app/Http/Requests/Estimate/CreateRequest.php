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
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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


    /**
     * 見積もり番号取得
     *
     * @return string
     */
    public function getEstimateNumber(): string
    {
        return $this->get("estimate_number");
    }


    /**
     * 件名取得
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->get('subject');
    }


    /**
     * 取引先ID取得
     *
     * @return string
     */
    public function getClients(): string
    {
        return $this->get('clients');
    }


    /**
     * 担当者ID取得
     *
     * @return string
     */
    public function getStaff(): string
    {
        return $this->get('staff');
    }

    /**
     * 発行日取得
     *
     * @return string
     */
    public function getPublishdate(): string
    {
        return $this->get("publish_date");
    }

    /**
     * 有効期限取得
     *
     * @return string
     */
    public function getEffectivedate(): string
    {
        return $this->get("effective_date");
    }

    /**
     * 有効期限取得
     *
     * @return string
     */
    public function getRemarks(): string
    {
        return $this->get("remarks");
    }
}
