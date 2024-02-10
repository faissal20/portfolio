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
                        <Router-link to="/"> <i class="fa-solid fa-house"></i><span>Home</span> </Router-link>
                    </li>
                    <li>
                        <Router-link to="/statistics"> <i class="fa-solid fa-chart-bar"></i><span>Statistics</span> </Router-link>
                    </li>
                </ul>
        </side>
        <div class="page-content">
            <router-view>

            </router-view>
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
