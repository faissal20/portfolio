<script setup>
import axios from 'axios';
import { ref } from 'vue';

const logs = ref([]);

axios.get('/api/notifications/logs').then(response => {
    console.log(response.data.data)
    logs.value = response.data.data;
});

</script>

<template>
    <div>
        <h1>Logs</h1>
        <div>
            <div v-for="log in logs" :key="log.id" class="log">
                <td colspan="2">{{ log.user.username }} <span>{{ log.type }} </span> </td>
                <td>{{ log.created }}</td>
            </div>
        </div>
    </div>
</template>

<style>
.log span {
    background-color: #b6ff0c;
    padding: 5px;
    border-radius: 5px;
}
.log {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    gap: 2rem;
}
</style>