<template>
<div>
	<h1>ユーザ一覧</h1>
    <router-link class="btn btn-primary" :to="`/create`">ユーザ登録</router-link>
	<ul>
		<li v-for="(user) in users" v-bind:key="user.id" class="mb-1">
			{{ user.name}} 
			<router-link class="btn btn-success" :to="`/user/${user.id}`">詳細</router-link>
			<router-link class="btn btn-primary" :to="`/user/${user.id}/edit`">更新</router-link>
			<button class="btn btn-danger" @click="userDelete(user.id)">削除</button>
		</li>
	</ul>
</div>
</template>

<script>
	export default {
		data(){
			return{
				id: this.$route.params.id,
				users:[],
			}
        },
        methods:{
			userDelete(id){
				axios.delete('/api/user/' + id)
				     .then(response => {
						 this.users.slice(id, 1)
						 this.$router.push({ name: 'home'})
				     })
				     .catch(error => console.log(error));
			},
		},
		created(){
			axios.get('/api/user')
				.then(response=>{
					this.users = response.data.users;
				})
				.catch(error => {
					console.log(error)
				});
        },
        
	}
</script>;
