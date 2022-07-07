<template>
    <div class="table-data mb-2.5">
        <div class="gird gird-cols-12 bg-slate-400 py-2 px-6">All topic</div>
        <div class="grid grid-cols-12 gap-4 h-20 border-b-2 border-x-2"  v-for="item in topic" :key="item.id">
            <div class="col-span-7 flex items-center ml-9">
                <a href="" class="font-bold">{{item.title}}</a>
            </div>
            <div class="col-span-5 flex flex-row items-center">
                <div class="text-center pr-5">
                    <p class="text-gray-400">Post</p>
                    <p class="font-bold text-base">{{item.post_count}}</p>
                </div>
                <div class="text-center mr-4">
                    <p class="text-gray-400">Commnents</p>
                    <p class="font-bold text-base">{{item.comments_count}}</p>
                </div>
                <div class="flex flex-row" v-if="hasPost(item)">
                    <div class="mr-4">
                        <img
                            :src="getImageUrl(item)" 
                            data-tooltip-target="tooltip-author"
                            alt=""
                            class="w-10 rounded-full"
                        />
                    </div>
                    <div
                        id="tooltip-author"
                        role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
                        data-popper-placement="top"
                        style="
                            position: absolute;
                            inset: auto auto 0px 0px;
                            margin: 0px;
                            transform: translate(502px, -179px);
                        "
                    >
                        {{(item.post[0]) ? item.post[0].user.name : ""}}
                        <div
                            class="tooltip-arrow"
                            data-popper-arrow=""
                            style="
                                position: absolute;
                                left: 0px;
                                transform: translate(59px, 0px);
                            "
                        ></div>
                    </div>
                </div>
                <div class="truncate" v-if="hasPost(item)">
                    <a href="" class="truncate">{{ item.post[0].title }}</a>
                    <p class="text-sm">{{item.post[0].created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    props: { topic: Array },
    methods: {
        getImageUrl(item){
            return "/storage/images/avatars/" + item.post[0].user.avatar;
        },
        hasPost(item){
            if(item.post[0]) {
                return true;
            } else {
                return false;
            }
        }
    },
};
</script>

<style></style>
