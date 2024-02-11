<script setup>
    import { ref, computed } from 'vue';
    import { useHomeDataStore } from '../stores/homeData';

    const homeStore = useHomeDataStore();

    let dailyMessages  = ref([]);

    dailyMessages  = computed(() => homeStore.messages );

</script>
<template>

    <div>
        <h3>
            Today's Message 
        </h3>
        <div v-if="dailyMessages">
            <div v-for="message in dailyMessages" :key="message.id">
                {{ message.message }}
            </div>
        </div>

        <button class="btn-secondary effect-1">Leave a message</button>
    </div>

</template>