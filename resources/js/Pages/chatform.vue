<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref, computed } from 'vue'

    let newMessage = ref('')

    const props = defineProps({
        user: {
            required: true
        },
    })
    const emit = defineEmits(['messagesent'])


    function sendMessage() {

                    emit('messagesent', {
                        user: props.user,
                        message: newMessage.value
                    })               

                    newMessage.value = ''
    }


</script>

<template>
        


                            <div class="row">

                                <div class="input-group">
                                    <textarea  class="form-control" id="message" name="message" placeholder="Escribe el mensaje aqui ..." v-model="newMessage" @keyup.enter="sendMessage" rows="2"></textarea>
                                    <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                                        Enviar
                                    </button>
                                </div>

                            </div>




</template>

