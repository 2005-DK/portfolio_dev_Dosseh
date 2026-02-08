# 🚀 Guide de Démarrage - Portfolio Dosseh

## ⚡ Setup Rapide (5 minutes)

### 1. Installer les dépendances

```bash
composer install
npm install
```

### 2. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configurer la base de données

```bash
# .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_dosseh
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# Créer la base de données
mysql -u root
CREATE DATABASE portfolio_dosseh;
EXIT;
```

### 4. Exécuter les migrations et seeders

```bash
# Créer les tables
php artisan migrate

# Remplir avec les données d'exemple
php artisan db:seed
```

### 5. Compiler les assets

```bash
npm run dev
# ou pour la production
npm run build
```

### 6. Lancer le serveur

```bash
php artisan serve
```

Accédez à:
- **Frontend Public**: http://localhost:8000
- **Admin**: http://localhost:8000/admin/login

---

## 🔐 Identifiants par Défaut

```
Email: admin@portfolio.com
Mot de passe: password123
```

⚠️ **À changer en production!**

---

## 📱 Utilisation

### Pour les Visiteurs
1. Allez sur http://localhost:8000
2. Explorez les projets, compétences, articles
3. Envoyez un message de contact

### Pour l'Admin (Vous)
1. Allez sur http://localhost:8000/admin/login
2. Connectez-vous avec vos identifiants
3. Gérez le contenu:
   - **Projets** - Ajouter/Modifier/Supprimer
   - **Compétences** - Mettre à jour vos skills
   - **Articles** - Écrire des articles/blog
   - **Messages** - Consulter les messages de contact
4. Le frontend se met à jour automatiquement!

---

## 📁 Structure du Projet

```
portfolio-dosseh/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Contrôleurs admin
│   │   └── Api/             # Contrôleurs API
│   └── Models/              # Modèles Eloquent
├── routes/
│   ├── web.php              # Routes frontend + admin
│   └── api.php              # Routes API
├── resources/
│   ├── views/
│   │   ├── app.blade.php    # Page d'accueil
│   │   └── admin/           # Vues admin
│   └── js/
│       └── portfolio-api.js  # Intégration API
├── database/
│   ├── migrations/          # Schéma de base
│   └── seeders/             # Données d'exemple
├── public/
│   ├── js/                  # JavaScript public
│   └── storage/             # Images uploadées
└── ARCHITECTURE.md          # Documentation complète
```

---

## 🔄 Workflow Complet

```
1. Admin (/admin/projects) crée un nouveau projet
   ↓
2. Backend valide et sauvegarde en base
   ↓
3. Frontend (visiteur) recharge la page
   ↓
4. JavaScript appelle GET /api/portfolio/projects
   ↓
5. Le nouveau projet s'affiche automatiquement
   ↓
6. AUCUNE modification du code frontend requise! ✨
```

---

## 🛠️ Commandes Utiles

```bash
# Créer un contrôleur
php artisan make:controller Admin/ProjectController

# Créer un modèle
php artisan make:model Project -m

# Créer une migration
php artisan make:migration create_projects_table

# Exécuter les migrations
php artisan migrate

# Annuler les migrations
php artisan migrate:rollback

# Remplir la base avec des données
php artisan db:seed

# Vider la base et refaire les migrations
php artisan migrate:fresh --seed

# Générer les assets
npm run dev
npm run build
npm run build:watch
```

---

## 📊 API Endpoints

### Frontend (Lecture Seule)

```bash
# Projets publiés
GET /api/portfolio/projects
Response: [{ id, title, description, technologies, ... }]

# Compétences publiées
GET /api/portfolio/skills
Response: [{ id, name, category, proficiency, ... }]

# Compétences par catégorie
GET /api/portfolio/skills/frontend
Response: [{ id, name, category, proficiency, ... }]

# Articles publiés (paginé)
GET /api/portfolio/posts?page=1
Response: { data: [...], pagination: {...} }

# Article spécifique
GET /api/portfolio/posts/{slug}
Response: { id, title, slug, content, ... }

# Envoyer un message
POST /api/portfolio/messages
Body: { name, email, subject, message }
Response: { success: "Message envoyé" }
```

### Admin (Protégé par authentification)

```bash
# Dashboard
GET /admin

# Projets
GET    /admin/projects           # Liste
POST   /admin/projects           # Créer
GET    /admin/projects/{id}/edit # Éditer
PUT    /admin/projects/{id}      # Mettre à jour
DELETE /admin/projects/{id}      # Supprimer

# Compétences
GET    /admin/skills
POST   /admin/skills
PUT    /admin/skills/{id}
DELETE /admin/skills/{id}

# Articles
GET    /admin/posts
POST   /admin/posts
PUT    /admin/posts/{id}
DELETE /admin/posts/{id}

# Messages
GET    /admin/messages
GET    /admin/messages/{id}
DELETE /admin/messages/{id}
POST   /admin/messages/{id}/mark-as-read
```

---

## 🔒 Sécurité

- ✅ Authentification Laravel intégrée
- ✅ Protection CSRF sur tous les formulaires
- ✅ Validation backend systématique
- ✅ Permissions basées sur l'authentification
- ✅ Routes admin protégées

---

## 🚢 Déploiement (Production)

### 1. Optimiser pour la production

```bash
# Compiler les assets
npm run build

# Optimiser Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Définir le mode production
APP_ENV=production
APP_DEBUG=false
```

### 2. Configurer le serveur

```bash
# Permissions
sudo chown -R www-data:www-data /var/www/portfolio
sudo chmod -R 755 /var/www/portfolio
sudo chmod -R 775 /var/www/portfolio/storage
sudo chmod -R 775 /var/www/portfolio/bootstrap/cache

# Vérifier les requirements
php artisan serve
```

### 3. Base de données

```bash
# Sur le serveur de production
php artisan migrate --force
php artisan db:seed --force
```

### 4. HTTPS et Certificat SSL

```bash
# Installer Certbot (Let's Encrypt)
sudo apt-get install certbot python3-certbot-apache

# Générer un certificat
sudo certbot certonly --apache -d portfolio.dosseh.dev

# Renouvellement automatique
sudo systemctl enable certbot.timer
```

---

## 🐛 Dépannage

### Erreur: "Class not found"
```bash
php artisan clear-compiled
composer dump-autoload
```

### Erreur: "Migration table doesn't exist"
```bash
php artisan migrate --force
```

### Erreur: "Permission denied" (storage)
```bash
chmod -R 775 storage bootstrap/cache
```

### Assets not loading
```bash
npm run dev
php artisan cache:clear
```

---

## 📞 Support & Ressources

- [Documentation Laravel](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [ARCHITECTURE.md](./ARCHITECTURE.md) - Documentation complète

---

## ✨ Prochaines Étapes

1. ✅ Personnaliser le contenu dans `/admin`
2. ✅ Ajouter votre logo et images
3. ✅ Configurer les variables d'environnement
4. ✅ Déployer en production
5. ✅ Configurer les emails de contact
6. ✅ Ajouter l'authentification Google/GitHub

---

**Créé avec ❤️ par Dosseh - Full Stack Developer**
**Dernière mise à jour: Février 2025**
