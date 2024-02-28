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
            console.log(messages)
            this.messages = messages;
        },
    }
})