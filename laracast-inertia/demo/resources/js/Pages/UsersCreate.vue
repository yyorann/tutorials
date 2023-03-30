<template>
    <Head title="Create User" />

    <h1 class="text-3xl"> Create New User </h1>

    <form method="POST" action="/" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700"/>
                Name
            <input v-model=" V_MODEL " class="border border-gray-400 p-2 w-full"
                id="name"
                name="name"
                type="name"
                required
            />
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700"/>
                Email
            <input class="border border-gray-400 p-2 w-full"
                required
                id = "email"
                name = "email"
                type = "email"
            />
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700"/>
                Password
            <input class = "border border-gray-400 p-2 w-full"
                required
                id = "password"
                name = "password"
                type = "password"
            />
        </div>
        
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
</template>


<script setup>
import { reactive } from "vue";

    defineProps({

    });
    let form = reactive({
        name: '',
        email: '',
        password: ''
    });
</script>


