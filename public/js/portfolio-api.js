/**
 * Portfolio Frontend API Integration
 * Gère la communication entre le frontend et les APIs du backend
 */

class PortfolioAPI {
    constructor(baseUrl = '/api/portfolio') {
        this.baseUrl = baseUrl;
    }

    /**
     * Charger tous les projets publiés
     */
    async fetchProjects() {
        try {
            const response = await fetch(`${this.baseUrl}/projects`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error('Erreur lors du chargement des projets:', error);
            return [];
        }
    }

    /**
     * Charger toutes les compétences publiées
     */
    async fetchSkills() {
        try {
            const response = await fetch(`${this.baseUrl}/skills`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error('Erreur lors du chargement des compétences:', error);
            return [];
        }
    }

    /**
     * Charger les compétences par catégorie
     */
    async fetchSkillsByCategory(category) {
        try {
            const response = await fetch(`${this.baseUrl}/skills/${category}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error(`Erreur lors du chargement des compétences (${category}):`, error);
            return [];
        }
    }

    /**
     * Charger les articles publiés
     */
    async fetchPosts(page = 1) {
        try {
            const response = await fetch(`${this.baseUrl}/posts?page=${page}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error('Erreur lors du chargement des articles:', error);
            return { data: [], pagination: {} };
        }
    }

    /**
     * Charger un article spécifique
     */
    async fetchPost(slug) {
        try {
            const response = await fetch(`${this.baseUrl}/posts/${slug}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error(`Erreur lors du chargement de l'article (${slug}):`, error);
            return null;
        }
    }

    /**
     * Envoyer un message de contact
     */
    async sendMessage(data) {
        try {
            const response = await fetch(`${this.baseUrl}/messages`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.getCsrfToken()
                },
                body: JSON.stringify(data)
            });
            
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de l\'envoi du message:', error);
            throw error;
        }
    }

    /**
     * Récupérer le token CSRF depuis les métadonnées
     */
    getCsrfToken() {
        const token = document.querySelector('meta[name="csrf-token"]');
        return token ? token.getAttribute('content') : '';
    }
}

// Initialiser l'API
const portfolioAPI = new PortfolioAPI();

/**
 * Charger les projets depuis l'API et les afficher
 */
async function loadProjects() {
    const container = document.getElementById('projects-container');
    const loading = document.getElementById('loading-projects');

    try {
        const projects = await portfolioAPI.fetchProjects();

        if (loading) {
            loading.remove();
        }

        if (!projects || projects.length === 0) {
            container.innerHTML = `
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-folder-open text-4xl text-gray-600 mb-4"></i>
                    <p class="text-gray-400 text-body">Aucun projet trouvé</p>
                </div>
            `;
            return;
        }

        // Vider le conteneur
        container.innerHTML = '';

        // Ajouter les projets
        projects.forEach(project => {
            const projectElement = createProjectElement(project);
            container.appendChild(projectElement);
        });

        // Ajouter le CTA "Votre projet ici"
        const ctaElement = createCTAProject();
        container.appendChild(ctaElement);

    } catch (error) {
        console.error('Erreur lors du chargement des projets:', error);
        if (loading) {
            loading.innerHTML = `
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                    <p class="text-gray-400 text-body">Impossible de charger les projets</p>
                </div>
            `;
        }
    }
}

/**
 * Charger les compétences depuis l'API et les afficher
 */
async function loadSkills() {
    try {
        const skills = await portfolioAPI.fetchSkills();
        
        // Grouper les compétences par catégorie
        const categories = {};
        skills.forEach(skill => {
            if (!categories[skill.category]) {
                categories[skill.category] = [];
            }
            categories[skill.category].push(skill);
        });

        // Afficher les compétences (optionnel - le template en a déjà statiques)
        console.log('Compétences chargées:', categories);

    } catch (error) {
        console.error('Erreur lors du chargement des compétences:', error);
    }
}

/**
 * Créer un élément projet (adapté du template existant)
 */
function createProjectElement(project) {
    const div = document.createElement('div');
    div.className = 'glass-card rounded-2xl overflow-hidden hover-lift group';
    
    // Déterminer les couleurs du gradient
    let gradientClass = 'from-primary/10 to-secondary/10';
    
    div.innerHTML = `
        <div class="relative h-48 overflow-hidden bg-gradient-to-br ${gradientClass}">
            ${project.image ? 
                `<img src="/storage/${project.image}" 
                      alt="${project.title}"
                      class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                      onerror="this.parentElement.innerHTML = '<div class=\"w-full h-full flex items-center justify-center\"><i class=\"fas fa-code text-4xl text-gray-600\"></i></div>'">` :
                `<div class="w-full h-full flex items-center justify-center">
                    <i class="fas fa-code text-4xl text-gray-600"></i>
                </div>`
            }
        </div>
        <div class="p-8">
            <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition">${project.title}</h3>
            <p class="text-gray-400 mb-6 line-clamp-3 text-body">${project.description}</p>
            
            ${project.technologies && project.technologies.length > 0 ? `
                <div class="flex flex-wrap gap-2 mb-6">
                    ${JSON.parse(project.technologies || '[]').slice(0, 3).map(tech => 
                        `<span class="px-3 py-1 bg-dark text-xs rounded-full border border-gray-700 text-body">${tech}</span>`
                    ).join('')}
                </div>
            ` : ''}
            
            <div class="flex gap-3">
                ${project.url ? `
                    <a href="${project.url}" 
                       target="_blank"
                       class="flex-1 py-3 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition text-center text-body">
                        <i class="fas fa-external-link-alt mr-2"></i>Voir
                    </a>
                ` : ''}
                ${project.github_url ? `
                    <a href="${project.github_url}" 
                       target="_blank"
                       class="flex-1 py-3 border border-gray-700 hover:border-primary text-gray-300 hover:text-white font-semibold rounded-lg transition text-center text-body">
                        <i class="fab fa-github mr-2"></i>Code
                    </a>
                ` : ''}
                ${!project.url && !project.github_url ? `
                    <div class="flex-1 py-3 text-center text-gray-500 text-sm text-body">
                        <i class="fas fa-lock mr-2"></i>Privé
                    </div>
                ` : ''}
            </div>
        </div>
    `;
    
    return div;
}

/**
 * Créer le bouton CTA (proposer un projet)
 */
function createCTAProject() {
    const div = document.createElement('div');
    div.className = 'glass-card rounded-2xl border-2 border-dashed border-gray-700 hover:border-primary transition flex flex-col items-center justify-center p-12 text-center group';
    div.innerHTML = `
        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition">
            <i class="fas fa-plus text-primary text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Votre Projet Ici</h3>
        <p class="text-gray-400 mb-6 text-body">Vous avez une idée? Construisons-la ensemble</p>
        <a href="#contact" class="btn-primary text-body">
            <i class="fas fa-rocket mr-2"></i>Commencer un Projet
        </a>
    `;
    return div;
}

/**
 * Gérer la soumission du formulaire de contact
 */
// Utility to run callback when DOM is ready (handles scripts loaded after DOMContentLoaded)
function onReady(fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
}

onReady(() => {
    // Charger les projets au démarrage
    loadProjects();

    // Note: Contact form handling is now managed in app.blade.php 
    // with integrated email system via ContactController
    // This prevents double submission and ensures proper email delivery

    // Charger les compétences aussi
    loadSkills();
});
