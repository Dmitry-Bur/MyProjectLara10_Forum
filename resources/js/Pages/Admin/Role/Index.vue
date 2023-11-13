<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Роли</h3>
            <Link :href="route('admin.roles.create')"
                  class="block px-2 w-1/6 mr-1 py-1 bg-white border-2 border-gray-500 rounded-lg text-center">+</Link>
        </div>
        <div>
            <div class=" border border-gray-200 rounded-lg">
                <table class="text-center w-full text-medium ">
                    <thead class="w-full bg-gray-100">
                    <tr>
                        <th class="p-4 text-gray-700">ID</th>
                        <th class="p-4 text-gray-700">Наименование</th>
                        <th class="p-4 text-gray-700">Код</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="role in roles" class="text-gray-500">
                        <td class="p-4">{{ role.id }}</td>
                        <td class="p-4">{{ role.title }}</td>
                        <td class="p-4">{{ role.code}}</td>
                    </tr>
                    </tbody>
                </table>
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
        'roles'
    ],

    methods:{

    }


}
</script>

<style scoped>

</style>
