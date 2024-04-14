import { defineStore } from "pinia";

export const userChatStore = defineStore('chat', {
    state : ()  => ({
        messages : [],
    }),

    getters : {
        getMessages : (state) => state.messages,
    },

    actions : {
        addMessage(message){
            this.messages = [...this.messages, message];
        },

        async sendMessage(message, user_id){
            let res = await axios.post('/api/chat', {
                content : message,
                to : user_id
            });
            
            this.messages = [...this.messages, res.data.data];
        },
        fetchMessages(){
            axios.get('/api/chat').then(response => {
                this.setMessages(response.data.data);
            });
        }
    }
})