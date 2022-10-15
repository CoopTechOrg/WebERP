<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Estimate
 *
 * @property int $id
 * @property string $no 見積もり番号
 * @property string $subject 件名
 * @property int $buyer_id 販売先id
 * @property int $contacted_by 担当者
 * @property string $submitted_at 提出日
 * @property int $is_lost 失注フラグ
 * @property string $expired_at 有効期限
 * @property string $remarks 備考
 * @property int $created_by 作成者
 * @property int $updated_by 更新者
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereContactedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereIsLost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Estimate extends Model
{
    use HasFactory;
}
