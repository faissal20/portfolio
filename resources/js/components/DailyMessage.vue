<script setup>
import { ref, computed } from 'vue';
import { useHomeDataStore } from '../stores/homeData';

const homeStore = useHomeDataStore();

let dailyMessages = ref([]);

dailyMessages = computed(() => homeStore.messages);

</script>
<template>
    <div>
        <h3>
            Today's Message
        </h3>
        <!-- <div v-if="dailyMessages">
            <div v-for="message in dailyMessages" :key="message.id" class="message">
                {{ message.message }}
            </div>
        </div> -->
        <div class="card" style="margin: 2rem 0; padding: 2rem 1rem">
            <p >

    
                Hey Tasnim
    
                I know you're not feeling well, and it's tough being apart. Sending you all my energy and healing vibes. Take the
                time you need to rest, and remember I'm just a massage away if you need anything. Wishing you a speedy recovery.
                Can't wait to see you smiling again.
    
                Get Well Soon, Mi Todo ❤️
                
            </p>

        </div>

        <!-- <button class="btn-secondary effect-1">Leave a message</button> -->
    </div>
</template>

<style>
.message {
    padding-top: 2rem;
}
</style>