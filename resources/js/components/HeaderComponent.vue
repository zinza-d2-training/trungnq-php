<template>
    <section class="mx-auto flex flex-row items-center justify-between header">
        <div class="flex flex-row place-content-between items-center">
            <div class="ml-5">
                <ul class="flex">
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >Dashboard</a
                        >
                    </li>

                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >User</a
                        >
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >Company</a
                        >
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >Topic</a
                        >
                    </li>
                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >Tag</a
                        >
                    </li>

                    <li class="mr-6">
                        <a class="text-white font-bold hover:text-black" href=""
                            >Post</a
                        >
                    </li>
                </ul>
            </div>
        </div>
            <div class="div">
                <ul class="flex text-white mr-6">
                    <li class="mr-6">Account</li>
                    <li class="mr-6">
                        <span class="cursor-pointer hover:text-blue-400" @click="logout">Logout</span>
                    </li>
                </ul>
            </div>
    </section>
</template>
<script>
import axios from 'axios';
import router from '../router';
export default {
    methods:{
        logout(){
            let token = window.localStorage.getItem("token");
            const config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .get("/api/logout", config)
                .then((response) => {
                    localStorage.removeItem('token');
                    router.push({name:'login'});
                })
                .catch((e) => {
                    this.error = e.response.data.error;
                });
        },
    }
};
</script>

<style lang="scss" scoped>
    .header{
        height: 50px;
        max-width: 1440px;
        background-image: linear-gradient(to right, #D51E36, #273494);
    }
</style>></style>