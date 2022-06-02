import './bootstrap';
import { createApp } from 'vue'
import Board from './components/Board'

const app = createApp({})

app.component('task-board', Board)

app.mount('#app')
