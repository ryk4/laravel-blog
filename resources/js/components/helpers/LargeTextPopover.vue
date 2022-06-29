<template>
    <div>
        <Popper>
            <button class="btn btn-custom-neutral py-1">View</button>
            <template #content>
                <div>{{ this.value }}</div>
            </template>
        </Popper>
    </div>
</template>

<script>
import {defineComponent} from "vue";
import Popper from "vue3-popper";

export default defineComponent({
    props: ['value'],
    components: {
        Popper,
    },
    mounted() {
        console.log('mounted mate')
    }
});

</script>


<style scoped>
:deep(.popper) {
    background: #00AFA3;
    padding: 20px;
    border-radius: 20px;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    word-break: break-all;
}

:deep(.popper #arrow::before) {
    background: #00AFA3;
}

:deep(.popper:hover),
:deep(.popper:hover > #arrow::before) {
    background: #00AFA3;
}
</style>
