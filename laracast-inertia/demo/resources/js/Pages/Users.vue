<template>
    <Head>
        <title> {{ $page.component }} </title>
    </Head>

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl"> {{ $page.component }} </h1>

        <input type="text" placeholder="search..." class="border px-2 rounded-lg" v-model="search">
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ user.name }}
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900"> Edit </Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

 
    <Pagination :links="users.links" class="mt-6" />

</template>



<script setup>
    import Pagination from "../Shared/Pagination.vue";
    import { ref, watch } from "vue";
    import {Inertia} from "@inertiajs/inertia";


    defineProps({ users: Object });
    
    let search = ref('');

    watch( search, value => {
        Inertia.get('')
    })


</script>   