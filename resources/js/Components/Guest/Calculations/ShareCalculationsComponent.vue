<script setup>
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import RDialog from "@/Components/Base/RDialog.vue";
    import {useUrlWatcher} from "@/Composables/useUrlWatcher.js";
    import useClipboard from 'vue-clipboard3'
    import {ShareNetwork} from "vue3-social-sharing";
    // import { SwitchRoot, SwitchThumb } from 'radix-vue'
    // import { ref } from 'vue'


    const {title, description} = defineProps({
        title: String,
        description: String
    })

    const { toClipboard } = useClipboard()

    // const switchState = ref(false)

    const {url} = useUrlWatcher();

    const copy = async () => {
        try {
            await toClipboard(url.value)
            console.log('Copied to clipboard')
        } catch (e) {
            console.error(e)
        }
    }

    const networks = [
        {
            network: 'facebook',
            name: 'Facebook',
            icon: 'fab fah fa-lg fa-facebook-f',
            color: '#1877f2',
        },
        {
            network: 'email',
            name: 'Email',
            icon: 'far fah fa-lg fa-envelope',
            color: '#333333',
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
        {network: 'vk', name: 'Vk', icon: 'fab fah fa-lg fa-vk', color: '#4a76a8'},
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
    ]

    const sharingInfo = {
        title: title,
        url: url.value,
        description: description,
        twitterUser: 'POTUS',
    };

</script>
<template>

    <button @click="copy">test copy btn </button>


    <RDialog title="Поделиться" :width="420">
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
            <div class="flex items-center gap-2">
                <FTextInput v-model="url" class="w-full" />


                <button @click="copy">test copy btn not working</button>

<!--                <button type="button" @click.prevent="copy"-->
<!--                    class="py-3 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    Копировать-->
<!--                </button>-->
            </div>



            <div class="social-list">
                <share-network
                    v-for="network in networks"
                    :key="network.network"
                    v-slot="{ share }"
                    :network="network.network"
                    :title="sharingInfo.title"
                    :url="sharingInfo.url"
                    :description="sharingInfo.description"
                    :quote="sharingInfo.quote"
                    :hashtags="sharingInfo.hashtags"
                    :twitterUser="sharingInfo.twitterUser"
                    :media="sharingInfo.media"
                >
                    <div
                        class="social-network"
                        @click="share"
                        :style="{ backgroundColor: network.color }"
                    >
                        <i :class="network.icon"></i>
                        <span>{{ network.name }}</span>
                    </div>
                </share-network>
            </div>



<!--            <div class="flex gap-2 items-center mt-2">-->
<!--                <SwitchRoot-->
<!--                    id="airplane-mode"-->
<!--                    v-model:checked="switchState"-->
<!--                    class="w-[34px] h-[18px] focus-within:!outline-none focus-within:outline-black flex bg-black/30 shadow-sm rounded-full relative data-[state=checked]:bg-primary-500 cursor-default"-->
<!--                >-->
<!--                    <SwitchThumb-->
<!--                        class="block w-[10px] h-[10px] my-auto bg-white shadow-sm rounded-full transition-transform duration-100 translate-x-1 will-change-transform data-[state=checked]:translate-x-[18px] data-[state=checked]:h-[14px] data-[state=checked]:w-[14px]"-->
<!--                    />-->
<!--                </SwitchRoot>-->
<!--                <label class="text-[15px] leading-none pr-[15px] select-none" for="airplane-mode">-->
<!--                    {{ switchState ? 'Поделиться расчетом' : 'Не делиться расчетом' }}-->
<!--                </label>-->
<!--            </div>-->
<!--            <div class="flex items-center justify-start gap-2 mt-6">-->
<!--                <a target="_blank" :href="'https://www.facebook.com/sharer/sharer.php?u=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>-->
<!--                </a>-->
<!--                <a target="_blank" :href="'https://twitter.com/share?url=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>-->
<!--                </a>-->
<!--                <a target="_blank" :href="'http://vk.com/share.php?url=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M21.579 6.855c.14-.465 0-.806-.662-.806h-2.193c-.558 0-.813.295-.953.619 0 0-1.115 2.719-2.695 4.482-.51.513-.743.675-1.021.675-.139 0-.341-.162-.341-.627V6.855c0-.558-.161-.806-.626-.806H9.642c-.348 0-.558.258-.558.504 0 .528.79.65.871 2.138v3.228c0 .707-.127.836-.407.836-.743 0-2.551-2.729-3.624-5.853-.209-.607-.42-.852-.98-.852H2.752c-.627 0-.752.295-.752.619 0 .582.743 3.462 3.461 7.271 1.812 2.601 4.363 4.011 6.687 4.011 1.393 0 1.565-.313 1.565-.853v-1.966c0-.626.133-.752.574-.752.324 0 .882.164 2.183 1.417 1.486 1.486 1.732 2.153 2.567 2.153h2.192c.626 0 .939-.313.759-.931-.197-.615-.907-1.51-1.849-2.569-.512-.604-1.277-1.254-1.51-1.579-.325-.419-.231-.604 0-.976.001.001 2.672-3.761 2.95-5.04z"></path></svg>-->
<!--                </a>-->
<!--                &lt;!&ndash; ODNOKLASNIKI <a target="_blank" :href="'' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" viewBox="0 0 512 512" xml:space="preserve">-->
<!--                        <g id="7935ec95c421cee6d86eb22ecd128789">-->
<!--                        <path style="display: inline;" d="M256.018,259.156c71.423,0,129.31-57.899,129.31-129.334C385.327,58.387,327.44,0.5,256.018,0.5   c-71.448,0-129.359,57.887-129.359,129.322C126.658,201.257,184.57,259.156,256.018,259.156z M256.018,66.196   c35.131,0,63.612,28.482,63.612,63.625c0,35.144-28.481,63.625-63.612,63.625c-35.168,0-63.638-28.481-63.638-63.625   C192.38,94.678,220.849,66.196,256.018,66.196z M405.075,274.938c-7.285-14.671-27.508-26.872-54.394-5.701   c-36.341,28.619-94.664,28.619-94.664,28.619s-58.361,0-94.702-28.619c-26.873-21.171-47.083-8.97-54.381,5.701   c-12.75,25.563,1.634,37.926,34.096,58.761c27.721,17.803,65.821,24.452,90.411,26.935l-20.535,20.535   c-28.918,28.905-56.826,56.838-76.201,76.213c-11.59,11.577-11.59,30.354,0,41.931l3.48,3.506c11.59,11.577,30.354,11.577,41.943,0   l76.201-76.214c28.943,28.919,56.851,56.839,76.225,76.214c11.59,11.577,30.354,11.577,41.943,0l3.48-3.506   c11.59-11.59,11.59-30.354,0-41.943l-76.201-76.2l-20.584-20.598c24.614-2.545,62.29-9.22,89.786-26.872   C403.441,312.863,417.801,300.5,405.075,274.938z"></path>-->
<!--                        </g>-->
<!--                    </svg>-->
<!--                </a> &ndash;&gt;-->
<!--                <a target="_blank" :href="'tg://msg_url?url=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path></svg>-->
<!--                </a>-->
<!--                <a target="_blank" :href="'https://wa.me/?text=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg>-->
<!--                </a>-->
<!--                <a target="_blank" :href="'viber://forward?text=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1" viewBox="0 0 226.978 226.978" xml:space="preserve">-->
<!--                        <g>-->
<!--                            <path d="M199.569,25.393C181.627,7.803,152.62-0.72,113.339,0.048C73.731,0.827,47.255,7.779,30.018,21.927   C13.352,35.605,5.59,55.62,5.59,84.915v29.898c0,34.584,18.532,72.605,53.951,78.358c4.089,0.669,7.941-2.111,8.605-6.201   c0.664-4.088-2.112-7.941-6.201-8.605c-26.861-4.363-41.355-36-41.355-63.552V84.915c0-42.006,15.565-68.347,93.043-69.871   c35.125-0.696,60.477,6.395,75.433,21.059c11.655,11.429,17.321,27.395,17.321,48.812v29.898c0,45.274-20.321,65.243-72.441,71.123   H96.988c-1.989,0-3.897,0.79-5.303,2.197l-26.041,26.041c-2.929,2.929-2.929,7.678,0,10.607c1.464,1.464,3.384,2.197,5.303,2.197   c1.919,0,3.839-0.732,5.303-2.197l23.845-23.845h34.27c0.276,0,0.553-0.015,0.828-0.046c29.828-3.313,50.254-11.076,64.279-24.432   c14.747-14.044,21.916-34.208,21.916-61.646V84.915C221.388,59.616,214.047,39.59,199.569,25.393z"/>-->
<!--                            <path d="M118.17,48.988c0.001,0,0.001,0,0.003,0c12.085,0,23.447,4.707,31.993,13.253c8.547,8.547,13.254,19.911,13.253,31.998   c0,4.142,3.357,7.5,7.499,7.5c0.001,0,0.001,0,0.001,0c4.142,0,7.5-3.357,7.5-7.499c0.001-16.094-6.266-31.225-17.646-42.605   c-11.379-11.38-26.507-17.646-42.6-17.646c-0.001,0-0.004,0-0.005,0c-4.142,0-7.499,3.358-7.499,7.5   C110.67,45.63,114.028,48.988,118.17,48.988z"/>-->
<!--                            <path d="M118.168,75.362c10.408,0.002,18.877,8.47,18.878,18.877c0.001,4.142,3.358,7.5,7.501,7.499c4.143,0,7.5-3.359,7.499-7.501   c-0.003-18.676-15.199-33.872-33.876-33.875h-0.001c-4.142,0-7.499,3.357-7.5,7.499C110.669,72.003,114.026,75.362,118.168,75.362z   "/>-->
<!--                            <path d="M84.538,88.213c-3.419,2.338-4.296,7.005-1.959,10.424c2.337,3.419,7.005,4.295,10.424,1.958   c2.689-1.838,8.987-6.144,8.545-14.752c-0.28-5.152-4.927-12.508-8.776-17.772C87.142,60.369,82.29,55.73,78.381,54.292   c-3.65-1.359-7.467-1.388-11.353-0.084c-8.049,2.712-13.893,7.613-16.899,14.173c-2.927,6.386-2.862,13.725,0.189,21.228   c7.206,17.678,17.294,33.155,30.051,46.067c12.845,12.689,28.321,22.777,46.006,29.987c3.827,1.557,7.613,2.336,11.252,2.336   c3.49,0,6.845-0.716,9.971-2.149c6.56-3.007,11.46-8.85,14.175-16.909c1.3-3.877,1.271-7.692-0.077-11.317   c-1.448-3.937-6.088-8.788-13.789-14.418c-5.265-3.849-12.621-8.496-17.793-8.777c-8.59-0.432-12.892,5.855-14.73,8.544   c-2.338,3.419-1.463,8.086,1.956,10.425c3.42,2.339,8.086,1.463,10.425-1.956c0.816-1.193,1.282-1.735,1.549-1.972   c4.21,1.349,16.215,10.169,18.376,13.549c0.053,0.216,0.065,0.545-0.135,1.144c-0.946,2.809-2.791,6.486-6.206,8.052   c-3.199,1.464-6.834,0.566-9.316-0.443c-15.847-6.461-29.682-15.466-41.058-26.703c-11.301-11.439-20.306-25.274-26.763-41.115   c-1.012-2.488-1.911-6.125-0.446-9.321c1.565-3.415,5.243-5.261,8.043-6.205c0.598-0.2,0.927-0.189,1.155-0.134   c3.381,2.165,12.196,14.163,13.546,18.374C86.272,86.931,85.731,87.398,84.538,88.213z"/>-->
<!--                        </g>-->
<!--                    </svg>-->
<!--                </a>-->
<!--                <a target="_blank" :href="'mailto:?body=' + url"-->
<!--                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>-->
<!--                </a>-->
<!--            </div>-->
            <!-- {{ url }} -->
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
    i {
        padding: 1rem;
        background-color: rgba(0, 0, 0, 0.3);
    }
    span {
        font-weight: 700;
        padding: 0.7rem;
        text-shadow: 2px 1px 2px rgb(0 0 0 / 80%);
    }
}
</style>
