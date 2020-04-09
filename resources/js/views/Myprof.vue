<template>
<div>
	<div>
	<ul>
		<li>Id: {{ user.id }}</li>
		<li>Name: {{ user.name }}</li>
		<li>Email: {{ user.email }}</li>
        <li>job: {{ user.job }}</li>
        <li>skill: {{ user.skill }}</li>
        <li>hobby: {{ user.hobby }}</li>
		<router-link :to="`/users/edit/${user.id}`">編集</router-link>
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

<style scoped>
ul {
  list-style: none;
}

img {
  width:50%;
  height:50%;  
}


</style>