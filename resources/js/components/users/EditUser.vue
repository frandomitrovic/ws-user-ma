<template>       
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3><button class="btn btn-outline-primary btn-sm me-3" @click="$emit('view-dashboard')"><i class="fas fa-chevron-left"></i> Back</button>Edit User: <small class="text-muted"><b>{{ user.name }}</b></small></h3>
                
                <hr>

                <div class="alert alert-warning" role="alert" v-if="errors.length > 0">
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>

                <div class="form-group row mb-3">
                    <label for="" class="col-3">Name</label>
                    <div class="col-9">
                        <input type="text" class="form-control" v-model="data.name">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-3">Email</label>
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

                <button class="btn-primary btn" @click.prevent="updateUser">Update User</button>
            
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.data = this.user
        },
        props: ['user'],
        data() {
            return {
                data: {
                    name: '',
                    email: '',
                    role: '',
                },
                errors: [],
            }
        },
        methods: {
            updateUser: function() {
                this.errors = []
                axios.post('/data/users/' + this.user.id, {
                    _method:'PUT',
                    name: this.data.name,
                    email: this.data.email,
                    role: this.data.role,
                }).then(response => {
                    this.$emit('user-updated', response.data.user.name + "'s profile has been updated");
                }).catch(errors => {
                    console.dir(errors)
                    if(errors.response.status === 500) {
                        this.errors.push("This email address may already be taken. Please try another one.")
                    }
                    if(errors.response.status === 422) {
                        Object.keys(errors.response.data.errors).forEach(key => {
                            errors.response.data.errors[key].forEach(error => this.errors.push(error))
                        })
                    }
                })
            },
            assignUserToData: function() {
                Object.keys(this.data).forEach(key => this.data[key] = this.user[key]);
            }
        },
        watch: {
            user: function() {
                this.assignUserToData()
            }
        }
    }
</script>