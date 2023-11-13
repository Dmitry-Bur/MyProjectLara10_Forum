<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Редактировать тему</h3>
        </div>
        <div  >
            <div class="mb-4">
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/2" placeholder="Наименование темы">
            </div>
            <div class="mb-4">
                <textarea type="text" v-model="description" class="border-gray-300 p-2 w-1/2" placeholder="Описание">
                {{ description }}
                </textarea>
            </div>
            <div>
                <a class="block py-2 w-48 bg-gray-800  border border-gray-100 text-white text-center"  @click.prevent="update" href="#">Сохранить</a>
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
        'theme'
    ],

    data() {
        return {
            title: this.theme.title,
            description: this.theme.description,
        }
    },

    methods: {
        update() {
            this.$inertia.patch(`/themes/${this.theme.id}` ,{
                title: this.title,
                description: this.description,
            })
        }
    }
}
</script>

<style scoped>

</style>
