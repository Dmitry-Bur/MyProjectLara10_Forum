<template>
    <div>
        <div class="flex items-center mb-8">
            <h3 class="text-xl mr-2">Жалобы</h3>
        </div>
        <div>
            <div class=" border border-gray-200 rounded-lg">
                <table class="text-center text-medium ">
                    <thead class="w-full bg-gray-100">
                    <tr>
                        <th class="p-4 text-gray-700">ID</th>
                        <th class="p-4 text-gray-700">Текст</th>
                        <th class="p-4 text-gray-700">Пользователь</th>
                        <th class="p-4 text-gray-700">Ссылка(Сообщение)</th>
                        <th class="p-4 text-gray-700">Статус</th>
                        <th class="p-4 text-gray-700">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="complaint in complaints" class="text-gray-500">
                        <td class="p-4">{{ complaint.id }}</td>
                        <td class="p-4">{{ complaint.body }}</td>
                        <td class="p-4">{{ complaint.user.name }}</td>
                        <td class="p-4">
                            <Link :href="route('themes.show', complaint.theme_id) + `#${complaint.message_id}`">
                                Ссылка
                            </Link>
                        </td>
                        <td class="p-4 whitespace-nowrap">{{ complaint.is_solved != 1 ? 'Решено' : 'В работе'}}</td>
                        <td class="p-4">
                            <a @click.prevent="update(complaint)" href="#" class="block w-8 h-8 mx-auto">
                                <svg  :class="[ complaint.is_solved != 0 ? 'w-8 h-8 stroke-green-700' : ' w-8 h-8 stroke-red-700 ' ]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </a>
                        </td>
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
        'complaints'
    ],

    methods:{
        update(complaint){
            axios.patch(`/admin/complaints/${complaint.id}`)
            .then( res=>{
                complaint.is_solved = res.data.is_solved
            })
        }
    }


}
</script>

<style scoped>

</style>
