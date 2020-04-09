<template>
<div>
	<div>
    <h3>{{ user.name }}</h3>
	<ul>
        <li><img v-bind:src="user.path" /></li>
        <router-link :to="`/users/detail/${user.id}`">詳細</router-link>
	</ul>
	</div>
	
	
</div>
</template>

<script>
	export default {
		data(){
			return {
				id: this.$route.params.id,
				user: ''
			}
		},
		created(){
			axios.get('/api/user/' + this.id)
			.then(response => this.user = response.data.user)
			.catch(erorr => console.log(error));
		}

	}
</script>