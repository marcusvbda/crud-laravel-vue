<template>
    <header>
        <nav>
            <section class="logo">Logo</section>
            <section class="menu">
                <a href="#" @click.prevent="setCrudVisible(true)">Cadastrar notícias</a>
                <a href="/">Exibir notícias</a>
            </section>
            <section class="filter">
                <div class="input-filter">
                    <input v-model="filterValue" />
                </div>
            </section>
        </nav>
    </header>
</template>
<script>
import "./styles.scss";
import { mapMutations } from "vuex";
export default {
    data() {
        return {
            filterValue: (new URL(window.location.href)).searchParams.get('filter') || '',
            timeout: null
        }
    },
    watch: {
        filterValue(val) {
            clearInterval(this.timeout);
            this.timeout = setTimeout(() => {
                const url = new URL(window.location.href);
                url.searchParams.set('filter', val);
                url.searchParams.set('page', 1);
                window.location.href = url.toString();
            }, 1000);
        }
    },
    methods: {
        ...mapMutations('news-list', ['setCrudVisible'])
    }
}
</script>