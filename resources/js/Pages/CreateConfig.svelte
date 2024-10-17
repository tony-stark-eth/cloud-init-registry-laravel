<script lang="ts">
    import { useForm } from '@inertiajs/svelte';
    import CodeMirror from "svelte-codemirror-editor";
    import { yaml } from "@codemirror/lang-yaml";

    let form = useForm({
        name: null,
        config: '',
        tags: null,
        version: null,
        license: null,
        cloud_init_version: null,
    })

    console.log($form.config);

    function submit() {
        $form.post('/config/create')
    }
</script>

<form on:submit|preventDefault={submit}>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Name</span>
        </div>

        <input type="text" class="input input-bordered" bind:value={$form.name} />
        {#if $form.errors.name}
            <div class="form-error">{$form.errors.name}</div>
        {/if}
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Tags</span>
        </div>

        <input type="text" class="input input-bordered" bind:value={$form.tags} />
        {#if $form.errors.tags}
            <div class="form-error">{$form.errors.tags}</div>
        {/if}
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Version</span>
        </div>

        <input type="text" class="input input-bordered" bind:value={$form.version} />
        {#if $form.errors.version}
            <div class="form-error">{$form.errors.version}</div>
        {/if}
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">License</span>
        </div>

        <input type="text" class="input input-bordered" bind:value={$form.license} />
        {#if $form.errors.license}
            <div class="form-error">{$form.errors.license}</div>
        {/if}
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Cloud Init Version</span>
        </div>

        <input type="text" class="input input-bordered" bind:value={$form.cloud_init_version} />
        {#if $form.errors.cloud_init_version}
            <div class="form-error">{$form.errors.cloud_init_version}</div>
        {/if}
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Cloud Init Config</span>
        </div>

        {#if $form.errors.config}
            <div class="form-error">{$form.errors.config}</div>
        {/if}
        <CodeMirror bind:value={$form.config} lang={yaml()} />
    </label>
</form>
