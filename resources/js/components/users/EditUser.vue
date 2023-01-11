<template>       
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3><button class="btn btn-outline-primary btn-sm me-3" @click="$emit('view-dashboard')"><i class="fas fa-chevron-left"></i> Back</button>Edit User: <small class="text-muted"><b>{{ user.name }}</b></small></h3>
                
                <hr>

                <div class="form-group row">
                    <label for="" class="col-3">Name</label>
                    <div class="col-9">
                        <input type="text" class="form-control" v-model="data.name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Email</label>
                    <div class="col-9">
                        <input type="email" class="form-control" v-model="data.email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3">Role</label>
                    <div class="col-9">
                        <select class="form-control" v-model="data.role">
                            <option :value="user">User</option>
                            <option :value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <button class="btn-primary btn">Update User</button>
            
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
                }
            }
        },
        watch: {
            user: function() {
                this.data = this.user
            }
        }
    }
</script>