<template>
    <section class="card-list">
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
        ...mapGetters("card-list", ["newsList"])
    },
    methods: {
        ...mapMutations("card-list", ["setNewsList"])
    },
    created() {
        this.setNewsList(this.list);
    }
}
</script>