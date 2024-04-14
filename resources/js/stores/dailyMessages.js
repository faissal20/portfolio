import { defineStore } from "pinia";

export const useDailyMessagesStore = defineStore('DailyMessages', {
    state : ()  => ({
        dailyMessages : [],
    }),

    getters : {
        dailyMessages : (state) => state.messages,
    },

    actions : {
        setDailyMessages(messages){
            this.messages = messages;
        },
    }
})