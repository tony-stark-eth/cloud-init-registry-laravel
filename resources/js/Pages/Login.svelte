<script lang="ts">
    import { useForm } from '@inertiajs/svelte'

    let form = useForm({
        email: null,
        password: null,
        remember: false,
    })

    function submit() {
        $form.post('/auth/login')
    }
</script>

<div class="flex min-h-screen items-center justify-center bg-base-100">
<div class="flex flex-col gap-4 rounded-box bg-base-200 p-6 max-w-xl">
    <h1 class="text-3xl font-bold self-center">Log in</h1>

    <a class="btn btn-neutral" href="/auth/github">
        <i class="fa-brands fa-google text-primary"></i>
        Log in with Github
    </a>

    <div class="divider">OR</div>

    <form on:submit|preventDefault={submit}>
        <label class="form-control">
            <div class="label">
                <span class="label-text">Email</span>
            </div>

            <input type="text" class="input input-bordered" bind:value={$form.email} />
            {#if $form.errors.email}
                <div class="form-error">{$form.errors.email}</div>
            {/if}
        </label>

        <label class="form-control">
            <div class="label">
                <span class="label-text">Password</span>
                <a class="label-text link link-accent" href="/auth/reset-password">Forgot password?</a>
            </div>

            <input type="password" class="input input-bordered" bind:value={$form.password} />
            {#if $form.errors.password}
                <div class="form-error">{$form.errors.password}</div>
            {/if}
        </label>

        <div class="form-control">
            <label class="cursor-pointer label self-start gap-2">
                <input type="checkbox" class="checkbox" bind:checked={$form.remember} />
                <span class="label-text">Remember me</span>
            </label>
        </div>

        <div class="form-control">
            <button type="submit" disabled={$form.processing} class="btn btn-primary self-end">Log in</button>
        </div>
    </form>
</div>
</div>
