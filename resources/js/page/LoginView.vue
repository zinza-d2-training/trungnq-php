<template>
    <div
        class="login font-bold h-full flex justify-center items-center bg-slate-400 mx-auto min-h-screen wrapper"
    >
        <div class="w-1/3 py-6 px-4 bg-white rounded-2xl flex flex-col">
            <div
                class="flex item-center items-center w-full px-4"
                style="height: 72px; border-bottom: 2px solid #f5f5f5"
            >
                <div class="text-base font-bold">Login</div>
            </div>
            <div class="logo mx-auto mt-3">
                <img src="images/image6.svg" alt="" />
            </div>
            <span class="text-red-500 text-center py-3" v-if="error">{{
                error
            }}</span>

            <ValidationObserver v-slot="{ handleSubmit }">
                <form action="" @submit.prevent="handleSubmit(submitLogin)">
                    <ValidationProvider
                        name="email"
                        rules="required|email"
                        v-slot="v"
                    >
                        <div class="mb-4">
                            <LabelComp msg="Email:"></LabelComp>
                            <InputText
                                v-model="email"
                                :type="type.email"
                            ></InputText>
                            <span>{{ v.errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider
                        name="password"
                        rules="required|min:6"
                        v-slot="v"
                    >
                        <div class="mb-4">
                            <LabelComp msg="Password:"></LabelComp>
                            <InputText
                                v-model="password"
                                :type="type.password"
                            ></InputText>
                            <span>{{ v.errors[0] }}</span>
                        </div>
                    </ValidationProvider>
                    <div class="mr-6 my-4 text-right">
                        <a href="">Forgot password?</a>
                    </div>
                    <div class="mb-4">
                        <ButtonSubmit @click="submitLogin">Login</ButtonSubmit>
                    </div>
                </form>
            </ValidationObserver>

            <div class="mb-4" style="margin-top: -13px; margin-left: 45%">
                <span class="px-2 bg-white">Or</span>
            </div>
            <OtherLoginComponent></OtherLoginComponent>
        </div>
    </div>
</template>
<script>
import LabelComp from "../components/LabelComponent.vue";
import ButtonSubmit from "../components/ButtonComponent.vue";
import InputText from "../components/InputComponent.vue";
import axios from "axios";
import OtherLoginComponent from "../components/OtherLoginComponent.vue";

export default {
    name: "HomeView",
    data() {
        return {
            email: "",
            password: "",
            type: {
                text: "text",
                password: "password",
                number: "number",
                email: "email",
            },
            error: "",
        };
    },
    components: {
    LabelComp,
    ButtonSubmit,
    InputText,
    OtherLoginComponent
},
    methods: {
        submitLogin() {
            axios
                .post(`http://127.0.0.1:8000/api/login`, {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    localStorage.setItem("token", response.data.token);
                    this.$router.push({ name: "home" });
                })
                .catch((e) => {
                    this.error = e.response.data.error;
                });
        },
    },
};
</script>
