<script setup>
import { ref, computed } from 'vue';
import { useDailyMessagesStore } from '../stores/dailyMessages';
import Message from './Message.vue';

const messagesStore = useDailyMessagesStore();

let dailyMessages = ref([]);


dailyMessages = computed(() => messagesStore.dailyMessages );


</script>
<template>
    <div class="daily-message">
        <h3>
            Today's Message
        </h3>
        <div v-for="message in dailyMessages" :key="message.id">
            <Message :message="message" />
        </div>    
    </div>
</template>

<style>
    .reply {
        cursor: pointer;
        padding: 2rem 0 0 0;
    }
</style>