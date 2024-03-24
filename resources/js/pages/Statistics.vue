<script setup>
import { ref, computed } from 'vue';
import { useStatisticsStore } from '../stores/statistics';
import axios from 'axios';

const store = useStatisticsStore();

let heartStorage = computed(() => store.heartStorage);
let knowledge = computed(() => store.knowledge);
let happiness = computed(() => store.happiness);
let missing = computed(() => store.missing);
let madeForEachOther = computed(() => store.madeForEachOther);
let daroriyat = computed(() => store.daroriyat);

let heartProgress = computed(() => ({ height: `${store.heartStorage}%` }));
let knowledgeProgress = computed(() => ({ height: `${store.knowledge}%` }));
let happinessProgress = computed(() => ({ height: `${store.happiness}%` }));
let missingProgress = computed(() => ({ height: `${store.missing}%` }));
let madeForEachOthersProgress = computed(() => ({ height: `${store.madeForEachOther}%` }));
let daroriyatProgress = computed(() => ({ height: `${store.daroriyat}%` }));

var loading = ref(false)


let  save = async () => {
    let data = {
        heartStorage: heartStorage.value,
        knowledge: knowledge.value,
        happiness: happiness.value,
        missing: missing.value,
        madeForEachOther: madeForEachOther.value,
        daroriyat: daroriyat.value
    }
    
    loading.value = true
    await axios.put('api/statistics', data).then((response) => loading.value = false ) 

}

</script>
<template>
    <div class="statistics">
        <h3>
            Statistics
        </h3>
        <div>
            <div class="stat-cards">
                <div v-if="heartStorage != null" class="state-card heart">
                    <div class="progress" :style="heartProgress"></div>
                    <h4>Heart Storage</h4>
                    <div class="footer">
                        <div class="control">
                            <button :disabled="(store.heartStorage == 100)" class="increas"
                                @click="store.setHeartStorage(heartStorage + 5)"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setHeartStorage(heartStorage - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ heartStorage }} %</p>
                    </div>
                </div>
                <div v-else>
                    <p>Loading...</p>
                </div>
                <div v-if="knowledgeProgress != null" class="state-card knowledge">
                    <div class="progress" :style="knowledgeProgress"></div>
                    <h4>Knowledge</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="store.setKnowledge(store.knowledge + 5)"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setKnowledge(store.knowledge - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ knowledge }} %</p>
                    </div>
                </div>

                <div class="state-card missing">
                    <div class="progress" :style="missingProgress"></div>
                    <h4>Missing</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="store.setMissing(store.missing + 5)"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setMissing(store.missing - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ missing }} %</p>
                    </div>
                </div>
                <div class="state-card happiness">
                    <div class="progress" :style="happinessProgress"></div>
                    <h4>Happiness</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="store.setHappiness(store.happiness + 5)"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setHappiness(store.happiness - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ happiness + "%" }}</p>
                    </div>
                </div>
                <div class="state-card madeForEachOther">
                    <div class="progress" :style="madeForEachOthersProgress"></div>
                    <h4>made for each others</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="store.setMadeForEachOther(store.madeForEachOther + 5)"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setMadeForEachOther(store.madeForEachOther - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ madeForEachOther + "%" }}</p>
                    </div>
                </div>
                <div class="state-card daroriyat">
                    <div class="progress" :style="daroriyatProgress"></div>
                    <h4>How much I am daori for you !</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="store.setDaroriyat(store.daroriyat + 5)"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="store.setDaroriyat(store.daroriyat - 5)"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ daroriyat + "%" }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="save">
            <button @click="save()" class="btn-primary">
                {{ loading == true  ? "Saving.." : "Save" }}
            </button>
        </div>
    </div>
</template>
<style>
.stat-cards {
    margin-top: 1rem;
    display: flex;
    justify-content: flex-start;
    align-items: stretch;
    flex-wrap: wrap;
    gap: 1rem;
}

.state-card {
    flex: 1;
    padding: 1rem;
    flex-basis: 35%;
    border: 1px solid #00000010;
    border-radius: 7px;
    box-shadow: 0 0 10px #00000010;
    backdrop-filter: saturate(180%) blur(20px);
    position: relative;
    overflow: hidden;
}

.progress {
    position: absolute;
    width: 100%;
    bottom: 0;
    left: 0;
    z-index: -1;
    transform: all 4s ease;
}

.heart .progress {
    background-color: #ff000090;
    box-shadow: 0 0 10px #ff000070;
}

.knowledge .progress {
    background-color: #00ffff70;
    box-shadow: 0 0 10px #00ffff70;
}

.missing .progress {
    background-color: #ffff0070;
    box-shadow: 0 0 10px #ffff0070;
}

.happiness .progress {
    background-color: #00ff0070;
    box-shadow: 0 0 10px #00ff0070;
}

.madeForEachOther .progress {
    background-color: #ffae0070;
    box-shadow: 0 0 10px #ffae0070;
}

.daroriyat .progress {
    background-color: #ff00ff70;
    box-shadow: 0 0 10px #ff00ff70;
}

.stat-cards h4 {
    margin-bottom: 3rem;
}

.footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: .5rem;
}

.control {
    display: flex;
    flex-wrap: wrap;
    gap: 2px;
}

.control button {
    cursor: pointer;
    padding: 0 3px;
    border-color: transparent;
    background-color: #00000010;
    color: inherit;
}

.control button:hover {
    background-color: #00000020;
}

.control button:disabled {
    cursor: not-allowed;
}

.save {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
}</style>
