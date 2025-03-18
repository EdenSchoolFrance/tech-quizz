<template>
  <div>
    <h1>Erreur</h1>
    <p>{{ error?.statusCode }}</p>
    <p>{{ error?.message }}</p>
    <button @click="handleError">Retour à la page d'accueil</button>
  </div>
</template>

<script setup lang="ts">
import type { NuxtError } from '#app'

const props = defineProps({
  error: Object as () => NuxtError
})

const handleError = () => clearError({ redirect: '/' })

definePageMeta({
  layout: false,
});
</script>
