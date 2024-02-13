<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useHomeDataStore } from '../stores/homeData';

const homeStore = useHomeDataStore();

let dailyMessages = ref([]);

let showLeaveMessage = ref(false);

dailyMessages = computed(() => homeStore.messages);

let messageleft = ref("");


let submitMessage = () => {
    console.log(messageleft.value)
    axios.post('/api/home/leaveMessage', {
        message: messageleft.value
    }).then(response => {
        dailyMessages.value.push(response.data);
    }).catch(error => {
        console.log(error);
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


                Good Morning Tasnim 🌻 it's 14 February.
                <br>
                <br>
                As always, I'm here to remind you that you are loved, worthy, and enough. Today being Valentine's Day, I may
                not be able to give you flowers or chocolates 🍫, but I can offer you my constant love and support ❤️ and this words, not just
                today but for every single day 😇. I'm not the type of person who waits for a special occasion to express affection or
                give gifts. I believe you deserve appreciation every second, minute, day, month and year. You
                deserve more than just one day to be truly appreciated
                <br>
                <br>
                I hope you have a great day ahead. Remember to take care of yourself. 
                <br>
                <br>
                Be Happy Mi Todo ❤️❤️❤️❤️

            </p>

        </div>

        <div v-if="showLeaveMessage">
            <form action="">
                <div class="input">
                    <label for="message">Leave a message</label>
                    <textarea name="message" v-model="messageleft" id="message" cols="3" rows="2">
                    </textarea>
                </div>
                <div class="input">
                    <button class="btn-primary effect-1" @click="submitMessage()">Send</button>
                </div>
            </form>
        </div>

        <button v-if="!showLeaveMessage" class="btn-secondary effect-1" @click="show()">Leave a message</button>
    </div>
</template>

<style>
.message {
    padding-top: 2rem;
}</style>