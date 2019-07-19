<template>
    <div>
        <input type="text" v-model="userName">
        <button @click="userSearch()"><i class="fas fa-search"></i></button>
    </div>
</template>
<script>

export default {
    data(){
        return{
            userName:null
        }
    },
    methods:{
        userSearch(){

            fetch(`/api/userSearch?userName=${this.userName}`)
            .then(function(response){
                console.log('response', response);
                if(response.ok){
                    return response.text();
                }
            })
            .then(data=>{
                console.log('data', data);
            })
        }
    }
}
</script>
