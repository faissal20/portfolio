<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useHomeDataStore } from '../stores/homeData';

const homeStore = useHomeDataStore();

let dailyMessages = ref([]);

let showLeaveMessage = ref(false);

dailyMessages = computed(() => homeStore.messages);

let messageleft = ref("");

let response = ref("");

let submitMessage = () => {
    console.log(messageleft.value)
    axios.post('/api/home/leaveMessage', {
        message: messageleft.value
    }).then(response => {
        response.value = response.data.message;
    }).catch(error => {
        response.value = error.response.data.message;
    });

    showLeaveMessage.value = false;
}

let show = () => {
    showLeaveMessage.value = true;
}

let updateLeftMessage = (event) => {
    messageleft.value = event.target.value;
}

</script>
<template>
    <div>
        <h3>
            Today's Message
        </h3>
        <!-- <div v-if="dailyMessages">
            <div v-for="message in dailyMessages" :key="message.id" class="message">
                {{ message.message }}
            </div>
        </div> -->
        <div class="" style="margin: 1rem 0">
            <p>


                Good Morning Mi Todo 🌻
                 <br>
                <br>
                    Today is Staurday you can call it Iamuersday 😂😂😂 
                    <br>
                    Please have some rest and enjoy your day (a lot of talking to me haha) then do your job and studies. 
                    <br>    
                    your are Fantastic beautifull and amazing I like you so much. 
                <br>
                Be Happy My princess 🌻❤️

            </p>

        </div>

        <div v-if="showLeaveMessage">
            <form action="">
                <div class="input">
                    <label for="message">Leave a message</label>
                    <textarea name="message" v-model="messageleft" placeholder="Write Something beautifull !"  id="message" cols="3" rows="2">
                    </textarea>
                    
                </div>
                <div class="input">
                    <button class="btn-primary effect-1" @click="submitMessage()">Send</button>
                </div>
            </form>
        </div>
        <button v-if="!showLeaveMessage" class="btn-secondary effect-1" @click="show()">Leave a message</button>
        <p style="color: red; margin-top:2rem">{{ response }}</p>
    </div>
</template>

<style>
.message {
    padding-top: 2rem;
}</style>