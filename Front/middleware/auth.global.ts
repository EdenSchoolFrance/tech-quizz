export default defineNuxtRouteMiddleware((to, from) => {
  console.log('Middleware global exécuté')
  console.log('Route de destination:', to.path)
  
  const isAuthenticated = false; // TODO: Remplacer par la logique d'authentification
  console.log('État d\'authentification:', isAuthenticated)

  // Si l'utilisateur est sur la page de login ou d'inscription, on le laisse y accéder
  if (to.path === '/login' || to.path === '/register') {
    console.log('Accès aux pages d\'authentification autorisé')
    return
  }

  if (isAuthenticated) {
    // Si l'utilisateur est authentifié et essaie d'accéder à la landing page (/)
    if (to.path === '/') {
      console.log('Redirection vers /home')
      return navigateTo('/home')
    }
    // Pour toutes les autres pages, on laisse l'accès
    console.log('Accès autorisé')
    return
  } else {
    // Si l'utilisateur n'est pas authentifié et n'est pas sur la landing page
    if (to.path !== '/') {
      console.log('Redirection vers la landing page')
      return navigateTo('/')
    }
  }
}) 