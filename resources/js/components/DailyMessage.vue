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


                Good Morning Tasnim 
                 <br>
                <br>
                    Today is MxisaDay (Sun Day). and I am sorry for the late message.
                    <br>
                    All I want to say today is that you are the best thing happen to me. I hope I can be the best thing happen to you too. <br>
                    And I will try my best to that for you.<br>
                    I won't let you down. I promise. <br> 
                    <br>    
                    Please take care of yourself. and remember How much you mean litarally everything to me. <br>
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