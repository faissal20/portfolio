<script setup>
import Accordion from 'primevue/accordion';
import AccordionTab from 'primevue/accordiontab';
import Toolbar from 'primevue/toolbar';

</script>
<template>
    <!-- things I love about you -->
    <div >
        <div class="things-header">
            <h1>
                This is a list of the things I like about you !
            </h1>
        </div>
        <div class="things-content">
            <Accordion :activeIndex="0">
                <AccordionTab header="You Smile of course! 😊">
                    <p>
                        First thing I fall in love with you is your smile. Oh God I realy remeber the first day I saw it.
                        and it's getting more beautifull and better every day.
                    </p>
                </AccordionTab>
            </Accordion>
            <p class="things-more">
                There is more until I reach the infinity .... 
            </p>
        </div>
    </div>
</template>
<style>
.things-header {
    
}

.things-content {
    padding: 1rem 0;
    background-color: #f4f4f450;
    width: 600px;
    border-radius: 7px;

}

.things-more {
    padding: .5rem 1rem; 

}

.p-accordion {
    padding: 1rem;
    background-color: transparent;
}

.p-accordion-header{
    padding: 1rem .5rem;
    background-color: #f4f4f4;
    border-radius: 7px 7px 0 0;
}

.p-accordion-header >  * {
    background-color: transparent !important;
}

.p-accordion-content{
    padding: 1rem;
    background-color: #f4f4f480;
    max-width: 100%;
}

@media screen and (max-width: 750px) {
    .things-content {
        width: 100%;

    }
}
</style>