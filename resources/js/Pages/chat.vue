

<template>
    <Head title="Chat" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container-fluid">

                          
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-2">

                                        <div class="card">
                                            <div class="card-header">
                                                UNICIENCIA
                                            </div>
                                            <div id ="card_body" ref="card_body" class="card-body bodychat fondo">
                                                
                                                <chatmessages :messages_data="messages" :user="user" v-on:delete-message="deleteMessage"></chatmessages>
                                            </div>
                                            <div class="card-footer">
                                                <chatform
                                                    v-on:messagesent="addMessage"
                                                    :user="user"
                                                ></chatform>
                                            </div>
                                        </div>


                                    
                                    </div>
                                </div>
                       


                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        

        
       

    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref, toRefs } from 'vue';
import  chatform  from './chatform.vue';
import  chatmessages  from './ChatMessages.vue';
export default {
    
    components:{
        AuthenticatedLayout,
        Head,
        chatform,
        chatmessages
    }, 
    props: {       
        user:  {
            default: null,
            required: false
        },
    },
    created() {
     
        this.fetchMessages();
        
    },
    mounted() {
        this.$refs.card_body.scrollTop = this.$refs.card_body.scrollHeight;
          Echo.channel(`chat`)
          .listen('MessageSent', (e) => {

            if (e.type==0) {
                this.messages.splice(this.messages.findIndex(item => item.id == e.user), 1)
            }else{
                this.messages.push(e.message);
            }
  
                

                this.scrollToEnd();
          });

          

        },
    data() {
        return {
            messages: []
        }
    },
    methods:{
        async fetchMessages() {
            await axios.get('/messages').then(response => {
               
                this.messages = response.data;
            });

            this.scrollToEnd();
        },

        async addMessage(message) {
     
            await axios.post('/messages', message).then(response => {
              this.scrollToEnd();
            });
        },
        async deleteMessage(message){
                   await axios.delete('/messages/'+message.id).then(response => {
              
              //this.scrollToEnd();
            });
          
        },
        scrollToEnd: function() {    	

          this.$nextTick(() => {
            this.$refs.card_body.scrollTop = this.$refs.card_body.scrollHeight;
        });
        },
    }
}
</script>
<style scoped>
.bodychat{
    
    height: 500px;
    overflow-x: scroll;
    overflow-x: hidden ! important;
    width: 100%;
}


.fondo{

  background-image: url("https://www.todofondos.net/wp-content/uploads/whatsapp-wallpaper-hd-1.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
