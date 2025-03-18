export async function fetchQuiz() {
    try {
        const response = await fetch(`/quiz.json`);
        
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }

        const data = await response.json();
        const quiz = data.quiz;
        
        return quiz;
    } catch (error) {
        console.error('Erreur lors de la récupération du quiz:', error);
        throw error;
    }
}