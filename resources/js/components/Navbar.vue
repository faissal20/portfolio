<script setup>
import { ref } from 'vue';
import TabMenu from 'primevue/tabmenu';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();

const userRole = userStore.role;

let items = ref([
    {
        label: "",
        icon: "pi pi-fw pi-home",
        route: "/"
    },
    {
        label: "",
        icon: "pi pi-fw pi-chart-bar",
        route: "/statistics"
    },
    {
        label: "",
        icon: "pi pi-fw pi-users",
        route: "/logs",
        visible: userRole === "admin",
    },
    {
        label: "",
        icon: "pi pi-fw pi-video",
        route: "/movies",
        // visible: userRole === "admin",
    },
    {
        label: "",
        icon: "pi pi-fw pi-history",
        route: "/timeline",
        // visible: userRole === "admin",

    },
    {
        label: "",
        icon: "pi pi-fw pi-comments",
        route: "/chat",
        // visible: userRole === "admin",
    }
]);
</script>

<template>
    <TabMenu :model="items" :style="{ padding: '30px' }">
        <template #item="{ item, props }">
            <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route">
                <a v-ripple :href="href" v-bind="props.action" @click="navigate" :style="{ padding: '10px' }">
                    <span v-bind="props.icon" :style="{ marginRight: '5px' }" />
                    <span v-bind="props.label">{{ item.label }}</span>
                </a>
            </router-link>
        </template>
    </TabMenu>
</template>

<style >
    p-tabmenu .p-tabmenu-ink-bar {
        background-color: #fcd53f !important;
    }
</style>