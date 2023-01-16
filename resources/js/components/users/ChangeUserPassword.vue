<template>
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3><button class="btn btn-outline-primary btn-sm me-3" @click="$emit('view-dashboard')"><i class="fas fa-chevron-left"></i> Back</button>Change User Password - <small class="text-muted"><b>{{ user.name }}</b></small><button class="btn btn-sm btn-outline-primary float-end" @click.prevent="sendResetLink">Send Reset Link</button></h3>
                
                <hr>

                <div class="alert alert-warning" role="alert" v-if="errors.length > 0">
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>

                <div class="form-group row mb-3">
                    <label for="" class="col-3">Password</label>
                    <div class="col-9">
                        <input type="password" v-model="data.password" class="form-control">
                        <div id="passwordHelpBlock" class="form-text">
                                Your password must be at least 10 characters long, contain capital and small letters, numbers, special characters (@$!#%^&*) and must not contain spaces.
                        </div>
                    </div>
                    
                </div>

                <div class="form-group row mb-3">
                    <label for="" class="col-3">Confirm Password</label>
                    <div class="col-9">
                        <input type="password" v-model="data.confirm_password" class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary" @click.prevent="updatePassword">Update Password</button>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['user'],
        data() {
            return {
                data: {
                    password: '',
                    confirm_password: '',
                },
                errors: []
            }
        },
        methods: {
            updatePassword: function() {
                this.errors = []
                axios.post('/data/users/updates/password/' + this.user.id, {
                    _method: 'PUT',
                    password: this.data.password,
                    confirm_password: this.data.confirm_password
                }).then(response => {
                    this.$emit('updated-password', "Successfully updated password for " + this.user.name)
                }).catch(errors => {
                    if(errors.response.status === 422) {
                        Object.keys(errors.response.data.errors).forEach(key => {
                            errors.response.data.errors[key].forEach(error => this.errors.push(error))
                        })
                    }
                    if(errors.response.status === 403) {
                        this.errors.push("Not authorized to change this users password")
                    }
                })
            },
            sendResetLink: function() {
                axios.post('/data/users/updates/send-reset-link/' + this.user.id).then(response => this.$emit('sent-reset-link', "Successfully sent reset link to " + this.user.name))
            }
        }
    }
</script>