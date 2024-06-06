<script setup>
    import HeaderComponent from "@/Components/Guest/Header/HeaderComponent.vue";
    import FooterComponent from "@/Components/Guest/Footer/FooterComponent.vue";

    import LoginComponent from "@/Components/Guest/Auth/LoginComponent.vue";
    import RegisterComponent from "@/Components/Guest/Auth/RegisterComponent.vue";
    import ForgotPasswordComponent from "@/Components/Guest/Auth/ForgotPasswordComponent.vue";

    import SupportComponent from "@/Components/Guest/Support/SupportComponent.vue";

    import {usePage} from "@inertiajs/vue3";
    import {computed, onMounted} from "vue";

    const page = usePage();
    const user = computed(() => page.props.auth.user);
    const menu = computed(() => page.props.menu);

</script>
<template>
    <div class="min-h-screen flex flex-col">
    	<HeaderComponent />
		<main class="flex-1 bg-stone-50">
            <slot />
		</main>
    	<FooterComponent />
  	</div>
    <section v-if="!user">
        <LoginComponent />
        <RegisterComponent />
        <ForgotPasswordComponent />
    </section>
    <section>
        <SupportComponent 
            title="Feedbacks"
            subject="Feedback"
        />
    </section>
</template>
