import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "./page/HomeView.vue";
import UserEdit from "./page/UserEdit.vue";
import LoginView from "./page/LoginView.vue";
import axios from "axios";

Vue.use(VueRouter);

const routes = [
    { path: "/login", name: "login", component: LoginView },
    {
        path: "/",
        name: "home",
        component: HomeView,
        meta: {
            auth: "true",
            role: "admin"
        },
    },
    {
        path: "/account",
        name: "account",
        component: UserEdit,
        meta: { auth: "true" },
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.auth == "true") {
        let token = window.localStorage.getItem("token");
        if (token == null) {
            next({ name: "login" });
        } else {
            const config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .get("/api/checkToken", config)
                .then(function (response) {
                    next();
                })
                .catch(() => {
                    next({ name: "login" });
                });
        }
        next();
    }
    if(to.meta.role = "admin"){

    }
    next();
});

export default router;
