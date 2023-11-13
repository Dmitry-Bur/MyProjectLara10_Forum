<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Добавить роль</h3>
        </div>
        <div>
            <div class=" border border-gray-200 rounded-lg">
                <div>
                    <div class="mb-4" v-if="sections.length > 0">
                        <select @change="getBranches" class="border-gray-300 w-48 p-2 w-1/4" v-model="section_id">
                            <option  value="null" selected disabled>Выберите раздел</option>
                            <option v-for="section in sections" :value="section.id">{{ section.title }}</option>
                        </select>
                        <div v-if="this.$page.props.errors.section_id" class="text-red-600 text-sm">
                            {{this.$page.props.errors.section_id}}
                        </div>
                    </div>

                    <div class="mb-4" v-if="branches.length > 0">
                        <select class="border-gray-300 w-48 p-2 w-1/4" v-model="branch_id">
                            <option  value="null" selected disabled>Выберите ветку</option>
                            <option v-for="branch in branches" :value="branch.id">{{ branch.title }}</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <input type="text" v-model="title" class="border-gray-300 w-48 p-2 w-1/4" placeholder="Наименование ветки">
                        <div v-if="this.$page.props.errors.title" class="text-red-600 text-sm">
                            {{this.$page.props.errors.title}}
                        </div>
                    </div>
                    <div>
                        <a class="block py-2 w-48 bg-gray-800  border border-gray-100 text-white text-center"
                           @click.prevent="store" href="#">Добавить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import axios from "axios";

export default {
    name: "Index",

    layout: AdminLayout,

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
            branch_id: null,
            branches: []
        }
    },

    methods: {
        store() {
            this.$inertia.post('/admin/roles',{
                title: this.title,
                section_id: this.section_id,
                branch_id: this.branch_id,
            })
        },

        getBranches(){
            this.branch_id = null
            axios.get(`/sections/${this.section_id}/branches`)
                .then( res=>{
                    //  console.log(res);
                    this.branches = res.data
                })
        }
    }


}
</script>

<style scoped>

</style>
