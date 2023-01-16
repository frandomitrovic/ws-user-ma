<template>
    <div>
        <div class="card mt-3">
            <div class="card-body">
                <h3>User Account Settings</h3>

                <hr>

                <table class="table table table-hover table-borderless">
                    <tbody v-if="user !== null">
                        <tr>
                            <th>Name</th>
                            <td>{{ user.name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ user.email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ user.role }}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>********** <span class="ml-3 badge bg-primary">Send Reset Link</span></td>
                        </tr>
                        <tr>
                            <th>User Since</th>
                            <td>{{ user.user_since }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getUser()
        },
        data() {
            return {
                user: null,
            }
        }, 
        methods: {
            getUser: function() {
                axios.get('/data/accounts/user').then(response => this.user = response.data.user)
            }
        }
    }
</script>