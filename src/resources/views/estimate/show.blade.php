@extends('layouts.app')

@section('content')
<div class="container estimate estimate-show">

    <form action="{{url('estimate/index')}}" method="post">
        
        <div class="show__wrapper">
            <!-- 見積もり概要 Start -->
            <div class="show__detail">
                <table class="detail__table">
                    <tbody>
                        <tr>
                            <th>取引先</th>
                            <td>{{ $estimateData['clients'] }}様</td>
                        </tr>
                        <tr>
                            <th>発行日</th>
                            <td>{{ $estimateData['publish_date'] }}</td>
                        </tr>
                        <tr>
                            <th>見積番号</th>
                            <td>{{ $estimateData['estimate_number'] }}</td>
                        </tr>
                        <tr>
                            <th>件名</th>
                            <td>{{ $estimateData['subject'] }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="detail__table right-table">
                    <tbody>
                        <tr>
                            <th>社名・担当者</th>
                            <td>{{ $estimateData['staff'] }}様</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- 見積もり概要 End -->

            <!-- 見積書 Start -->
            <div class="show__quotation">
                <div class="quotaion__container">
                    <h3 class="quotation__title">見積書</h3>
                    <!-- 見積 宛先 Start -->
                    <div class="quotation__summary">
                        <div class="client-data">
                            <p class="client">{{ $estimateData['clients'] }}様</p>
                            <p class="subject"><span>件名：</span><span class="subject-title">{{ $estimateData['subject'] }}</span></p>
                            <p class="txt">下記の通りお見積もり申し上げます。</p>
                            <div class="quotation-total-wrapper">
                                <span class="label">お見積金額</span><span class="total-price">¥{{ $estimateData['total_amount'] }}-</span>
                            </div>
                        </div>
                        <div class="my-data">
                            <!-- TODO 自分の情報を呼び出す -->
                            <p class="my-name">田中 太郎</p>
                            <p class="my-address">住所: 東京都千代田区千代田１−１</p>
                            <p class="my-tel">TEL: 090-1111-2222</p>
                            <p class="my-mail">メールアドレス: 1234567@12355.js</p>
                        </div>
                    </div>
                    <!-- 見積 宛先 End -->

                    <!-- 見積 明細 Start -->
                    <div class="quotation__detail">
                        <table class="detail-table">
                            <thead>
                                <tr>
                                    <th class="common-row product-name">品番・品名</th>
                                    <th class="common-row qty-row">数量</th>
                                    <th class="common-row unit-row">単価</th>
                                    <th class="common-row amount-row">金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name1'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty1'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice1'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount1'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name2'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty2'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice2'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount2'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name3'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty3'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice3'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount3'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name4'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty4'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice4'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount4'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name5'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty5'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice5'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount5'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name6'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty6'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice6'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount6'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name7'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty7'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice7'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount7'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name8'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty8'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice8'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount8'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name9'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty9'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice9'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount9'] }}</td>
                                </tr>
                                <tr>
                                    <td class="common-row item-row product-name">{{ $estimateData['name10'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['qty10'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['unitPrice10'] }}</td>
                                    <td class="common-row item-row">{{ $estimateData['amount10'] }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="1"></td>
                                    <th colspan="" class="total-row">小計</th>
                                    <td class="total-row"></td>
                                    <td class="total-row total-item">{{ $estimateData['sub_total'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <th class="total-row">消費税({{ $estimateData['tax_rate'] }}%)</th>
                                    <td class="total-row"></td>
                                    <td class="total-row total-item">{{ $estimateData['tax_value'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <th class="total-row">合計</th>
                                    <td class="total-row"></td>
                                    <td class="total-row total-item">{{ $estimateData['total_amount'] }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="remarks-area">
                            <p class="remarks">{{ $estimateData['remarks'] }}</p>
                        </div>
                    </div>
                    <!-- 見積 明細 End -->
                </div>
            </div>
            <!-- 見積書 End -->
        </div>

        <!-- 保存削除ボタン Start -->
        <div class="estimate__save-control">
            <!-- TODO 発行,編集,保存処理 -->
            <button type="submit" class="common_control_btn save save_color"><i class="fas fa-file-alt common_icon_margin"></i>発行</button>
            <a href="/home" class="common_control_btn delete neutral_color"><i class="fas fa-pen common_icon_margin"></i>編集</a>
            <a href="/home" class="common_control_btn delete delete_color"><i class="fas fa-trash-alt common_icon_margin"></i>削除</a>
        </div>
        <!-- 保存削除ボタン End -->

    </form>
</div>
@endsection
