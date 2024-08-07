<script setup>
import RDialog from "@/Components/Base/RDialog.vue";
import {useUrlWatcher} from "@/Composables/useUrlWatcher.js";
import {ShareNetwork} from "vue3-social-sharing";

const {title, description} = defineProps({
    title: String,
    description: String
})

const {url} = useUrlWatcher();

const networks = [
    {
        network: 'facebook',
        name: 'Facebook',
        icon: 'fab fah fa-lg fa-facebook-f',
        color: '#1877f2',
    },
    {
        network: 'odnoklassniki',
        name: 'Odnoklassniki',
        icon: 'fab fah fa-lg fa-odnoklassniki',
        color: '#ed812b',
    },
    {
        network: 'twitter',
        name: 'Twitter',
        icon: 'fab fah fa-lg fa-twitter',
        color: '#1da1f2',
    },
    {
        network: 'telegram',
        name: 'Telegram',
        icon: 'fab fah fa-lg fa-telegram-plane',
        color: '#0088cc',
    },
    {
        network: 'vk',
        name: 'Vk',
        icon: 'fab fah fa-lg fa-vk',
        color: '#4a76a8'
    },
    {
        network: 'whatsapp',
        name: 'Whatsapp',
        icon: 'fab fah fa-lg fa-whatsapp',
        color: '#25d366',
    },
    {
        network: 'x',
        name: 'X',
        icon: 'fab fah fa-lg fa-twitter',
        color: '#000000',
    },
    {
        network: 'email',
        name: 'Email',
        icon: 'far fah fa-lg fa-envelope',
        color: '#333333',
    },
]

const sharingInfo = {
    title: title,
    url: url.value,
    description: description,
    twitterUser: 'POTUS',
};

</script>
<template>
    <RDialog title="Поделиться" :width="500">
        <template v-slot:trigger>
            <button type="button" class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                <svg class="h-4" fill="none" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M16.5 21.75a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M16.5 8.25a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M13.978 6.871 8.52 10.377"></path>
                    <path d="m8.521 13.621 5.457 3.506"></path>
                </svg>
                Поделиться
            </button>
        </template>
        <template v-slot:body>
            <div class="social-list">
                <share-network
                    v-for="network in networks"
                    :key="network.network"
                    v-slot="{ share }"
                    :network="network.network"
                    :title="sharingInfo.title"
                    :url="sharingInfo.url"
                    :twitterUser="sharingInfo.twitterUser"
                >
                    <div
                        class="social-network rounded !w-[3rem] h-[3rem] !p-0 flex items-center justify-center group"
                        @click="share"
                        :style="{ backgroundColor: network.color }"
                    >
                        <i :class="network.icon" class="!p-0 !bg-none group-hover:text-2xl transition"></i>
                    </div>
                </share-network>
            </div>
        </template>
    </RDialog>
</template>

<style scoped>
* {
    box-sizing: border-box;
}

.logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
    transition: filter 300ms;
}

.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
}

.social-list {
    max-width: 900px;
    margin: 20px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
}

.social-network {
    display: flex;
    align-items: center;
    color: white;
    cursor: pointer;
}
</style>
