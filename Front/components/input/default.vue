<template>
    <li class="border-2 rounded-lg"  :class="selectedReponse === reponse.id_reponse ? 'border-[#A729F5]' : 'border-none'">
        <input type="radio" class="invisible" name="reponse" :id="reponse.id_reponse" :value="reponse.id_reponse" @click="updateSelectedReponse(reponse.id_reponse)">
        <label :for="reponse.id_reponse" class="cursor-pointer" >{{ reponse.label }}</label>
    </li>
</template>

<script setup>
    const props = defineProps({
        reponse: Object,
        selectedReponse: String,
        updateSelectedReponse: Function
    });
</script>