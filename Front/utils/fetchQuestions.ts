export async function fetchQuestions(quizId: string) {
    try {
        const response = await fetch(`/questions.json`);
        
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }

        const data = await response.json();
        const quiz = data.questions.filter((quiz: any) => quiz.quiz_id === quizId);

        return quiz;
    } catch (error) {
        console.error('Erreur lors de la récupération du quiz:', error);
        throw error;
    }
}
