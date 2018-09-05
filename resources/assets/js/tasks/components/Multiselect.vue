<!-- Vue component -->
<template>
    <div>
        <vue-multiselect
                v-model="value"
                :options="options"
                :multiple="true"
                track-by="id"
                label="name"
                key="id"
        ></vue-multiselect>
        <input name="tags[]" type="hidden" v-for="selected in value" :value="selected.id">
    </div>
</template>

<script>
    import VueMultiselect from 'vue-multiselect'
    import axios from 'axios';

    export default {
        components: {
            VueMultiselect
        },
        mounted() {
            this.fillOptions();
        },
        data () {
            return {
                value: [],
                options: []
            }
        },
        methods: {
            fillOptions() {
                axios.get('/api/tags')
                    .then(response => {

                        this.options = response.data.tags;

                    });
            },
        }
    }
</script>

<!-- Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
