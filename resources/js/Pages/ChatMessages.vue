<template>


            <div class="row" v-for="message in messages_data" style="padding-bottom: 5px;">
                <div class="col-sm-5">
                    <div v-if="message.user.id != user.id"> 
                        <div class="card">                       
                            <div class="card-body">
                                <h5 class="card-title"><strong class="primary-font"> {{ message.user.name+':' }} </strong></h5>
                                <p class="card-text text-justify">{{ message.message }}</p>
                                <div class="text-right" style="font-size: 10px;"> {{ formatDate(message.created_at) }} </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="col-sm-2">
                    &nbsp;
                </div>
                <div class="col-sm-5">
                    <div v-if="message.user.id == user.id"> 
                        <div class="card" style="background: #ddf2ff;">                       
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10"><h5 class="card-title"><strong class="primary-font"> Tú: </strong></h5></div>
                                    <div class="col-sm-2 text-right"><button type="button" class="btn btn-link btn-sm" @click="deletemessage(message)"><i class="fas fa-trash-alt"></i></button></div>
                                </div>
                                
                                <p class="card-text text-justify">{{ message.message }}</p>
                                <div class="text-right" style="font-size: 10px;"> {{ formatDate(message.created_at) }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 

       

</template>

<script>

export default {
    
    components:{
  
    }, 
    emits :{
        deleteMessage: null,
        },
    props: {
        messages_data: {
            default: [],
            required: false
        }, 
        user:  {
            default: null,
            required: false
        },       
    },
    created() {

   
    },
    data() {
        return {
            
        }
    },
    methods:{
        deletemessage(message){
            if(confirm('Esta seguro de borrar el mensaje?')){

                this.$emit('deleteMessage', message)
              
            }
        },
        formatDate(dateFromDb){
            return new Date(dateFromDb).toLocaleString('es-CO');
        }
    }
}
</script>