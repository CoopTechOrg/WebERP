@extends('layouts.app')

@section('content')
<div class="container estimate">
    <form action="{{url('estimate/testform')}}" method="post" class="estimate__container">
        @csrf
        <div class="estimate__container">
            <div class="estimate__wrapper">
                <div class="estimate__header">{{ __('見積書作成') }}</div>

                <!-- 概要入力 Start -->
                <div class="estimate__detail">

                    <div class="detail_block client">
                        <div class="client__left_block">
                            <label for="clients" class="detail_label require">取引先</label>
                            <select required name="clients" id="clients" class="common_select common_height base_width">
                                <option hidden>選択してください</option>
                            </select>
                        </div>
                        <div>
                            <label for="staff" class="detail_label require">社名・担当者</label>
                            <select required name="staff" id="staff" class="common_select common_height sub_width">
                                <option hidden>選択してください</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="detail_block schedule">
                        <div class="schedule__left_block">
                            <label for="publish_date" class="detail_label require">発行日</label>
                            <input required type="date" name="publish_date" id="publish_date" class="common_input common_height">
                        </div>
                        <div>
                            <label for="effective_date" class="detail_label">有効期限</label>
                            <input type="date" name="effective_date" id="effective_date" class="common_input common_height">
                        </div>
                    </div>

                    <div class="detail_block estimate_number">
                        <div>
                            <label for="estimate_number" class="detail_label base_width">見積番号</label>
                            <input type="text" name="estimate_number" id="estimate_number" class="common_input common_height base_width">
                        </div>
                    </div>

                    <div class="detail_block subject">
                        <div>
                            <label for="subject" class="detail_label base_width">件名</label>
                            <input type="text" name="subject" id="subject" class="common_input common_height base_width">
                        </div>
                    </div>

                </div>
                <!-- 概要入力 End -->

                <!-- 品名・数量等 Start -->
                <div class="estimate__description">
                    <div class="description-table">
                        <div class="description-table__head row">
                            <span class="name row-first head-label">品番・品名</span>
                            <span class="qty head-label">数量</span>
                            <span class="unit head-label">単位</span>
                            <span class="unit-price price_width head-label">単価</span>
                            <span class="price_width row-last head-label">金額</span>
                        </div>
                        
                        <div id="detailList">
                            <!-- 画面最下部にある合計値の項目は、Vueコンポーネント内に存在しているため、 position:absolute で位置を指定しています -->
                            <estimate-detail-inputs></estimate-detail-inputs>
                        </div>
                    </div>
                </div>
                <!-- 品名・数量等 End -->

                <!-- 備考欄 Start -->
                <div class="remark estimate__detail estimate__description">
                    <label for="remarks" class="base_width detail_label">備考</label>
                    <textarea name="remarks" id="remarks" class="remarks__textarea"></textarea>
                </div>
                <!-- 備考欄 End -->

            </div>

            <!-- 保存削除ボタン Start -->
            <div class="estimate__save-control">
                <button type="submit" class="common_control_btn save save_color"><i class="fas fa-plus-circle common_icon_margin"></i>{{__('保存')}}</button>
                <a href="/home" class="common_control_btn delete delete_color"><i class="fas fa-trash-alt common_icon_margin"></i>{{__('削除')}}</a>
            </div>
            <!-- 保存削除ボタン End -->
        </div>

    </form>

</div>
@endsection
