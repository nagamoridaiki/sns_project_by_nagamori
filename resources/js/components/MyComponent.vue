<template>
    <div class="container">
        <p>{{msg}}</p>
        <hr>
        <input type="text" v-model="name">
        <button v-on:click="doAction">click</button>
        <hr>
        <ul>
            <li v-for="(person,key) in people" v-bind:key="key.id">
                {{person.id}}:{{person.name}}
                [{{person.email}}]({{person.job}})
            </li>
        </ul>
    </div>
</template>

<script>
    const axios = require('axios');

    export default {
        mounted(){
            axios.get('/hello/json')
                .then(response =>{
                    this.people = response.data;
                })
        },
        data:function(){
            return {
                msg:'please your name :',
                name:'',
                people:[],
            };
        },
        methods:{
            doAction:function(){
                this.msg = 'Hello, '+ this.name + '!!';
            }
        },
        

    }
</script>
