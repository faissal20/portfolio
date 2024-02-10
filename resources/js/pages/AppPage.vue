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
                    <router-link to="/dashboard"> <i class="fa-solid fa-house"></i><span>Home</span> </router-link>
                </li>
                <li>
                    <router-link to="/summary"><i class="fa-solid fa-book"></i> <span>Tasnim's Book Summary</span></router-link>
                </li>
                <li>
                    <router-link to="/statistics"><i class="fa-solid fa-chart-column"></i> <span>Our Statistics</span></router-link>
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
