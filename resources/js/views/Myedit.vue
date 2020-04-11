<template>
<div>
  <p><input type="file" v-on:change="fileSelected"></p>
  <button v-on:click="fileUpload">アップロード</button>
  <!--<img :src="`${user.path}`">-->
  
	<form @submit.prevent="updateUser">
        <router-link :to="`/users/index/${user.id}`">戻る</router-link>
        <table>
            <tr>
                <th>Name:</th>
                <td><input v-model="user.name"></td>
            </tr>
            <tr>
                <th>Email:</th>
                <input v-model="user.email">
            </tr>
            <tr>
                <th>Job:</th>
                <input v-model="user.job">
            </tr>
            <tr>
                <th>Skill:</th>
                <input v-model="user.skill">
            </tr>
            <tr>
                <th>Hobby:</th>
                <input v-model="user.hobby">
            </tr>
            <button type="submit">Update</button>
         </table>   
	</form>	
	
</div>
</template>

<script>

	export default {
		data(){
			return {
				id: this.$route.params.id,
				user:{
					id:'',
					name: '',
                    email:'',

                    job:'',
                    skill:'',
                    hobby:'',
                },
          fileInfo: '',
          user_image: '',
          showUserImage: false,
          
			}
		},
		methods:{
      fileSelected(event){
          this.fileInfo = event.target.files[0]
      },
      fileUpload(){
          const formData = new FormData()
          formData.append('file',this.fileInfo)

          axios.post('/api/file_upload/' + this.user.id , formData)
          .then(response =>{
            this.user_image = response.data
            if(response.data.file_path) this.showUserImage = true
            location.assign('/users/index/'+ this.user.id);
          });
      },

			updateUser(){
				axios.patch('/api/user/' + this.user.id,{
					user: this.user
				})
				.then(response => {
					this.user = response.data.user;
					this.$router.push({ name: 'myprof' ,params :{ id: this.$route.params.id }})
				})
				.catch(error => console.log(error));
            },
            
		},
		created(){
			axios.get('/api/user/' + this.id)
			.then(response => this.user = response.data.user)
			.catch(erorr => console.log(error));
		}

	}
</script>

<style scoped>
img {
  width:50%;
  height:50%;  
}

label > input {
  display: none;
}

label {
  padding: 0 1rem;
  border: solid 1px #888;
} 

label::after {
  content: '+';
  font-size: 1rem;
  color: #888;
  padding-left: 1rem;
}

</style>