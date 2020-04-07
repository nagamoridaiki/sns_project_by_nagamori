<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <ul>
                        <li v-for="user in users" v-bind:key="user.id">{{ user.name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                users: []
            }
        },
        mounted() {
          axios.get('/vueuser').then(response => this.users = response.data)
        }
    }
</script>
