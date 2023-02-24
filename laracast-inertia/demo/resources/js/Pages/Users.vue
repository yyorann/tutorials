<template>
<div>
    <h1>Users</h1>
    <Nav/>

    <div style="margin-top: 900px">
        <p>The current time is: {{ time }}</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>Update Time</Link>
    </div>

</div>
</template>

<script>
    import Nav from '../Shared/Nav.vue';
    import { Link } from '@inertiajs/vue3';

    export default {
        components: { Nav, Link },

        props: {
            time: String,
        }
    }
</script>