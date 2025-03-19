<template>
  <div class="bg-gray-200 text-gray-800 h-screen w-screen flex flex-col justify-center items-center">
    <div class="flex flex-col justify-between items-center bg-white p-14 rounded-lg shadow-md h-96">
      <div>
        <h1 class="font-bold text-8xl">{{ error?.statusCode }}</h1>
      </div>
      <div>
        <p class="text-2xl font-normal mb-2">Looks like you’ve got lost….</p>
        <button class="text-2xl hover:underline font-light bg-purple-600 text-white px-4 py-2 w-full mt-4 text-base rounded-lg" @click="handleError">Back to Home</button>
      </div>
    </div>
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
