<template>
<div>
	<div>
	<h3>ユーザ詳細</h3>
	<ul>
        <li><img v-bind:src="user.path" /></li>
		<li>User Id: {{ user.id }}</li>
		<li>User Name: {{ user.name }}</li>
		<li>User Email: {{ user.email }}</li>
        <li>User job: {{ user.job }}</li>
        <li>User skill: {{ user.skill }}</li>
        <li>User hobby: {{ user.hobby }}</li>
        <router-link :to="`/users/index/${user.id}`">Index</router-link>
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