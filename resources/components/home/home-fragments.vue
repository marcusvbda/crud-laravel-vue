<template>
    <div>
        <header-nav></header-nav>
        <main>
            <loading-modal></loading-modal>
            <crud-modal></crud-modal>
            <div class="pagination">
                <slot />
            </div>
            <news-list :list='list' />
        </main>
        <footer>Desenvolvido por Vinicius Bassalobre</footer>
    </div>
</template>
<script>
export default {
    props: {
        list: {
            type: Object,
            required: true
        }
    }
}
</script>