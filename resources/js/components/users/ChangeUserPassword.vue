<template>
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3><button class="btn btn-outline-primary btn-sm me-3" @click="$emit('view-dashboard')"><i class="fas fa-chevron-left"></i> Back</button>Change User Password <small class="text-muted"><b>{{ user.name }}</b></small><button class="btn btn-sm btn-outline-primary float-right" @click.prevent="sendResetLink">Send Reset Link</button></h3>
                
                <div class="form-group row mb-3">
                    <label for="" class="col-3">Password</label>
                    <div class="col-9">
                        <input type="password" v-model="data.password" class="form-control">
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
                }
            }
        },
        methods: {
            updatePassword: function() {
                console.log(this.data)
            },
            sendResetLink: function() {
                console.log("Sent reset link")
            }
        }
    }
</script>