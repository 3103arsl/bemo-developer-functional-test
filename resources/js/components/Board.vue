<template>


    <create-edit-column ref="createEditColumn" @save-column="saveColumnHandler"/>
    <create-edit-card ref="createEditCard" @save-card="saveCardHandler"/>

    <div class="site-body" >
        <button class="btn btn-danger" @click="onOpenForm()">New Column</button>
        <div class="container">
            <div v-for="column in columns" :key="column.id" class="card-column column.title">
                <div class="taskgroup-heading">
                    <h2>{{ column.title }}</h2>
                    <div class="ellipsis-icon">
                        <button class="btn btn-danger" @click="onOpenCardForm()">Create Card</button>
                        <button class="btn btn-danger" @click="onDelete(column.id)">Delete</button>
                    </div>
                </div>
                <card-view v-for="card in column?.relations?.cards" :key="card.id" :card="card" class="card future-column.id"/>
            </div>
        </div>
    </div>
</template>
<style>
@font-face {
    font-family: WorkSans;
    src: url("https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/Work_Sans/WorkSans-Regular.ttf");
}
@font-face {
    font-family: Poppins;
    src: url("https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/Poppins/Poppins-Regular.ttf");
}

html {
    height: 100%;
}
body {
    height: 100%;
    margin: 0;
    background-image: linear-gradient(359deg, #3023ae, #eb7f7b);
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.navbar {
    display: grid;
    grid-template-columns: 10px 1fr 3fr 1fr;
    position: absolute;
    width: 100%;
    height: 60px;
    background-color: rgba(120,70,154, 0.2);
    text-align: center;
    top: 0;
    left: 0;
    justify-content: space-around;
}

.navbar h1 {
    font-family: Poppins;
    color: #ffffff;
    margin: 0;
    align-self: center;
}

.container {
    width: 1000px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 20px;
}

.search-bar {
    display: inline-block;
    width: 23%;
    height: 40px;
    background-color: rgba(255,255,255, 0.35);
    left: 50px;
    top: 8px;
    position: absolute;
}

input {
    display: inline-block;
    border: none;
    background: transparent;
    font-size: 14px;
}

.search-bar input {
    float: left;
    height: 18px;
    margin-top: 9px;
    margin-left: 7px;
}

.card-column input {
    height: 18px;
    margin-left: 15px;

}

.search-icon {
    float: left;
    margin-top: 9px;
    margin-left: 7px;
}

.card-column {
    background-color: #ffffff;
    min-height: 700px;
    display: grid;
    grid-template-rows: 20px repeat(4 , 100px);
    /*align-content: space-evenly;*/
    grid-auto-rows: 100px;
}

.card-column h2 {
    padding: 0;
    margin: 0 auto;
    font-family: WorkSans;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 0.2px;
    text-align: left;
    color: #2f2f2f;
    display: inline-block;
}

.taskgroup-heading {
    margin-left: 15px;
    margin-top: 7px;
    margin-bottom: 20px;
}

.site-body {
    position: absolute;
    top: 100px;
    margin-left: 50px;
}
</style>
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
        this.axios
            .post('http://localhost:8000/api/columns')
            .then(response => {
                this.columns = response.data.data;
            });
    },
    methods: {
        onOpenForm() {
            this.$refs.createEditColumn.onOpen();
        },
        saveColumnHandler(data){
            this.columns.push(data.column);
        },
        onOpenCardForm() {
            this.$refs.createEditCard.onOpen();
        },
        saveCardHandler(data){
            console.log(data.column);
            //this.columns.push(data.column);
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
