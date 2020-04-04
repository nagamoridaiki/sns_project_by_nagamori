var profiel = new Vue({
    el: '#profiel',
    data:function(){
        return {
            my_path:"",
            user:"",
        };
    },
    mounted:function(){
        axios.get('/my_path')
        .then(response =>{
            this.my_path = response;
            console.log("こんにちは")
            console.log(this.my_path)
        }),
        axios.get('/user')
        .then(response =>{
            this.user = response;
            console.log(this.user)
        })

    }
})