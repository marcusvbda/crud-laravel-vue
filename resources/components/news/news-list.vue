<template>
    <section class="news-list">
        <news-card v-for="(n, i) in newsList.data" :news="n" :key="i" />
    </section>
</template>
<script>
import "./styles.scss";
import { mapGetters, mapMutations } from "vuex";

export default {
    props: {
        list: {
            type: Object,
            required: true
        }
    },
    computed: {
        ...mapGetters("news-list", ["newsList"])
    },
    methods: {
        ...mapMutations("news-list", ["setNewsList"])
    },
    created() {
        this.setNewsList(this.list);
    }
}
</script>