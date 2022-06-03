<template>


    <create-edit-column ref="createEditColumn" @save-column="saveColumnHandler"/>
    <create-edit-card ref="createEditCard" @save-card="saveCardHandler"/>

    <div class="site-body" >
        <button class="creat-col-btn" @click="onOpenForm()">New Column</button>
        <div class="container">
            <div v-for="column in columns" :key="column.id" class="card-column column.title">
                <div class="taskgroup-heading">
                    <h2>{{ column.title }}</h2>
                    <div class="ellipsis-icon">
                        <button class="btn btn-danger" @click="onOpenCardForm(column.id)">Create Card</button>
                        <button class="btn btn-danger" @click="onDelete(column.id)">Delete</button>
                    </div>
                </div>
                <card-view @delete-card="deleteCardHandler" v-for="card in column?.relations?.cards" :key="card.id" :card="card" class="card future-column.id"/>
            </div>
        </div>
    </div>
</template>

<script>
import CreateEditColumn from './column/CreateEditColumn'
import CreateEditCard from './card/CreateEditCard'
export default {
    components: {
        CreateEditColumn,
        CreateEditCard
    },
    data() {
        return {
            columns: [],
        }
    },
    created() {
        this.getColumns()
    },
    methods: {
        onOpenForm() {
            this.$refs.createEditColumn.onOpen();
        },
        saveColumnHandler(data){
            this.columns.push(data.column);
        },
        onOpenCardForm(column) {
            this.$refs.createEditCard.onOpen(column);
        },
        saveCardHandler(data){
            this.getColumns()
        },
        getColumns () {
            this.axios
                .post('http://localhost:8000/api/columns')
                .then(response => {
                    this.columns = response.data.data;
                });
        },
        deleteCardHandler(data){
            this.getColumns()
        },
        onDelete(id) {
            this.axios
                .delete(`http://localhost:8000/api/columns/${id}`)
                .then(response => {
                    let i = this.columns.map(item => item.id).indexOf(id); // find index of object
                    this.columns.splice(i, 1)
                });
        }
    }
}
</script>
