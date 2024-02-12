<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useHomeDataStore } from '../stores/homeData';

const homeStore = useHomeDataStore();

let dailyMessages = ref([]);

let showLeaveMessage = ref(false);

dailyMessages = computed(() => homeStore.messages);

let messageleft = ref("test message left"); 


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
        <div class="" style="margin-bottom: 1rem">
            <p >

    
                Hey Tasnim <br>
    
                I know you're not feeling well, and it's tough being apart. Sending you all my energy and healing vibes. Take the
                time you need to rest, and remember I'm just a massage away if you need anything. Wishing you a speedy recovery.
                Can't wait to see you smiling again. <br>
    
                Get Well Soon, Mi Todo ❤️
                
            </p>

        </div>

        <div v-if="showLeaveMessage" >
            <form action="">    
                <div class="input">
                    <label for="message">Leave a message</label>
                    <textarea name="message" @change="updateLeftMessage(e)"  id="message" cols="3" rows="2">
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
}
</style>