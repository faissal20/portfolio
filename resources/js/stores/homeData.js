import { defineStore } from 'pinia'

export const useHomeDataStore = defineStore('homeData', {
    state: () => ({
        dailyMessages : null,
        statistics : {
            heartStorage : 0,
            knowledge : 0,
            missing : 0,
            happiness : 0,
        }
    }),

    getters: {
        messages : (state) => state.dailyMessages, 
        stats : (state) => state.statistics,
    },

    actions: {
        setDailyMessages(messages){
            console.log(messages);
            this.dailyMessages = messages;
        },
        setStatistics(statistics){
            this.statistics = {
                heartStorage : statistics.heart_storage,
                knowledge : statistics.knowledge,
                missing : statistics.missing,
                happiness : statistics.happiness,
                madeForEachOther : statistics.made_for_each_other,
            }
        }
    }
})
