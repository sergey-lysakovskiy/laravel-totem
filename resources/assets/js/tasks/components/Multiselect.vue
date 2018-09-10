<!-- Vue component -->
<template>
    <div>
        <vue-multiselect
                v-model="value"
                :options="options"
                :multiple="true"
                track-by="id"
                label="name"
                placeholder="Pick a tag or tags"
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
        props: ['initValue'],
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

                        if (this.initValue.length) {
                            var self = this;
                            this.initValue.map(function (value, key) {
                                self.options.map(function (option, index) {
                                    if (option.id == value) {
                                        self.value.push(option);
                                    }
                                })
                            });
                        }

                    });
            },
        }
    }
</script>

<!-- Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
