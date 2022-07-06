<template>
    <div class="home">
        <h1 class="text-center text-2xl">HomePage</h1>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "HomeView",
    components: {},
    mounted() {
        this.checkLogin();
    },
    methods: {
        checkLogin() {
            let token = window.localStorage.getItem("token");
            if (token == null) {
                this.$router.push({ name: "login" });
            }
            const config = {
                headers: {
                    Authorization:
                        "Bearer " +token,
                },
            };
            axios
                .get("http://127.0.0.1:8000/api/checkToken", config)
                .then(function (response) {
                    console.log(response);
                })
                .catch(() => {
                    this.$router.push({ name: "login" });
                });
        },
    },
};
</script>
