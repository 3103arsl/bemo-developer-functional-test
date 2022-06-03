<template>
    <div @click="view" :key="card.id" class="card future-column.id">
        <p class="task-description">{{ card.title }}</p>
    </div>
    <card-detail-view :card="card" ref="cardDetailView"/>
</template>
<style>
.card {
    margin-right: 15px;
    margin-left: 15px;
    background-color: rgba(216, 216, 216, 0.21);
    border: solid 1px rgba(151,151,151,0.21);
    position: relative;
    margin-bottom: 10px;
    padding: 10px;
    padding-bottom: 0px;
}

.rectangle {
    width: 57px;
    height: 6px;
    position: relative;
    display: inline-block;
    margin-left: 7px;
}

.list-icon {
    display: inline-block;
    margin-left: 7px;
    margin-bottom: 5px;
    position: absolute;
    bottom: 0;
}

.task-description {
    margin-left: 7px;
    margin-top: 0;
    font-family: WorkSans;
    font-size: 14px;
    letter-spacing: 0.2px;
    text-align: left;
    color: #2f2f2f;
}

.ellipsis-icon {
    display: inline-block;
    float: right;
    margin-right: 15px;
}

.task-date {
    display: inline-block;
    font-family: WorkSans;
    font-size: 10px;
    letter-spacing: 0.1px;
    text-align: left;
    color: #9b9b9b;
    position: absolute;
    bottom: 0;
    margin-bottom: 5px;
    left: 25px;
}
</style>
<script>
import CardDetailView from './CardDetailView'
export default {
    components: {
        CardDetailView
    },
    props: ['card'],
    data() {
        return {
            column:null,
        }
    },
    created() {
    },
    methods: {
        view() {
            this.$refs.cardDetailView.onOpen();
        },
    }

}
</script>
