<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-2">Разделы</h3>
            <template v-if="checkGlobalAuth()">
                <Link :href="route('sections.create')"
                      class="block px-2 w-1/6 mr-1 py-1 bg-white border-2 border-gray-500 rounded-lg text-center">+
                    Раздел
                </Link>
            </template>

            <template v-if="sections.filter(section =>
                checkSectionAuth(section)).length">

                <Link :href="route('branches.create')"
                      class="block px-2 w-1/6 py-1 bg-white border-2 border-gray-500 rounded-lg text-center">+ Ветка
                </Link>
            </template>

        </div>

        <div v-if="sections">
            <div v-for="section in sections" class="mb-8">
                <div v-if="section.branches.length">
                    <h3>{{ section.title }}</h3>
                    <template v-if="checkSectionAuth(section)">

                        <div class=" mb-4 flex items-center">
                            <h3 class="mr-4">{{ section.title }}</h3>
                            <Link :href="route('sections.edit', section.id)" class="mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                </svg>
                            </Link>

                            <Link :href="route('sections.destroy', section.id)" method="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6 text-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                            </Link>
                        </div>

                    </template>
                    <div v-for="branch in section.branches" class="flex items-center">
                        <Link :href="route('branches.show', branch.id)"
                              class="w-full block bg-white p-2 border border-gray-300">
                            <h3>{{ branch.title }}</h3>
                        </Link>
                        <template v-if="checkSectionBranchAuth(section, branch)">
                            <Link :href="route('branches.edit', branch.id)" class="block p-2 bg-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                </svg>
                            </Link>

                            <Link :href="route('branches.destroy', branch.id)" method="delete"
                                  class="block p-2 bg-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6 stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                            </Link>

                        </template>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    layout: MainLayout,

    components: {
        Link
    },

    props: [
        'sections'
    ],

    methods: {
        checkGlobalAuth() {
            return this.$page.props.auth.roles.some(code => {

                return [
                    `editor`,
                ].includes(code)
            })
        },
        checkSectionAuth(section) {
            return this.$page.props.auth.roles.some(code => {

                return [
                    `editor`,
                    `editor.${section.id}`,
                ].includes(code)
            })
        },
        checkSectionBranchAuth(section, branch) {
            return this.$page.props.auth.roles.some(code => {
                return [
                    `editor`,
                    `editor.${section.id}`,
                    `editor.${section.id}.${branch.id}`,
                ].includes(code)
            })
        },

    }


}
</script>

<style scoped>

</style>
