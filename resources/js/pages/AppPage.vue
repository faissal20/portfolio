<style>
    .app{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
  
</style>

<template>
    <div class="app">
        <side class="side-navbar">
            <ul>
                <li>
                    <router-link to="/dashboard">Home</router-link>
                </li>
                <li>
                    <router-link to="/summary">Tasnim's Book Summary</router-link>
                </li>
                <li>
                    <router-link to="/statistics">Tasnim's Book Summary</router-link>
                </li>
            </ul>
        </side>
        <div>
            <!-- <router-view></router-view> -->
            <h1>test</h1>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
