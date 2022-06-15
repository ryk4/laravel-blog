<template>
    <div>
        <Select2 class="position-relative" v-model="tags" :options="availableTags"
                 :settings="{ multiple: true }"
                 multiple="multiple"
        />
        <input type="hidden" name="tags" :value="tags"/>
    </div>
</template>

<script>
import Select2 from 'vue3-select2-component';

export default {
    name: "BlogCreateSelect2",
    props: {
        old: Array
    },
    components: {Select2},
    data() {
        return {
            tags: [],
            availableTags: []
        }
    },
    methods: {
        getAllAvailableTags() {
            axios.get('/api/tags').then(res => {
                res.data.data.map(tag => {
                    tag.text = tag.name;
                    this.availableTags.push(tag);
                });
            });
        },
        setOldValues() {
            if (this.old) {
                this.tags = this.old.map(tag => tag.id);
            }
        }
    },
    created() {
        this.getAllAvailableTags();
        this.setOldValues();
    }
}
</script>

<style scoped>

</style>
