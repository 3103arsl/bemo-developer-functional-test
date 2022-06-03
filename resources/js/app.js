import './bootstrap';
import { createApp } from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { vfmPlugin } from 'vue-final-modal'
import Board from './components/Board'
import CreateEditColumn from './components/column/CreateEditColumn'
import CardView from './components/card/CardView'
import CardDetailView from './components/card/CardDetailView'
import CreateEditCard from './components/card/CreateEditCard'

const app = createApp({})

app.component('task-board', Board)
app.component('create-edit-column', CreateEditColumn)
app.component('card-view', CardView)
app.component('card-detail-view', CardDetailView)
app.component('create-edit-card', CreateEditCard)

app.use(VueAxios, axios)
app.use(vfmPlugin)
app.mount('#app')
