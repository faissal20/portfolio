<template>
    <div class="timeline">
        <Timeline :value="events" align="alternate" class="customized-timeline">
            <template #marker="slotProps">
                <span class="icon-marker" :style="{ backgroundColor: slotProps.item.color }">
                    <i :class="slotProps.item.icon"></i>
                </span>
            </template>
            <template #content="slotProps" class="timeline-content">
                <Card class="mt-3">
                    <template #title>
                        {{ slotProps.item.status }}
                    </template>
                    <template #subtitle>
                        {{ slotProps.item.date }}
                    </template>
                    <template #content>
                        <p>
                            {{ slotProps.item.message }} 
                        </p>
                    </template>
                </Card>
            </template>
        </Timeline>
    </div>
</template>

<script setup>
import { ref } from "vue";
import Timeline from 'primevue/timeline';
import Card from 'primevue/card';

const events = ref([
    { status: 'First Seen', date: '06/2022 10:00', icon: 'pi pi-share-alt', color: '#9C27B0', image: 'game-controller.jpg', message: 'This is the first time I saw you after an exam, under the tree, with that beautiful smile in that time I said people who know this girl must be the luckiest in this world.' },
    { status: 'First meet', date: '06/2022', icon: 'pi pi-user-plus', color: '#673AB7', message: "Second time I saw you and the first time we made a conversation, but I didn't realise what would you become to me one day" },
    
]);

</script>

<style lang="scss" scoped>
@media screen and (max-width: 960px) {
    ::v-deep(.customized-timeline) {
        .p-timeline-event:nth-child(even) {
            flex-direction: row;

            .p-timeline-event-content {
                text-align: left;
            }
        }

        .p-timeline-event-opposite {
            flex: 0;
        }
    }
}

.timeline{
    margin: 1rem 6rem ;
    flex: 1;
}
.p-card{
    padding: 1rem;
    margin: 10px;
}

.p-timeline-event{
    gap: 10px;
}

.p-timeline-event-content{
    margin: 10px;
}

// flex w-2rem h-2rem align-items-center justify-content-center text-white border-circle z-1 shadow-1 this to single scss class .icon-marker 

.icon-marker {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    border-radius: 50%;
    z-index: 1;
    box-shadow : 0 0 10px #00000050;
}

</style>
