<script lang="ts">
    import { page } from '@inertiajs/svelte';

    const user: {name: string} | null = $page.props.auth.user;
</script>

<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">Cloud Init Registry</a>
    </div>
    <div class="flex-none gap-2">
        <div class="form-control">
            <input type="text" placeholder="Search configs" class="input input-bordered w-24 md:w-auto"/>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/>
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                {#if user !== null}
                    <li><a href="/auth/logout">Logout</a></li>
                {:else}
                    <li><a href="/auth/login">Login</a></li>
                {/if}
            </ul>
        </div>
    </div>
</div>
