<script setup>
    import AuthUser from "@/Components/AuthUserComponent.vue";
    import MenuList from "@/Components/Navigation/GuestMenuListComponent.vue";
    import Search from "@/Components/SearchComponent.vue";


    import HeaderComponent from "@/Components/Components/Guest/Header/HeaderComponent.vue";
   
import AuthUser from "@/Components/AuthUserComponent.vue";
import MenuList from "@/Components/Navigation/GuestMenuListComponent.vue";
import Search from "@/Components/SearchComponent.vue";
import Footer from "@/Components/Layouts/Guest/FooterComponent.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

    import {usePage} from "@inertiajs/vue3";
    import {computed} from "vue";

    const page = usePage();
    const user = computed(() => page.props.auth.user);
    const menu = computed(() => page.props.menu);
</script>
<template>
    <div class="min-h-screen flex flex-col">
    	<HeaderComponent />
		<main class="flex-1 bg-stone-50">
            <slot />
			<!-- <CalcV2 /> -->
		</main>
    	<FooterComponent />
  	</div>


    <!-- <nav>
        <MenuList
            :menu="menu.data"
        />
    </nav>

    <Search />

    <main>
        <AuthUser
            :user="user"
        />

        <slot/>
    </main>

    <Footer />
</template>
