<template>
    <div>
        <h2>これはmessage.vueです</h2>
        <!--メッセージ相手友達: {{ friend }}-->
        <br>
        <!--<p>メッセージ一覧:{{ messageall }}</p>-->
        <p>パラム:{{ params }}</p>
        <ul>
            <li v-for="message in messageall" v-bind:key="message.id" class="mb-1">
                {{ message.send_user_id}}:{{ message.message_text}} :{{ message.receive_user_id}}
                <!--送信したメッセージ  右側-->


                <!--受信したメッセージ  左側-->

            </li>
        </ul>
    </div>
</template>

<script>


	export default {
		data(){
			return {
                params: this.$route.params,
                id: this.$route.params.id,
                messageall:'',
                loginUser: '',
                friend:'',
			}
		},
		methods:{

		},
		created(){
			axios.get('/api/user/' + this.id)
			.then(response => this.friend = response.data.user)
            .catch(erorr => console.log(error));

            axios.get('/api/messages/')
			.then(response => this.messageall = response.data.messages)
            .catch(erorr => console.log(error));
            
		}

	}
</script>


<style scoped>
ul {
  list-style: none;
}

</style>

