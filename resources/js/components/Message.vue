<script setup>
const props = defineProps(['message'])

import { ref, computed } from 'vue';
import axios from 'axios';
import { useToast } from "vue-toastification";

// create show message for each message
let showReplyForm = ref(false);
let reply = ref("");
let response = ref("");
const toast = useToast();

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
        toast.success(response.data.message,
            {
                position: "top-center",
                timeout: 4476,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.95,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: false,
                icon: false,
                rtl: true
            });
            showReplyForm.value = false;

    }).catch(error => {
        response.value = error.response.data.message;
        toast.error('an error occured, please refresh the page and try again', 
         {
            position: "top-center",
            timeout: 4476,
            closeOnClick: true,
            pauseOnFocusLoss: true,
            pauseOnHover: true,
            draggable: true,
            draggablePercent: 0.95,
            showCloseButtonOnHover: false,
            hideProgressBar: false,
            closeButton: false,
            icon: false,
            rtl: true
        });
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
                <button class="" @click="submitMessage()"><i class="fa-solid fa-share"></i></button>
                <button class="" @click="close()"><i class="fa-solid fa-xmark"></i></button>
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