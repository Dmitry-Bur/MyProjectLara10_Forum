<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Добавить раздел</h3>
        </div>
        <div  >
            <div class="mb-4">
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/4" placeholder="Наименование раздела">
            </div>
            <div>
                <a class="block py-2 w-48 bg-gray-800  border border-gray-100 text-white text-center"  @click.prevent="store" href="#">Добавить</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",

    layout: MainLayout,

    components: {
        Link
    },

    data() {
        return {
            title: ''
        }
    },

    methods: {
        store() {
            this.$inertia.post('/sections' ,{title: this.title})
        }
    }
}
</script>

<style scoped>

</style>
