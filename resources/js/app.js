import './bootstrap';
import { createApp } from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { vfmPlugin } from 'vue-final-modal'
import Board from './components/Board'
import CreateEditColumn from './components/column/CreateEditColumn'

const app = createApp({})

app.component('task-board', Board)
app.component('create-edit-column', CreateEditColumn)
app.use(VueAxios, axios)
app.use(vfmPlugin)
app.mount('#app')
