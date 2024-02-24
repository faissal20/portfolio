<style>
.app {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}
@media screen and (max-width: 768px) {
    .app {
        flex-direction: column;
        align-items: stretch;
    }
    
}
</style>

<template>
    <div class="app">
        <div class="side-navbar">

            <ul>
                <li>
                    <Router-link to="/"> <i class="fa-solid fa-house"></i><span>Home</span> </Router-link>
                </li>
                <li>
                    <Router-link to="/statistics"> <i class="fa-solid fa-chart-bar"></i><span>Statistics</span>
                    </Router-link>
                </li>
            </ul>
        </div>
        <div class="page-content">
            <router-view>

            </router-view>
        </div>
    </div>
</template>

<script  setup>
import axios from 'axios';
import { useHomeDataStore } from './stores/homeData';
import { onMounted } from 'vue';

const homeStore = useHomeDataStore();

const getData = async () => {

    let response = await axios.get('/api/home');
    return response.data;
}

onMounted(() => {
    let data = getData();
    data.then(data => {
        let messages = data.dailyMessage;
        let ourStatistics = data.statistics;
        homeStore.setStatistics(ourStatistics);
        homeStore.setDailyMessages(messages);
    })
})
</script>
