<template>
    <Head title="Create User" />

    
    <main class="grid place-items-center">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto mt-8 border">
            <h1 class="text-3xl mb-6"> Login </h1>
            

            <form @submit.prevent="submit">
                <div>
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700" />
                        Email
                    <input v-model="form.email" class="border border-gray-400 p-2 w-full"
                        id="email"
                        name="email"
                        type="email"
                        required
                    >
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>


                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700" />
                        Password
                    <input v-model="form.password" class="border border-gray-400 p-2 w-full"
                        id="password"
                        name="password"
                        type="password"
                        required
                    >
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>


                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>



<script setup>
    import { useForm } from "@inertiajs/inertia-vue3";

    let form = useForm({
        email: '',
        password: '',
    });

    let submit = () => {
        form.post('/login')
    };
</script>