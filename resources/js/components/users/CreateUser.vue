<template>
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3><button class="btn btn-sm btn-outline-primary me-3" @click="$emit('view-dashboard')"><i class="fas fa-chevron-left" /> Back</button>Create New User</h3>
            
                <hr>

                <div class="alert alert-warning" role="alert" v-if="errors.length > 0">
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>

                <form action="#">
                    <div class="form-group row mb-3">
                        <label for="" class="col-3">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" v-model="data.name">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="inputEmail3" class="col-3">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" v-model="data.email">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-3">Role</label>
                        <div class="col-9">
                            <select class="form-select" v-model="data.role">
                                <option :value="'user'">User</option>
                                <option :value="'admin'">Admin</option>
                            </select>
                        </div>
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

                    <button class="btn btn-primary" @click.prevent="storeUser">Create User</button>
                </form>
            
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                data: {
                    name: '',
                    email: '',
                    role: 'user',
                    password: '',
                    confirm_password: '',
                },
                errors: []
            }
        },
        methods: {
            storeUser: function() {
                this.errors = [],
                axios.post('/data/users', {
                    name: this.data.name,
                    email: this.data.email,
                    role: this.data.role,
                    password: this.data.password,
                    confirm_password: this.data.confirm_password,
                }).then(response => {
                    this.$emit('created-user', 'Successfully created user: ' + response.data.user.name + ' | email: ' + response.data.user.email)
                }).catch(errors => {
                    if(errors.response.status === 422) {
                        this.flashErrors(errors.response.data.errors)
                    }
                    if(errors.response.status === 403) {
                        this.errors = ["You are not authorized to create users."]
                    }
                })
            },
            flashErrors: function(errors) {
                for(const [key, value] of Object.entries(errors)) {
                    for (let item in value) {
                        this.errors.push(value[item])
                    }
                }
            }
        }
    }
</script>