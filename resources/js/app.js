import './bootstrap';
import { createApp } from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Board from './components/Board'

const app = createApp({})

app.component('task-board', Board)
app.use(VueAxios, axios) // 👈
app.mount('#app')
