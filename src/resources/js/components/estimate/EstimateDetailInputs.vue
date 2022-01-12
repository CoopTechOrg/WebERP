<template>
    <!-- 見積もり入力欄 -->
    <div id="estimateDetailContainer">
        <ul class="details">
            <li class="details__item" v-for="item in ids" :key="item.id">
                <div class="row">
                    <!-- 品番・品名 -->
                    <common-estimate-detail-input
                        :id="item.id"
                        :type="'text'"
                        :name="'name'"
                        :value="item.nameValue"
                        :classes="'name common_height common_input row-first'"
                        @input="item.nameValue = $event"
                    >
                    </common-estimate-detail-input>

                    <!-- 数量 -->
                    <common-estimate-detail-input
                        :id="item.id"
                        :type="'number'"
                        :name="'qty'"
                        :value="item.qtyValue"
                        :classes="'qty common_height common_input'"
                        @input="updateQtyValue( item.qtyValue, $event, item.id )"
                    >
                    </common-estimate-detail-input>

                    <!-- 単位 -->
                    <common-estimate-detail-input
                        :id="item.id"
                        :type="'text'"
                        :name="'unit'"
                        :value="item.unitValue"
                        :classes="'unit common_height common_input'"
                        @input="item.unitValue = $event"
                    >
                    </common-estimate-detail-input>

                    <!-- 単価 -->
                    <common-estimate-detail-input
                        :id="item.id"
                        :type="'number'"
                        :name="'unitPrice'"
                        :value="item.unitPriceValue"
                        :classes="'unit-price price_width common_height common_input'"
                        @input="updateUnitPriceValue( item.unitPriceValue, $event, item.id )"
                    >
                    </common-estimate-detail-input>

                    <!-- 金額 -->
                    <common-estimate-detail-input
                        :id="item.id"
                        :type="'number'"
                        :name="'amount'"
                        :value="item.amountValue"
                        :classes="'price_width common_height common_input row-last'"
                        @input="item.amountValue = $event"
                    >
                    </common-estimate-detail-input>
                </div>
            </li>
        </ul>
        <p class="add-line_btn" @click="addLine"><span class="circle">+</span><span class="btn_str">行の追加</span></p>
        <div class="total">
            <table class="total-table">
                <tr class="total-table__row total-table__subtotal">
                    <th class="total-table__label">小計</th>
                    <td class="total-table__item">¥{{ displaySubTotal }}</td>
                </tr>
                <tr class="total-table__row total-table__tax">
                    <th class="total-table__label">消費税({{ displayTaxRate }}%)</th>
                    <td class="total-table__item">¥{{ displayTaxValue }}</td>
                </tr>
                <tr class="total-table__row total-table__total_amount">
                    <th class="total-table__label">合計</th>
                    <td class="total-table__item">¥{{ displayTotalAmount }}</td>
                </tr>
            </table>
        </div>

        <div class="absolute-total">
            <div class="absolute-total__wrapper">
                <div class="total__item">
                    <p class="label">小計</p>
                    <p class="price"><span class="common-price font-bold">{{ displaySubTotal }}</span>円</p>
                </div>
                <div class="total__item">
                    <p class="label">消費税</p>
                    <p class="price"><span class="common-price font-bold">{{ displayTaxValue }}</span>円</p>
                </div>
                <div class="total__item last-total__item">
                    <p class="label font-bold">合計</p>
                    <p class="price font-bold"><span class="last-total-price">{{ displayTotalAmount }}</span>円</p>
                </div>
                
                
                

                <!-- 保存削除ボタン Start -->
                <div class="estimate__save-control absolute-total-inner">
                    <button type="submit" class="common_control_btn save save_color"><i class="fas fa-plus-circle common_icon_margin"></i>保存</button>
                </div>
                <!-- 保存削除ボタン End -->
            </div>
        </div>
    </div>
</template>

<script>
import CommonEstimateDetailInput from './CommonEstimateDetailInput.vue';
export default {
    components: {CommonEstimateDetailInput,},
    data: function() {
        return {
            taxRate: 0.1,
            ids: [
                {
                    id: 1,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 2,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 3,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 4,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
            ],
            
        };
    },
    computed: {
        displayTaxRate: function() {
            return this.taxRate * 100;
        },
        subTotal: function() {
            let val = 0;
            const subTotals = this.ids.map( item => {
                val += Number(item.amountValue);
            } );
            return val;
        },
        displaySubTotal: function() {
            return this.subTotal.toLocaleString();
        },
        taxValue: function() {
            if( this.subTotal ) {
                // 小数点切り捨て
                return Math.floor((this.subTotal * this.taxRate));
            }

            return 0;
        },
        displayTaxValue: function() {
            return this.taxValue.toLocaleString();
        },
        totalAmount: function() {
            return this.subTotal + this.taxValue;
        },
        displayTotalAmount: function() {
            return this.totalAmount.toLocaleString();
        },
    },
    methods: {
        updateQtyValue: function( _, value, id ) {
            // 数量を変更したら単価と計算して自動で金額欄に入力されるようにする
            const tgt = Number((id - 1));
            this.ids[tgt].qtyValue = value;
            this.ids[tgt].amountValue = value * this.ids[tgt].unitPriceValue;
        },
        updateUnitPriceValue: function( _, value, id ) {
            // 単価を入れたら数量と計算して金額欄に自動で入力されるようにする
            const tgt = Number((id - 1));
            this.ids[tgt].unitPriceValue = value;
            this.ids[tgt].amountValue = value * this.ids[tgt].qtyValue;
        },
        addLine: function() {
            const len = this.ids.length + 1;
            const pushObj = {
                id: len,
                nameValue: null,
                qtyValue: null,
                unitValue: null,
                unitPriceValue: null,
                amountValue: null,
            };
            this.ids.push( pushObj );
        },
    }
}
</script>