<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">{{ branch.title }}</h3>

            <template v-if="this.$page.props.auth.roles.some(code =>{

                            return[
                            `editor`,
                            `editor.${branch.section_id}`,
                            `editor.${branch.section_id}.${branch.id}`,
                            `editor.${branch.section_id}.${branch.parent_id}`,
                            ].includes(code)
                        })">
            <Link :href="route('branches.themes.create', branch.id)"
                  class="block px-2 w-1/6 py-1 bg-white border-2 border-gray-500 rounded-lg text-center">+ Тема
            </Link>

            </template>
        </div>
    </div>
    <div class="mb-10">
        <div class="mb-4">
            <h3 class="text-xl"> Разделы </h3>
        </div>
        <div v-for="branch in branch.children" class="flex items-center" >
            <Link :href="route('branches.show', branch.id)" class="w-full flex items-center block bg-white p-2 border border-gray-300">
               <div class="mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                   </svg>
               </div>
                <h3>{{ branch.title }}</h3>
            </Link>

            <template v-if="this.$page.props.auth.roles.some(code =>{

                            return[
                            `editor`,
                            `editor.${branch.section_id}`,
                            `editor.${branch.section_id}.${branch.id}`,
                            `editor.${branch.section_id}.${branch.parent_id}`,
                            ].includes(code)
                        })">
            <Link :href="route('branches.edit', branch.id)" class="block p-2 bg-sky-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
            </Link>

            <Link :href="route('branches.destroy', branch.id)" method="delete" class="block p-2 bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </Link>
            </template>

        </div>
    </div>
    <div >
        <div class="mb-4">
            <h3 class="text-xl"> Разделы </h3>
        </div>
        <div v-for="theme in branch.themes" class="flex items-center" >
            <Link :href="route('themes.show', theme.id)" class="w-full flex items-center block bg-white  p-2 border border-gray-300">
                <div class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                </div>
                <div>
                    <h3>{{ theme.title }}</h3>
                    <p class="text-sm">{{ theme.description }}</p>
                </div>
            </Link>

            <template v-if="this.$page.props.auth.roles.some(code =>{

                            return[
                            `editor`,
                            `editor.${branch.section_id}`,
                            `editor.${branch.section_id}.${branch.id}`,
                            ].includes(code)
                        })">
            <Link :href="route('themes.edit', theme.id)" class="block mx-2 p-2 bg-sky-500 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5 stroke-white ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
            </Link>

            <Link :href="route('themes.destroy', theme.id)" method="delete" class="block p-2 bg-red-500 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-white ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </Link>

            </template>

        </div>
    </div>

</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";


export default {
    name: "Show",

    layout: MainLayout,

    components: {
        Link
    },

    props: [
        'branch'
    ],



}
</script>

<style scoped>

</style>
