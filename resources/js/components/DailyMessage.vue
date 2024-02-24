<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useHomeDataStore } from '../stores/homeData';
import Message from './Message.vue';
const homeStore = useHomeDataStore();

let dailyMessages = ref([]);


dailyMessages = computed(() => homeStore.messages);

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