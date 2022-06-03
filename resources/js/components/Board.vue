<template>

    <div class="site-body">
        <button class="btn btn-danger" @click="onCreate()">New Column</button>
        <div class="container">
            <div v-for="column in columns" :key="column.id" class="card-column column.title">
                <div class="taskgroup-heading">
                    <h2>{{ column.title }}</h2>
                    <div class="ellipsis-icon">
                        <button class="btn btn-danger" @click="onDelete(column.id)">Delete</button>
<!--                        <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
                        <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
                        <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">-->
                    </div>
                </div>
                <div v-for="card in column?.relations?.cards" :key="card.id" class="card future-column.id">
                    <div class="rectangle yellow"></div>
                    <div class="rectangle green"></div>
                    <div class="rectangle blue"></div>
                    <div class="rectangle orange"></div>
                    <p class="task-description">{{ card.title }}</p>
                    <img class="list-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/list_icon.svg">
                    <p class="task-date">4/21/2017</p>
                </div>
            </div>
        </div>
    </div>


    <div>

<!--        <ul>
            <li  v-for="column in columns" :key="column.id">
                {{ column.title }}
                <ul v-if="column?.relations?.cards">
                    <li  v-for="card in column?.relations?.cards" :key="card.id">
                        {{ card.title }}
                    </li>
                </ul>
            </li>
        </ul>-->

        <!--      <h3 class="text-center">All Posts</h3><br/>
       <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.description }}</td>
                    <td>{{ post.created_at }}</td>
                    <td>{{ post.updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>-->
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

.card {
    margin-right: 15px;
    margin-left: 15px;
    background-color: rgba(216, 216, 216, 0.21);
    border: solid 1px rgba(151,151,151,0.21);
    position: relative;
    margin-bottom: 10px;
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

.yellow {
    background-color: #fdcb1e;
}

.orange {
    background-color: #ff7700;
}

.green {
    background-color: #50e3c2;
}

.blue {
    background-color: #3343e5;
}

.add-card {
    background-color: rgba(216, 216, 216, 0.21);
    border: solid 1px rgba(151,151,151,0.21);
    color: #2f2f2f;
}
</style>
<script>

export default {
    data() {
        return {
            columns: []
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
        onCreate() {
           console.log('onCreate');
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
