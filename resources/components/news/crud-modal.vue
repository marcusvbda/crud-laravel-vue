<template>
    <section v-if="crudVisible" class="crud-modal" @click="clickedOnModal">
        <div class="card" @click="evt => evt.stopPropagation()">
            <h5>{{ crudTitle }}</h5>
            <form @submit.prevent="submit">
                <div>
                    <label>Título</label>
                    <input type="text" v-model="form.title" required />
                </div>
                <div>
                    <label>Descrição</label>
                    <textarea rows="3" v-model="form.description" required />
                </div>
                <div>
                    <label>Conteudo</label>
                    <textarea rows="5" v-model="form.content" required />
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</template>
<script>
import "./styles.scss";
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
    data() {
        return {
            form: {
                title: "",
                description: "",
                content: ""
            }
        }
    },
    computed: {
        ...mapGetters("news-list", ["crudVisible"]),
        crudTitle() {
            return "Cadastro de notícias"
        }
    },
    methods: {
        ...mapMutations("news-list", ["setCrudVisible", "setIsLoading"]),
        ...mapActions("news-list", ["createNews"]),
        clickedOnModal() {
            this.setCrudVisible(false);
        },
        submit() {
            this.createNews(this.form)
        }
    }
}
</script>