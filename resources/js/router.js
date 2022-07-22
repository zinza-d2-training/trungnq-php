import Vue from "vue";
import VueRouter from "vue-router";
import LoginView from "./page/LoginView.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/login",
        name: "login",
        component: LoginView,
    },
    {
        path: "/logout",
        name: "logout",
        component: LoginView,
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
        if (token != null) {
            next();
        } else {
            next({ name: "login" });
        }
    }
    next();
});

export default router;
