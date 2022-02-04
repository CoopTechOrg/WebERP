<template>
    <input :type="type" :name="actualName" :id="actualName"
        :class="classes"
        :value="value"
        @input="$emit('input', $event.target.value)"
    >
</template>

<script>
export default {
    name: 'CommonEstimateDetailInput',
    props: {
        id: Number,
        type: String,
        value: String | Number,
        classes: String,
        name: String,
    },
    computed: {
        actualName: function() {
            if(this.id) {
                return this.name + this.id;
            }
            return this.name + "{0}";
        },
    },
}
</script>

<style lang="scss" scoped>
// 数値入力欄でスピンボタン（上下矢印のボタン）を非表示にする
input[type="number"]::-webkit-outer-spin-button, 
input[type="number"]::-webkit-inner-spin-button { 
    -webkit-appearance: none !important;
    margin: 0 !important;
}
input[type="number"] { 
    -moz-appearance:textfield !important;
} 
</style>