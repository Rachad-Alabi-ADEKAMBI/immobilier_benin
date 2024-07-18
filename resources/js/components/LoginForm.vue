<template>
    <div class="container bg-light p-3">
        <form @submit.prevent="handleLogin" >


            <div class="row">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control col-sm-12 col-md-9" v-model="form.email">
                    <span class="text text-danger" v-if="errors.email">{{ errors.email [0]  }}</span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group">
                    <label>Mot de passe:</label>
                    <input type="password" class="form-control col-sm-12 col-md-9" v-model="form.password">
                    <span class="text text-danger" v-if="errors.password">{{ errors.password[0]  }}</span>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Se connecter</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: null,
                password: null
            },
            errors: {}
        };
    },
    methods: {
        async handleLogin() {
            try {
                await axios.get('/sanctum/csrf-cookie');
                   await  axios.post('/login', this.form );
                   window.location = '/dashboard'
            } catch (error) {
                this.errors = error.response.data.errors;
            }
        }
    }
}
</script>
