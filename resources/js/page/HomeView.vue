<template>
    <div class="wrapper mx-auto">
        <header-component></header-component>
        <div class="grid grid-cols-5 gap-x-2 bg-slate-100 pt-4">
            <col4-component>
                <list-topic :topic="topics"></list-topic>
            </col4-component>
            <col1-component>col1</col1-component>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import HeaderComponent from "../components/HeaderComponent.vue";
import Col4Component from "../components/Col4Component.vue";
import Col1Component from "../components/Col1Component.vue";
import ListTopic from "../components/ListTopic.vue";
export default {
    name: "HomeView",
    components: { HeaderComponent, Col4Component, Col1Component, ListTopic },
    data() {
        return {
            topics: [],
        };
    },
    mounted() {
        this.getdata();
    },
    methods: {
        async getdata() {
            let token = window.localStorage.getItem("token");
            const config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .get("/api/home", config)
                .then((response) => {
                    this.topics = response.data.topics;
                    console.log(response.data);
                })
                .catch((e) => {
                    this.error = e.response.data.error;
                });
        },
    },
};
</script>
<style></style>
