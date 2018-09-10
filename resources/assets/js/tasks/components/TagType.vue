<template>
    <div class="tags-wrapper">
        <span v-for="tag in tags">
            <a class="uk-label uk-margin-small-right tag-badge" :href="'/totem/tasks?tag='+tag.id">{{ tag.name }}</a>
        </span>
        <a class="uk-badge add-more-tag-badge" @click="showModal = true">+</a>
        <uikit-modal :show="showModal" @close="showModal = false">
            <div class="uk-modal-header">
                <h3>Add Tag</h3>
            </div>
            <div class="uk-modal-body">
                <fieldset class="uk-fieldset">
                    <div class="uk-width-1-1@s">
                        <input class="uk-input" placeholder="Tag name" v-model="tag.name" type="text">
                        <p class="uk-text-danger" v-for="error in errors">{{ error.message }}</p>
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
                tags: [],
                errors: [],
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
                    self.tag.name = '';
                    self.showModal = false;
                }).catch(function (response) {
                    self.errors.push(response)
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
    .tag-badge:hover {
        color: #fff;
    }
    .add-more-tag-badge {
        position: absolute;
        top: 3px;
        right: -50px;
        background: #32d296;
    }
</style>
