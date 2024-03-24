<script setup>
import axios from 'axios';
import { ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional

const logs = ref([]);

axios.get('/api/notifications/logs').then(response => {
    logs.value = response.data.data;
});

</script>

<template>
        <div class="logs">
            <div class="table">
                <DataTable :value="logs" scrollable scrollHeight="600px" >
                    <Column field="user.username" header="User" style="min-width: 100px; padding:1rem;"></Column>
                    <Column field="data.ip" header="ip" style="min-width: 100px;"></Column>
                    <Column field="type" header="type" style="min-width: 100px;"></Column>
                    <Column field="data.user_agent"  header="agent" style="min-width: 700px !important;"></Column>
                </DataTable>
            </div>
        </div>
    
</template>

<style>
.table {
    background-color: #fff;
    border-radius: 7px;
    padding: 1rem;
}
.log span {
    background-color: #b6ff0c;
    padding: 5px;
    border-radius: 5px;
}
.log {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    gap: 2rem;
}
</style>