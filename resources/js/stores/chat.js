import { defineStore } from "pinia";

export const userChatStore = defineStore('chat', {
    state : ()  => ({
        messages : [],
    }),

    getters : {
        getMessages : (state) => state.messages,
    },

    actions : {
        setMessages(messages){
            this.messages = messages;
        },
        addMessage(message){
            this.messages.push(message);
        },
        fetchMessages(){
            axios.get('/api/chat').then(response => {
                this.setMessages(response.data);
            });
        }
    }
})