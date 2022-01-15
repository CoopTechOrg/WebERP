<template>
    <!-- 見積もり入力欄 -->
    <div id="estimateDetailContainer">
        <ul class="details">
            <li class="details__item" v-for="item in displayList" :key="item.id">
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

        <!-- input hidden で送信する見積項目リスト computedのhiddenInputList参照 -->
        <ul>
            <li v-for="(item,ind) in hiddenInputList" :key="ind">
                <div v-for="(obj,ind) in item" :key="ind">
                    <input type="hidden" :name="key" :id="key" :value="val" v-for="( val, key ) in obj" :key="key">
                </div>
            </li>
        </ul>
        
        <p class="add-line_btn" @click="addLine"><span class="circle">+</span><span class="btn_str">行の追加</span></p>
        <div class="total">
            <table class="total-table">
                <tr class="total-table__row total-table__subtotal">
                    <th class="total-table__label">小計</th>
                    <td class="total-table__item">¥{{ displaySubTotal }}</td>
                    <!-- 小計 送信用 -->
                    <input type="hidden" name="sub_total" :value="displaySubTotal">
                </tr>
                <tr class="total-table__row total-table__tax">
                    <th class="total-table__label">消費税({{ displayTaxRate }}%)</th>
                    <td class="total-table__item">¥{{ displayTaxValue }}</td>
                    <!-- 税 送信用 -->
                    <input type="hidden" name="tax_rate" :value="displayTaxRate">
                    <input type="hidden" name="tax_value" :value="displayTaxValue">
                </tr>
                <tr class="total-table__row total-table__total_amount">
                    <th class="total-table__label">合計</th>
                    <td class="total-table__item">¥{{ displayTotalAmount }}</td>
                    <!-- 合計金額 送信用 -->
                    <input type="hidden" name="total_amount" :value="displayTotalAmount">
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
            displayCount: 4,    // 初期表示されている入力行の数(最大10)
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
                {
                    id: 5,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 6,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 7,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 8,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 9,
                    nameValue: null,
                    qtyValue: null,
                    unitValue: null,
                    unitPriceValue: null,
                    amountValue: null,
                },
                {
                    id: 10,
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
        displayList: function() {
            // 行を追加をクリックすると、this.displayCountが増えるので、描画される行が増えます。
            // 最大10行表示することができます。
            return this.ids.slice(0, this.displayCount);
        },
        hiddenInputListLength: function() {
            return 10 - this.displayCount;
        },
        hiddenInputList: function() {
            // 表示していない見積項目を入力する行も input type="hidden" でサーバに送信します。
            // そのために、入力最大行数（10行）から、表示されている行を引いた分の長さの配列を生成し、
            // テンプレート側でv-forで回してHTMLを生成します。
            // 「行を追加」をクリックすると、以下が連動して変化します。
            //   1. 表示される行が増える
            //   2. hiddenで隠されている行が減る

            const len = this.hiddenInputListLength;
            return Array(len).fill().map( (e, ind) => {
                
                return Array(5).fill().map( (e, index) => {
                    const cnt = 10 - ind;
                    let name = "";
                    if( index === 0 ) { name = "name" + cnt; }
                    if( index === 1 ) { name = "qty" + cnt; }
                    if( index === 2 ) { name = "unit" + cnt; }
                    if( index === 3 ) { name = "unitPrice" + cnt; }
                    if( index === 4 ) { name = "amount" + cnt; }
                    return { [name] : null};
                } );

            } );
        },
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
            if( this.displayCount === 10 ) {
                alert( "これ以上行を追加することができません。別の見積書を作成してください。" );
                return false;
            }
            this.displayCount++;
        },
    }
}
</script>