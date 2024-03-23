<script setup>
const props = defineProps(['message'])

import { ref } from 'vue';
import axios from 'axios';
import Button from 'primevue/button';

// create show message for each message
let showReplyForm = ref(false);
let reply = ref("");
let response = ref("");

let show = () => {
    reply.value = "";
    showReplyForm.value = true;
}

let close = () => {
    showReplyForm.value = false;
}

let submitMessage = async () => {

    await axios.post(`/api/home/reply/${props.message.id}`, {
        message: reply.value

    }).then(response => {
        response.value = response.data.message;
        showReplyForm.value = false;

    }).catch(error => {
        response.value = error.response.data.message;
    });

}
</script>

<template>
    <div class="message">
        <div v-html="props.message.message">

        </div>
        <div class="date"><i class="fa-regular fa-clock"></i> <span>{{ props.message.createdAt }}</span> </div>
        <button class="show-reply" @click="show()"><i class="fa-solid fa-reply"></i></button>
    </div>

    <transition name="toggel-reply">
        <div v-if="showReplyForm" class="reply">
            <textarea name="message" v-model="reply" placeholder="Write Something beautifull !" id="message" cols="3"
                rows="2">
                </textarea>
            <div class="options">
                <Button icon="pi pi-check" severity="secondary" @click="submitMessage()"/>
                <Button icon="pi pi-times" severity="secondary" @click="close()"/>
            </div>
        </div>
    </transition>
</template>

<style>
.show-reply {
    cursor: pointer;
    padding: 2rem 0 0 0;
}

.toggel-reply-enter-active {
    animation: fade-down 0.5s;
}

.toggel-reply-leave-active {
    animation: fade-down 0.5s reverse;
}

@keyframes fade-down {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }

    50% {
        opacity: .3;
        transform: translateY(10px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}
</style>