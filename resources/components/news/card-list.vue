<template>
    <section class="card-list">
        <article class="card" v-for="(n, i) in news" :key="i">
            <b>lorem ipsum</b>
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut facilisis dui. Aenean ut ultricies
                nunc. Donec eu semper velit. Curabitur quis gravida nulla. Praesent nec sapien risus. Aliquam
                porttitor
                efficitur nisl vitae fringilla. Sed iaculis, dui id bibendum vestibulum, quam ante maximus nulla,
                vel
                maximus risus odio sit amet elit. Quisque massa enim, rhoncus vel fringilla eu, rhoncus vel tellus.
            </span>
            <div class="card-footer">
                <button>Acessar</button>
            </div>
        </article>
    </section>
</template>
<script>
import "./styles.scss";
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters("card-list", ["news"])
    },
}
</script>