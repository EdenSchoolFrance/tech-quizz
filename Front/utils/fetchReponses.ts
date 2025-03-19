export async function fetchReponses(questionId: string) {
    try {
        const response = await fetch(`/reponses.json`);
        
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }

        const data = await response.json();
        const reponses = data.reponses.filter((reponses: any) => reponses.question_id === questionId);

        return reponses;
    } catch (error) {
        console.error('Erreur lors de la récupération des réponses:', error);
        throw error;
    }
}
