import { defineStore } from "pinia";

export const userChatStore = defineStore('chat', {
    state: () => ({
        messages: [],
    }),

    getters: {
        getMessages: (state) => state.messages,
    },

    actions: {

        setMessages(messages) {
            this.messages = messages;
        },

        addMessage(message) {
            this.messages = [...this.messages, message];
        
            if (!("Notification" in window)) {
                console.log("This browser does not support desktop notification");

            } else if (Notification.permission === "granted") {
                
                let title = "New Message From " + message.from.username;
                let options = {
                    body: message.content
                }

                new Notification(title, options);

            }
        },

        async sendMessage(message, user_id) {
            let res = await axios.post('/api/chat', {
                content: message,
                to: user_id
            });
            console.log('res');
            this.messages = [...this.messages, res.data.data];
            console.log(this.messages);
        },
        fetchMessages() {
            axios.get('/api/chat').then(response => {
                this.setMessages(response.data.data);
            });
        }
    }
})