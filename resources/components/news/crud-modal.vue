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
                    <textarea rows="8" v-model="form.content" required />
                </div>
                <div class="card-footer">
                    <button type="button" class="danger" @click="destroy" v-if="detailNews.id">Excluir</button>
                    <button type="submit">Salvar</button>
                </div>
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
    watch: {
        crudVisible(val) {
            if (!val) {
                return this.refresh()
            }
            if (this.detailNews?.id) {
                this.form = {
                    title: this.detailNews.title,
                    description: this.detailNews.description,
                    content: this.detailNews.content
                }
            }
        }
    },
    computed: {
        ...mapGetters("news-list", ["crudVisible", "detailNews"]),
        crudTitle() {
            if (this.detailNews?.id) {
                return "Editar notícia"
            }
            return "Cadastro de notícias"
        }
    },
    methods: {
        ...mapMutations("news-list", ["setCrudVisible", "setDetailNews", "setIsLoading"]),
        ...mapActions("news-list", ["upsertNews", "destroyNews"]),
        refresh() {
            this.form = {
                title: "",
                description: "",
                content: ""
            }
            this.setDetailNews({});
        },
        clickedOnModal() {
            this.refresh();
            this.setCrudVisible(false);
        },
        submit() {
            const resp = confirm("Deseja realmente salvar esta notícia?")
            if (resp) {
                this.upsertNews({ ...this.form, id: this.detailNews.id })
            }
        },
        destroy() {
            const resp = confirm("Deseja realmente excluir esta notícia?")
            if (resp) {
                this.destroyNews(this.detailNews.id)
            }
        }
    }
}
</script>