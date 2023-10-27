<template>
    <article class="card">
        <b>{{ news.title }}</b>
        <span>
            {{ news.description }}
        </span>
        <div class="card-footer">
            <button @click="editNews">Acessar</button>
        </div>
    </article>
</template>
<script>
import { mapMutations } from 'vuex';
export default {
    props: {
        news: {
            type: Object,
            required: true
        }
    },
    methods: {
        ...mapMutations('news-list', ['setDetailNews', 'setCrudVisible']),
        editNews() {
            this.setDetailNews(this.news);
            this.setCrudVisible(true);
        }
    }
}
</script>