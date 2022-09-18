<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Buyer
 *
 * @property int $id
 * @property string $email
 * @property string $tel
 * @property string $contact_person_family_name 販売先担当者姓
 * @property string $contact_person_given_name 販売先担当者名
 * @property int $prefecture_id 都道府県ID
 * @property string $postal_code 郵便番号
 * @property string $city 市
 * @property string $town 町
 * @property string $building ビル、町以下
 * @property string $remarks 備考
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereContactPersonFamilyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereContactPersonGivenName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer wherePrefectureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Buyer extends Model
{
    use HasFactory;

    protected $guarded = [];
}
