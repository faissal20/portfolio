<script setup>
import { ref, computed, onMounted } from 'vue';
import { userChatStore } from '../stores/chat';

const store = userChatStore(); 

onMounted(() => {
    store.fetchMessages();
});

let message = ref('')

let sendMessage = async () => {
    await store.sendMessage(message.value)
    message.value = ''
}


let chatMessages = computed(() => store.messages)

let user_id = window.user.id;

window.Echo.private(`new-message.${user_id}`).listen('NewMessage', (e) => {
    console.log(e)
    store.addMessage(e.message)
});

</script>

<template>

    <div class="chat">
        <div class="message" v-for="message in chatMessages" :key="message.id">
            <div class="message__user">{{ message.from.name }}</div>
            <div class="message__content">{{ message.content }}</div>
        </div>
    </div>

</template>

<style lang="scss" scoped>

</style>