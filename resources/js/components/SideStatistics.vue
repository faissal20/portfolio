<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';

import { useMyStatisticsStore } from '../stores/myStatistics';

const store = useMyStatisticsStore();

let heartStorage = computed(() => store.heartStorage);
let knowledge = computed(() => store.knowledge);
let happiness = computed(() => store.happiness);
let missing = computed(() => store.missing);
let madeForEachOther = computed(() => store.madeForEachOther);
let daroriyat = computed(() => store.daroriyat);

let heartProgress = computed(() => ({ width: `${store.heartStorage}%` }));
let knowledgeProgress = computed(() => ({ width: `${store.knowledge}%` }));
let happinessProgress = computed(() => ({ width: `${store.happiness}%` }));
let missingProgress = computed(() => ({ width: `${store.missing}%` }));
let madeForEachOthersProgress = computed(() => ({ width: `${store.madeForEachOther}%` }));
let daroriyatProgress = computed(() => ({ width: `${store.daroriyat}%` }));

</script>

<template>

    <div class="side-statistics">
        <h3>
            My Statistics
        </h3>

        <div>
            <div class="my-stats">
                <div class="my-state-card heart">
                    <h4>you have this space in my heart</h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="heartStorage > 0" :style="heartProgress"></span>
                        </transition>

                        <p >{{ heartStorage }}%</p>
                    </div>
                </div>
                <div class="my-state-card knowledge">
                    <h4>I know you </h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="knowledge > 0" :style="knowledgeProgress"></span>
                        </transition>
                        <p>{{ knowledge}}%</p>
                    </div>
                </div>
                <div class="my-state-card happiness">
                    <h4>you make me happy</h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="happiness > 0" :style="happinessProgress"></span>
                        </transition>
                        <p>{{ happiness }}%</p>
                    </div>
                </div>
                <div class="my-state-card missing">
                    <h4>I miss you</h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="missing > 0" :style="missingProgress"></span>
                        </transition>
                        <p>{{ missing }}%</p>
                    </div>
                </div>
                <div class="my-state-card madeForEachOther">
                    <h4>We are made for each other</h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="madeForEachOther > 0" :style="madeForEachOthersProgress"></span>
                        </transition>
                        <p>{{ madeForEachOther }}%</p>
                    </div>
                </div>
                <div class="my-state-card daroriyat">
                    <h4>How much you are Daroriya For me </h4>
                    <div  class="meter">
                        <transition name="progress">
                            <span v-if="daroriyat > 0" :style="daroriyatProgress"></span>
                        </transition>
                        <p>{{ daroriyat }}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style>
.my-stats {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    justify-content: stretch;
    flex-direction: column;
}

.my-state-card {
    background-color: #f5f5f5;
    padding: 1rem;
    border-radius: 10px;
    margin: .5rem 0;
}

.my-state-card h4, .my-state-card p{
    margin: 0;
    padding: 0;
    font-size: .9rem;
    font-weight: 500;
    color: #333;
}

.my-state-card p {
    margin-top: 5px;
}



.meter {
    height: 5px;
    position: relative;
    background: #55555560;
    border-radius: 25px;
    margin: .7rem 0;
    box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
}

.meter>span {
    display: block;
    height: 100%;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    position: relative;
    overflow: hidden;
}

.heart .meter>span {
    background-color: #ff000090;
    box-shadow: 0 0 10px #ff000070;
}

.knowledge .meter>span {
    background-color: #00ffff70;
    box-shadow: 0 0 10px #00ffff70;
}

.missing .meter>span {
    background-color: #ffff0070;
    box-shadow: 0 0 10px #ffff0070;
}

.happiness .meter>span {
    background-color: #00ff0070;
    box-shadow: 0 0 10px #00ff0070;
}

.madeForEachOther .meter>span {
    background-color: #ffae0070;
    box-shadow: 0 0 10px #ffae0070;
}

.daroriyat .meter>span {
    background-color: #ff00ff70;
    box-shadow: 0 0 10px #ff00ff70;
}

.progress-enter-active {
    animation: progress 2s;
}

.progress-leave-active {
    
    animation: progress 2s reverse;
}

@keyframes progress {
    0% {
        transform-origin: 0% 100% ;
        transform: scaleX(0)
    }

    50% {
        transform-origin: 0% 100% ;
        transform: scaleX(.8)
    }

    100% {
        transform-origin: 0% 100% ;
        transform: scaleX(1);
    }
}

</style>