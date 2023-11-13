<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Добавить ветку</h3>
        </div>
        <div>
            <div class="mb-4" v-if="sections.length > 0">
                <select @change="getBranches" class="border-gray-300 p-2 w-1/4" v-model="section_id">
                    <option value="null" selected disabled>Выберите раздел</option>
                    <template v-for="section in sections" >
                        <template v-if="this.$page.props.auth.roles.some(code =>{

                            return[
                            `editor`,
                            `editor.${section.id}`,
                            ].includes(code)
                        })">
                            <option :value="section.id">{{ section.title }}</option>
                        </template>

                    </template>



                </select>
                <div v-if="this.$page.props.errors.section_id" class="text-red-600 text-sm">
                    {{ this.$page.props.errors.section_id }}
                </div>
            </div>

            <div class="mb-4" v-if="branches.length > 0">
                <select class="border-gray-300 p-2 w-1/4" v-model="parent_id">
                    <option value="null" selected disabled>Выберите ветку</option>
                    <option v-for="branch in branches" :value="branch.id">{{ branch.title }}</option>
                </select>
            </div>

            <div class="mb-4">
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/4" placeholder="Наименование ветки">
                <div v-if="this.$page.props.errors.title" class="text-red-600 text-sm">
                    {{ this.$page.props.errors.title }}
                </div>
            </div>
            <div>
                <a class="block py-2 w-48 bg-gray-800  border border-gray-100 text-white text-center"
                   @click.prevent="store" href="#">Добавить</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
import axios from "axios";

export default {
    name: "Create",

    layout: MainLayout,

    components: {
        Link
    },

    props: [
        'sections'
    ],

    data() {
        return {
            title: '',
            section_id: null,
            parent_id: null,
            branches: []
        }
    },

    methods: {
        store() {
            this.$inertia.post('/branches', {
                section_id: this.section_id,
                parent_id: this.parent_id,
                title: this.title
            })
        },

        getBranches() {
            this.parent_id = null
            axios.get(`/sections/${this.section_id}/branches`)
                .then(res => {
                    //  console.log(res);
                    this.branches = res.data
                })
        }
    }
}
</script>

<style scoped>

</style>
