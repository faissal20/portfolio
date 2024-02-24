<script setup>
const props = defineProps(['message'])

import { ref, computed } from 'vue';
import axios from 'axios';

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

    }).catch(error => {
        response.value = error.response.data.message;
    });

    showReplyForm.value = false;
}
</script>

<template>
    <div class="message">
        <div v-html="props.message.message">

        </div>
        <div class="date"><i class="fa-regular fa-clock"></i> <span>{{ props.message.createdAt }}</span> </div>
        <button class="show-reply" @click="show()"><i class="fa-solid fa-reply"></i></button>
    </div>

    <transition name="bounce">
        <div v-if="showReplyForm">
            <div class="reply">

                <textarea name="message" v-model="reply" placeholder="Write Something beautifull !" id="message" cols="3"
                    rows="2">
                </textarea>
                <div class="options">
                    <button class="" @click="submitMessage()"><i class="fa-solid fa-share"></i></button>
                    <button class="" @click="close()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>
.show-reply {
    cursor: pointer;
    padding: 2rem 0 0 0;
}

.bounce-enter-active {
    animation: bounce-in 0.5s;
}

.bounce-leave-active {
    animation: bounce-in 0.5s reverse;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }

    50% {
        transform: scale(1.01);
    }

    100% {
        transform: scale(1);
    }
}</style>