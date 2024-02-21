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


                Good Morning Tasnim, I am sorry for the delay !
                 <br>
                <br>
                    First of all, I want to inform you that I will get back to sending the daily message as I used to do. <br>
                    <br>
                    Today you have an important meeting, I hope it goes well. I want you to know that I am supporting you from here ! <br>
                    <br>
                    And remember that you are the best, and I like so much
                    <br>    
                    Please take care of yourself. your Cutie Patotie  <br>
                <br>
                Be Happy My everything 🌻❤️

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