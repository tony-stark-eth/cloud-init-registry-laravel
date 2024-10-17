<script lang="ts">
    import Navbar from "../Shared/Navbar.svelte";

    const name: string = 'hello world';
    import { page } from '@inertiajs/svelte';

    console.log($page.props.auth)
</script>

<div class="grid">
    <Navbar />

    <div class="flex p-6">
    {name}
    </div>
</div>
