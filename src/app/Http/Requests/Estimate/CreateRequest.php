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
            "name1" => 'required',
            "unit1" => 'required',
        ];
    }   


    /**
     * 見積もり番号取得
     *
     * @return string
     */
    public function getEstimatenumber(): string
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

    /**
     * 品名取得(1行目)
     *
     * @return string
     */
    public function getName1(): string
    {
        return $this->get("name1");
    }

    /**
     * 品名取得(2行目)
     *
     * @return string
     */
    public function getName2()
    {
        return $this->get("name2");
    }

    /**
     * 品名取得(3行目)
     *
     * @return string
     */
    public function getName3()
    {
        return $this->get("name3");
    }

    /**
     * 品名取得(4行目)
     *
     * @return string
     */
    public function getName4()
    {
        return $this->get("name4");
    }

    /**
     * 品名取得(5行目)
     *
     * @return string
     */
    public function getName5()
    {
        return $this->get("name5");
    }

    /**
     * 品名取得(6行目)
     *
     * @return string
     */
    public function getName6()
    {
        return $this->get("name6");
    }
  
    /**
     * 品名取得(7行目)
     *
     * @return string
     */
    public function getName7()
    {
        return $this->get("name7");
    }

    /**
     * 品名取得(8行目)
     *
     * @return string
     */
    public function getName8()
    {
        return $this->get("name8");
    }

    /**
     * 品名取得(9行目)
     *
     * @return string
     */
    public function getName9()
    {
        return $this->get("name9");
    }

    /**
     * 品名取得(10行目)
     *
     * @return string
     */
    public function getName10()
    {
        return $this->get("name10");
    }

    /**
     * 単位取得(1行目)
     *
     * @return string
     */
    public function getUnit1(): string
    {
        return $this->get("unit1");
    }
 
   /**
     * 単位取得(2行目)
     *
     * @return string
     */
    public function getUnit2()
    {
        return $this->get("unit2");
    }

    /**
     * 単位取得(3行目)
     *
     * @return string
     */
    public function getUnit3()
    {
        return $this->get("unit3");
    }

    /**
     * 単位取得(4行目)
     *
     * @return string
     */
    public function getUnit4()
    {
        return $this->get("unit4");
    }

    /**
     * 単位取得(5行目)
     *
     * @return string
     */
    public function getUnit5()
    {
        return $this->get("unit5");
    }

    /**
     * 単位取得(6行目)
     *
     * @return string
     */
    public function getUnit6()
    {
        return $this->get("unit6");
    }

    /**
     * 単位取得(7行目)
     *
     * @return string
     */
    public function getUnit7()
    {
        return $this->get("unit7");
    }

    /**
     * 単位取得(8行目)
     *
     * @return string
     */
    public function getUnit8()
    {
        return $this->get("unit8");
    }

    /**
     * 単位取得(9行目)
     *
     * @return string
     */
    public function getUnit9()
    {
        return $this->get("unit9");
    }

    /**
     * 単位取得(10行目)
     *
     * @return string
     */
    public function getUnit10()
    {
        return $this->get("unit10");
    } 
}
