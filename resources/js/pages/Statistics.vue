<script setup>
import { ref, computed } from 'vue';
import { useHomeDataStore } from '../stores/homeData';
import axios from 'axios';

const store = useHomeDataStore();

let stats = ref({
    heartStorage: 0,
    knowledge: 0,
    missing: 0,
    happiness: 0,
    made_for_each_other: 0
});

stats = computed(() => store.stats);

const updateStatistics = async (data) => {
    await axios.put('/api/ourStatistics', data)
        .then(response => {
            console.log(response.data.message)
        }).catch(error => {
            console.log(error.response.data.message)
        });
}

let madeForEachOthersProgress = computed(() => {
    return {
        height: store.stats.madeForEachOther + "%",
        borderRadius: store.stats.madeForEachOther == 100 ? "7px" : "0 0 7px 7px",
    }
})

let heartProgress = computed(() => {
    return {
        height: store.stats.heartStorage + "%",
        borderRadius: store.stats.heartStorage == 100 ? "7px" : "0 0 7px 7px",
    }
})

let knowledgeProgress = computed(() => {
    return {
        height: store.stats.knowledge + "%",
        borderRadius: store.stats.knowledge == 100 ? "7px" : "0 0 7px 7px",
    }
})

let missingProgress = computed(() => {
    return {
        height: store.stats.missing + "%",
        borderRadius: store.stats.missing == 100 ? "7px" : "0 0 7px 7px",
    }
})

let happinessProgress = computed(() => {
    return {
        height: store.stats.happiness + "%",
        borderRadius: store.stats.happiness == 100 ? "7px" : "0 0 7px 7px",
    }
})

let increaseHeart = () => {
    let data = {
        heart_storage: store.stats.heartStorage != 100 ? parseInt(store.stats.heartStorage) + 1 : 100,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther

    }

    store.setStatistics(data)

    updateStatistics(data)

}

let decreaseHeart = () => {
    let data = {
        heart_storage: store.stats.heartStorage != 0 ? parseInt(store.stats.heartStorage) - 1 : 0,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther

    }
    store.setStatistics(data)
    updateStatistics(data)
}
let increaseKnowledge = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge != 100 ? parseInt(store.stats.knowledge) + 1 : 100,
        missing: store.stats.missing,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther

    }
    console.log(data)
    store.setStatistics(data)
    updateStatistics(data)
}

let decreaseKnowledge = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge != 0 ? parseInt(store.stats.knowledge) - 1 : 0,
        missing: store.stats.missing,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther


    }
    store.setStatistics(data)
    updateStatistics(data)
}
let increaseMissing = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing != 100 ? parseInt(store.stats.missing) + 1 : 0,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther

    }
    console.log(data)
    store.setStatistics(data)
    updateStatistics(data)
}

let decreaseMissing = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing != 0 ? parseInt(store.stats.missing) - 1 : 0,
        happiness: store.stats.happiness,
        made_for_each_other: store.stats.madeForEachOther

    }
    store.setStatistics(data)
    updateStatistics(data)
}
let increaseHappiness = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing,
        happiness: store.stats.happiness != 100 ? parseInt(store.stats.happiness) + 1 : 0,
        made_for_each_other: store.stats.madeForEachOther

    }
    console.log(data)
    store.setStatistics(data)
    updateStatistics(data)
}

let decreaseHappiness = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing,
        happiness: store.stats.happiness != 0 ? parseInt(store.stats.happiness) - 1 : 0,
        made_for_each_other: store.stats.madeForEachOther
    }
    store.setStatistics(data)
    updateStatistics(data)
}

let increaseMadeForEachOthers = () => {
    let data = {
        heart_storage: store.stats.heartStorage,
        knowledge: store.stats.knowledge,
        missing: store.stats.missing,
        happiness: store.stats.happiness,
        made_for_each_other : store.stats.madeForEachOther != 100 ? parseInt(store.stats.madeForEachOther) + 1 : 100
    }
    console.log(data)
    store.setStatistics(data)
    updateStatistics(data)
}

</script>
<template>
    <div class="statistics">
        <h3>
            Statistics
        </h3>
        <div>
            <div class="stat-cards">
                <div class="state-card heart">
                    <div class="progress" :style="heartProgress">

                    </div>
                    <h4>Heart Storage</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="increaseHeart()"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="decreaseHeart()"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ stats.heartStorage }} %</p>
                    </div>
                </div>
                <div class="state-card knowledge">
                    <div class="progress" :style="knowledgeProgress"></div>
                    <h4>Knowledge</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="increaseKnowledge()"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="decreaseKnowledge()"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ stats.knowledge }} %</p>
                    </div>
                </div>
                <div class="state-card missing">
                    <div class="progress" :style="missingProgress"></div>
                    <h4>Missing</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="increaseMissing"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="decreaseMissing"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ stats.missing }} %</p>
                    </div>
                </div>
                <div class="state-card happiness">
                    <div class="progress" :style="happinessProgress"></div>
                    <h4>Happiness</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="increaseHappiness"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="decreaseHappiness"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ stats.happiness + "%" }}</p>
                    </div>
                </div>
                <!-- made for each others -->
                <div class="state-card madeForEachOther">
                    <div class="progress" :style="madeForEachOthersProgress"></div>
                    <h4>made for each others</h4>
                    <div class="footer">
                        <div class="control">
                            <button class="increas" @click="increaseMadeForEachOthers()"><i class="fa-solid fa-plus"></i></button>
                            <button class="increas" @click="()=> {}"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <p>{{ stats.madeForEachOther + "%" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.stat-cards {
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    align-items: stretch;
    flex-wrap: wrap;
    gap: 1rem;
}

.state-card {
    flex: 1;
    padding: 1rem;
    border: 1px solid #00000010;
    border-radius: 7px;
    box-shadow: 0 0 10px #00000010;
    backdrop-filter: saturate(180%) blur(20px);
    position: relative;
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

.stat-cards h4 {
    margin-bottom: 3rem;
}

.footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.control {
    display: flex;
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
</style>
