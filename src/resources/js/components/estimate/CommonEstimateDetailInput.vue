<template>
    <div class="row">
        <input type="text" name="create_estimate" :id="name" class="name common_height common_input row-first">
        <input type="text" name="create_estimate" :id="qty" class="qty common_height common_input">
        <input type="text" name="create_estimate" :id="unit" class="unit common_height common_input">
        <input type="text" name="create_estimate" :id="unitPrice" class="unit-price common_height common_input">
        <input type="text" name="create_estimate" :id="amount" class="amount common_height common_input row-last">
    </div>
</template>

<script>
export default {
    name: 'CommonEstimateDetailInput',
    props: {
        id: Number,
    },
    computed: {
        name: function() {
            if( this.id ) {
                return "name" + this.id;
            }
            return "name{0}";
        },
        qty: function() {
            if( this.id ) {
                return "qty" + this.id;
            }
            return "qty{0}";
        },
        unit: function() {
            if( this.id ) {
                return "unit" + this.id;
            }
            return "unit{0}";
        },
        unitPrice: function() {
            if( this.id ) {
                return "unitPrice" + this.id;
            }
            return "unitPrice{0}";
        },
        amount: function() {
            if( this.id ) {
                return "amount" + this.id;
            }
            return "amount{0}";
        },
    }
}
</script>