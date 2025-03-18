<template>
  <div>
    <div v-if="questions && reponses">
      <hgroup>
        <p>Question {{ currentQuestion + 1 }} / {{ questions.length }}</p>
        <h1 class="uppercase">{{ name }}</h1>
      </hgroup>
      <div class="progress-bar">
        <div class="progress" :style="{ width: `${((currentQuestion + 1) / questions.length) * 100}%` }"></div>
      </div>
      <div>
        <p>{{ questions[currentQuestion].label }}</p>
        <ul>
          <li v-for="reponse in reponses" :key="reponse.id_reponse">
            <input type="radio" name="reponse" :id="reponse.id_reponse" :value="reponse.label" v-model="selectedReponse">
            <label :for="reponse.id_reponse">{{ reponse.label }}</label>
          </li>
        </ul>
      </div>
    </div>
    <div v-else>
      <p>Chargement...</p>
    </div>
  </div>
</template>

<script setup>
import { useRoute } from 'vue-router';
import { computed, ref, onMounted } from 'vue';
import { fetchQuestions } from '../../../utils/fetchQuestions';
import { fetchReponses } from '../../../utils/fetchReponses';

const route = useRoute();

const name = computed(() => route.params.name);
const id = computed(() => route.params.id);

const questions = ref(null);
const score = ref(0);
const currentQuestion = ref(0);
const reponses = ref(null);
const selectedReponse = ref('');

onMounted(async () => {
  try {
    questions.value = await fetchQuestions(id.value);
    if (questions.value && questions.value.length > 0) {
      reponses.value = await fetchReponses(questions.value[currentQuestion.value].id_question);
    }
  } catch (error) {
    console.error('Erreur lors du chargement:', error);
  }
});
</script>

<style scoped>
.progress-bar {
  width: 100%;
  height: 4px;
  background-color: #e2e8f0;
  border-radius: 2px;
  margin: 1rem 0;
}

.progress {
  height: 100%;
  background-color: #3b82f6;
  border-radius: 2px;
  transition: width 0.3s ease;
}
</style>
