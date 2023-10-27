<template>
    <section v-if="isLoading" class="loading-modal">
        <div class="card">Aguarde ...</div>
    </section>
</template>
<script>
import "./styles.scss";
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters("news-list", ["isLoading"]),
    },
}
</script>