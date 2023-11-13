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
                        <th class="p-4 text-gray-700">Имя</th>
                        <th class="p-4 text-gray-700">Роли</th>
                        <th class="p-4 text-gray-700">Изменить роль</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users" class="text-gray-500">
                        <td class="p-4">{{ user.id }}</td>
                        <td class="p-4">{{ user.name }}</td>
                        <td class="p-4">
                            <div>
                                <p v-for="role in user.roles">
                                    {{ role.code}}
                                </p>
                            </div>

                        </td>
                        <td class="p-4 relative">
                            <a @click.prevent="roleChange(user)" href="#">{{ user.is_role_change?'Закрыть':'Выбрать' }}</a>
                            <div v-if="user.is_role_change" class="z-40 text-left absolute left-0 bg-white p-4 border border-gray-300" >
                                <div v-for="role in roles" class="mb-2">
                                    <input @change="toggleRole(user, role.id)" :checked="user.roles.some(userRole => userRole.id === role.id)" class="cursor-pointer mr-2" type="checkbox" :id="`${user.id} ${role.id}`" :value="role.id">
                                    <label class="cursor-pointer" :for="`${user.id} ${role.id}`">{{role.code}}</label>
                                </div>
                            </div>
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
        'users',
        'roles'
    ],

    methods:{
        toggleRole(user, roleId){
            axios.post(`/admin/users/${user.id}/roles`,{
                role_id : roleId
            }).then( res =>{
                user.roles = res.data.roles
            })

        },

        roleChange(user){
            user.is_role_change = !user.is_role_change

            this.users.filter(filteredUser =>{
                return filteredUser.id !== user.id
            }).map(filteredUSer =>{
                filteredUSer.is_role_change = false
            })
        }
    }


}
</script>

<style scoped>

</style>
