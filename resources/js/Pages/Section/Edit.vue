<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Редактировать раздел</h3>
        </div>
        <div  >
            <div class="mb-4">
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/4" placeholder="Наименование раздела">
            </div>
            <div>
                <a class="block py-2 w-48 bg-gray-800  border border-gray-100 text-white text-center"  @click.prevent="update" href="#">Добавить</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Edit",

    layout: MainLayout,

    components: {
        Link
    },
    props:[
        'section'
    ],

    data() {
        return {
            title: this.section.title
        }
    },

    methods: {
        update() {
            this.$inertia.patch(`/sections/${this.section.id}` ,{title: this.title})
        }
    }
}
</script>

<style scoped>

</style>
