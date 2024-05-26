<script setup>

import {ref, watch} from "vue";
import {debounce} from "lodash";
import ClaculatorList from "./Calculators/CalculatorsListComponent.vue"

const search = ref("");
const loading = ref(false);
const calculators = ref([]);

const searchHandler = debounce(async () => {
    try {
        loading.value = true;

        const {data} = await axios.get('http://127.0.0.1/api/search', {
            params: {
                search: search.value
            }
        });

        calculators.value = data;

    } catch (e) {
        console.log(e);
    } finally {
        loading.value = false;
    }
}, 400);

watch(() => search.value, () => searchHandler());

</script>

<template>
    <div>
        <label for="search">Search</label>

        <input
            autofocus
            type="search"
            id="search"
            placeholder="Find a calculator..."
            v-model="search"
            :disabled="loading"
        >
    </div>

    <div>
        <ClaculatorList
            v-if="calculators.length"
            :calculators="calculators"
        />
    </div>
</template>
