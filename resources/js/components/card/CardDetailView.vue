<template>
    <div>
        <!-- First modal -->
        <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
            <button class="modal__close" @click="onClose">
                <mdi-close></mdi-close>
            </button>
            <span class="modal__title">{{card.title}}</span>
            <div class="modal__content">
                <p>{{card.description}}</p>
            </div>
            <div class="modal__action">
                <button @click="onDelete(card.id)">Delete</button>
                <button @click="onClose">Cancel</button>
            </div>
        </vue-final-modal>
    </div>
</template>
<script>
export default {
    inject: ['VUE_APP_ROOT_API'],
    props: ['card'],
    data() {
        return {
            showModal: false,
        }
    },
    created() {
    },
    methods: {
        onOpen() {
            this.showModal = true;
        },
        onClose() {
            this.showModal = false;
        },
        onDelete(id) {
            this.axios
                .delete(`${this.VUE_APP_ROOT_API}cards/${id}`)
                .then(response => {
                    this.$emit('delete-card', response.data.data);
                    this.onClose();
                });
        }
    }
}
</script>
<style scoped>
::v-deep .modal-container {
    display: flex;
    justify-content: center;
    align-items: center;
}
::v-deep .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    max-height: 90%;
    margin: 0 1rem;
    padding: 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.25rem;
    background: #fff;
    max-width: 550px;
    width: 100%;
    min-height: 200px;
}
.modal__title {
    margin: 0 2rem 0.5rem 0;
    font-size: 1.5rem;
    font-weight: 700;
}
.modal__content {
    flex-grow: 1;
    overflow-y: auto;
}
.modal__action {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    padding: 1rem 0 0;
}
.modal__close {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
}
</style>
