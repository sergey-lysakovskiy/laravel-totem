<template>
    <div class="tags-wrapper">
        <span v-for="tag in tags">
            <a class="uk-badge uk-padding-small uk-margin-small-right" :href="'/totem/tasks?tag='+tag.id">{{ tag.name }}</a>
        </span>
        <a class="uk-badge add-more-tag-badge" @click="showModal = true">+</a>
        <uikit-modal :show="showModal" @close="showModal = false">
            <div class="uk-modal-header">
                <h3>Add Tag</h3>
            </div>
            <div class="uk-modal-body">
                <fieldset class="uk-fieldset">
                    <div class="uk-width-1-1@s uk-width-2-3@m">
                        <input class="uk-input" placeholder="Tag name" v-model="tag.name" type="text">
                    </div>
                </fieldset>
            </div>
            <div class="uk-modal-footer">
                <div class="uk-flex uk-flex-right">
                    <button class="uk-button uk-button-small uk-button-primary" @click.self.prevent="addTag">Add</button>
                </div>
            </div>
        </uikit-modal>
    </div>
</template>

<script>
    import UIKitModal from '../../components/UIKitModal.vue'
    import Icon from '../../components/Icon.vue'
    import axios from 'axios';
    export default {
        name: 'TagType',
        components: {
            'uikit-modal' : UIKitModal,
            'icon' : Icon
        },
        mounted() {
            this.getTags();
        },
        data() {
            return {
                showModal: false,
                tag: {
                    name: ''
                },
                tags: []
            };
        },
        methods: {
            addTag() {
                var self = this;
                axios.post(
                    '/api/tags/create',
                    this.tag
                ).then(function (response) {
                    self.tags.push(response.data);
                    self.showModal = false;
                }).catch(function (response) {
                    console.log(response);
                });
            },
            getTags() {
                axios.get('/api/tags')
                    .then(response => {

                        this.tags = response.data.tags;

                    });
            },
        }
    }
</script>
<style>
    .tags-wrapper {
        position:  relative;
    }
    .add-more-tag-badge {
        position: absolute;
        top: 0;
        right: 0;
    }
</style>
