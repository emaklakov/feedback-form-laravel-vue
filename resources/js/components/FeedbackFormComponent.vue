<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" :class="{ 'is-invalid': errors && errors.name }" id="name" name="name" v-model="fields.name" placeholder="Иван Федоров">
            <small v-if="errors && errors.name" id="nameHelp" class="form-text text-danger">{{ errors.name[0] }}</small>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" :class="{ 'is-invalid': errors && errors.phone }" id="phone" name="phone" v-model="fields.phone" aria-describedby="phoneHelp" placeholder="+7 (___) ___-__-__">
            <small v-if="errors && errors.phone" id="phoneHelp" class="form-text text-danger">{{ errors.phone[0] }}</small>
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" :class="{ 'is-invalid': errors && errors.message }" id="message" name="message" v-model="fields.message" rows="3"></textarea>
            <small v-if="errors && errors.message" id="messageHelp" class="form-text text-danger">{{ errors.message[0] }}</small>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>

        <div v-if="successSend" class="alert alert-success mt-3">
            Сообщение отправлено!
        </div>
        <div v-if="errorSend" class="alert alert-danger mt-3">
            Ошибка при отправке сообщения!
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                fields: {},
                errors: {},
                successSend: false,
                errorSend: false,
                loaded: true,
                action: '/feedback/submit',
            }
        },
        methods: {
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.successSend = false;
                    this.errorSend = false;
                    this.errors = {};
                    axios.post(this.action, this.fields).then(response => {
                        this.fields = {};
                        this.loaded = true;
                        this.successSend = true;
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        } else {
                            this.errorSend = true;
                        }
                    });
                }
            },
        },
    }
</script>
