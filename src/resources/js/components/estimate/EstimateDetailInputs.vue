<template>
    <div id="estimateDetailList">
        <ul>
            <li v-for="item in ids" :key="item.id">
                <common-estimate-detail-input :id="item.id"></common-estimate-detail-input>
            </li>
        </ul>
        <p @click="addLine">行の追加</p>
    </div>
</template>

<script>
import CommonEstimateDetailInput from './CommonEstimateDetailInput.vue';
export default {
    components: {CommonEstimateDetailInput},
    data: function() {
        return {
            ids: [
                {id: 1},
                {id: 2},
                {id: 3},
                {id: 4},
            ],
        };
    },
    methods: {
        addLine: function() {
            const len = this.ids.length + 1;
            this.ids.push( { id: len } );
        },
    }
}
</script>