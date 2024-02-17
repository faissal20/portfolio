<script setup>
import EmojiPicker from 'vue3-emoji-picker';
import { ref } from 'vue';

let data = ref("");

let onSelectEmoji = (emoji) => {
    data.value += emoji;
}

</script>
<template>
    <form class="leave-message-form">
        <div class="input">
            <textarea name="message" v-model="data" placeholder="Write Something beautifull !"  id="message" rows="4">
            </textarea>
        </div>
        <div class="input">
            <button class="btn-primary effect-1" @click="submitData()">Send</button>
            <EmojiPicker :native="true" @select="onSelectEmoji" />  
        </div>
    </form>
</template>

<style>

</style>