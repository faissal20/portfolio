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


                Good Morning Tasnim 🌻
                <br>
                <br>
                Did you know  what id the worst think in my day ? <br>
                It's that I can't see your smile 😔 .. but at least let me know that you are smiling and keep in your mind that I am always thinking about you 
                <br>
                <br>
                I hope you have a great day ahead. Remember to take care of yourself سيدة القارات والمحيطات
                <br>
                <br>
                Be Happy Mi Todo ❤️❤️❤️❤️

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