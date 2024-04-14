<script setup>
import { ref, computed, onMounted, nextTick } from 'vue';
import { watch } from 'vue';
import { userChatStore } from '../stores/chat';
import Editor from 'primevue/editor';

const store = userChatStore();

let chatContent = ref(null)

let user_id = window.user.id;

onMounted(() => {
    store.fetchMessages();
});

let message = ref('')

let sendMessage = async (e) => { 
    let id = user_id == 1 ? 2 : 1;
    await store.sendMessage(message.value, id)
    message.value = ''
    chatContent.value.scrollTop = chatContent.value.scrollHeight - chatContent.value.clientHeight
}

let chatMessages = computed(() => {
    return store.getMessages
})

// watch for new chatMessages and scroll to the bottom
watch(() => chatMessages.value, () => {
    setTimeout(() => {
        chatContent.value.scrollTop = chatContent.value.scrollHeight - chatContent.value.clientHeight
    }, 100)
})



window.Echo.private(`new-message.${user_id}`).listen('NewMessage', (e) => {
    console.log(e.message)
    store.addMessage(e.message)
    chatContent.value.scrollTop = chatContent.value.scrollHeight - chatContent.value.clientHeight
});

</script>

<template>
    <div class="chat">
        <div class="chat-content" ref="chatContent">
            <div :class="message.from.id == user_id ? `my-message` : `message`" v-for="message in chatMessages"
                :key="message.id">
                <div class="message__user">{{ message.from.username }}</div>
                <div class="message__content" v-html="message.message" />
            </div>
        </div>

        <Editor v-model="message" editorStyle="height: 100px"  @keyup.ctrl.enter="sendMessage(e)" />
    </div>
</template>

<style lang="scss" scoped>
    .chat {
        flex: 1;
        padding: 1rem 2rem;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .chat-content {
        display: flex;
        flex-direction: column;
        align-items: start;
        height: 250px;
        overflow-y: auto;
        padding: 0 1rem;
        margin-bottom: 1rem;
    }

    .message {
        display: flex;
        margin-bottom: .4rem;
        background-color: #f1f1f1;
        padding: .5rem 1rem;
        font-size: .9rem;
        max-width: 100%;
        border-radius: 0 12px 12px 12px;
    }

    .my-message {
        padding: .5rem 1rem;
        font-size: .9rem;
        margin-bottom: 1rem;
        background-color: #f1f1f1;
        max-width: 100%;
        align-self: flex-end;
        border-radius: 12px 0 12px 12px;
    }

    .chat-content::-webkit-scrollbar {
        width: 7px;
        border-radius: 70px;

    }

    .chat-content::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .chat-content::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 70px;
    }

</style>
