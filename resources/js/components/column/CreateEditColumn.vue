<template>
    <div>
        <!-- First modal -->
        <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
            <button class="modal__close" @click="showModal = false">
                <mdi-close></mdi-close>
            </button>
            <span class="modal__title">Create Column</span>
            <div class="modal__content">
                <p>Title</p>
                <input v-model="title" placeholder="Column Title" />
                <p v-if="isValid">Title Required</p>
            </div>
            <div class="modal__action">
                <button highlight @click="onSave">Save</button>
                <button @click="onClose">Cancel</button>
            </div>
        </vue-final-modal>
    </div>
</template>
<script>
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
export default {
    data() {
        return {
            showModal: false,
            showConfirmModal: false,
            title: null,
            isValid:false
        }
    },
    validations: {
        title: { required },
    },
    created() {

    },
    methods: {
        onOpen() {
           this.showModal = true;
           this.onResetForm();
        },
        onClose() {
            this.showModal = false;
        },
        onShowError(){
            this.isValid = true;
        },
        onRemoveError() {
            this.isValid = false;
        },
        onResetForm(){
            this.title = null;
            this.description = null;
            this.onRemoveError();
        },
        onSave() {
            if(!this.title) {
                this.onShowError();
            }
            this.axios
                .post('http://localhost:8000/api/columns/create',{
                    title: this.title,
                })
                .then(response => {
                    this.onClose();
                    this.onResetForm();
                    this.$emit('save-column', response.data.data);
                }) .catch(error => {
                    this.onShowError();
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
