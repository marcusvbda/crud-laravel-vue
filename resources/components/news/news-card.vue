<template>
    <article class="card">
        <b>{{ news.title }}</b>
        <span>
            {{ news.description }}
        </span>
        <div class="card-footer">
            <button>Acessar</button>
        </div>
    </article>
</template>
<script>
export default {
    props: {
        news: {
            type: Object,
            required: true
        }
    }
}
</script>