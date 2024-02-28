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
                    <Router-link to="/"> <i class="fa-solid fa-house" :style="{ }"></i><span>Home</span>
                    </Router-link>
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
import { useMyStatisticsStore } from './stores/myStatistics';
import { useStatisticsStore } from './stores/statistics';
import { useDailyMessagesStore } from './stores/dailyMessages';
import { onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { ref} from 'vue';

const statisticsStore = useStatisticsStore();
const myStatisticsStore = useMyStatisticsStore();
const messagesStore = useDailyMessagesStore();



const getDailyMessages = async () => {
    let response = await axios.get('/api/home');
    return response.data;
}

const getStatistics = async () => {
    let response = await axios.get('/api/statistic');
    return response.data;
}

const getMyStatistcis = async () => {
    let response = await axios.get('/api/statistics/faissal');
    return response.data;
}



onMounted(() => {
    let dailyMessages = getDailyMessages();
    let myStatistics = getMyStatistcis();
    let statistics = getStatistics();


    dailyMessages.then(data => {
        messagesStore.setDailyMessages(data.data);
    });

    myStatistics.then(data => {
        myStatisticsStore.setHeartStorageValue(data.data.heartStorage);
        myStatisticsStore.setKnowledgeValue(data.data.knowledge);
        myStatisticsStore.setHappinessValue(data.data.happiness);
        myStatisticsStore.setMissingValue(data.data.missing);
        myStatisticsStore.setMadeForEachOtherValue(data.data.madeForEachOther);
    });

    statistics.then(data => {
        console.log(data.data);
        statisticsStore.setStatistics(data.data);
        statisticsStore.setKnowledge(data.data.knowledge);
        statisticsStore.setHappiness(data.data.happiness);
        statisticsStore.setMissing(data.data.missing);
        statisticsStore.setMadeForEachOther(data.data.madeForEachOther);

    });
})
</script>
