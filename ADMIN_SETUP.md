<!-- Admin Panel Configuration & Setup Guide -->

# 🚀 Configuration du Panneau Admin

## Installation & Mise en Place

### 1. **Ajouter les ressources au fichier Vite**

**File: `resources/js/app.js`**
```javascript
// Importer Alpine.js si pas déjà présent
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Importer CSS admin
import '../css/admin.css';
```

### 2. **Mise à jour du Tailwind Config**

Le fichier `tailwind.config.cjs` est déjà configuré avec les couleurs et animations du design system.

### 3. **Routes Admin**

Assurez-vous que vos routes admin sont bien configurées dans `routes/api.php` ou `routes/web.php`:

```php
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('projects', ProjectController::class)->names('admin.projects');
    Route::resource('skills', SkillController::class)->names('admin.skills');
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::resource('messages', MessageController::class)->names('admin.messages');
});
```

## 📊 Layout Principal

### Structure Complète

```
┌─────────────────────────────────────────────┐
│              Header / Navigation             │
├───────┬───────────────────────────────────────┤
│       │                                       │
│ Side  │      Main Content Area                │
│ bar   │                                       │
│       │                                       │
│       │                                       │
└───────┴───────────────────────────────────────┘
```

### Features du Layout

✅ **Sidebar**
- Navigation principale
- Liens avec badges
- Section utilisateur
- Actions rapides

✅ **Header**
- Titre de la page
- Informations contextuelles
- Actions principales

✅ **Main Content**
- Affichage des formulaires
- Tableaux et listes
- Statistiques

✅ **Notifications**
- Système d'alertes intégré
- Messages d'erreur et succès

## 🎯 Utilisation des Pages Admin

### Page: Dashboard

**URL**: `/admin`
**Vue**: `resources/views/admin/dashboard.blade.php`

**Éléments:**
- 5 cartes de statistiques
- Compteur de messages non lus
- Actions rapides
- Messages récents
- Projets récents
- Message de bienvenue

### Page: Gestion des Projets

**URL**: `/admin/projects`
**Vue**: `resources/views/admin/projects/index.blade.php`

**Éléments:**
- Liste des projets (grille)
- Recherche et filtres
- Actions CRUD
- Affichage technologies

### Page: Formulaire Projet

**URL**: `/admin/projects/create` ou `/admin/projects/{id}/edit`
**Vue**: `resources/views/admin/projects/create.blade.php`

**Éléments:**
- Formulaires structurés par sections
- Gestion des technologies (dynamique)
- Upload d'image
- Paramètres de visibilité

## 📱 Tests Responsivité

### Points de Test

1. **Mobile (375px)**
   - [ ] Sidebar caché avec toggle
   - [ ] Grilles → colonnes uniques
   - [ ] Boutons taille appropriée
   - [ ] Texte lisible

2. **Tablet (768px)**
   - [ ] Sidebar visible
   - [ ] Grilles → 2 colonnes
   - [ ] Tous les éléments bien espacés

3. **Desktop (1024px+)**
   - [ ] Layout optimal
   - [ ] Tous les composants visibles
   - [ ] Animations fluides

### Commands de Test

```bash
# Développement
npm run dev

# Build production
npm run build

# Serveur Laravel
php artisan serve
```

## 🔐 Sécurité

### Middleware Requis

```php
// Protéger les routes admin
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Routes admin
});
```

### CSRF Protection

Tous les formulaires incluent automatiquement le token CSRF:
```blade
@csrf
```

### Authorization

À implémenter dans les contrôleurs:
```php
public function edit(Project $project)
{
    $this->authorize('update', $project);
    // ...
}
```

## 🎨 Personnalisation

### Modifier les Couleurs

**File: `tailwind.config.cjs`**
```javascript
colors: {
    primary: '#7c3aed',      // Violet
    secondary: '#06b6d4',    // Cyan
    accent: '#ec4899',       // Rose
}
```

### Ajouter une Police

**File: `resources/views/admin/layout.blade.php`**
```html
<link href="https://fonts.googleapis.com/css2?family=YourFont:wght@400;600;700&display=swap" rel="stylesheet">
```

### Créer une Alerte Personnalisée

**File: `resources/views/admin/components/custom-alert.blade.php`**
```blade
@props(['message'])
<div class="bg-custom rounded-lg p-4">
    {{ $message }}
</div>
```

## 🐛 Dépannage

### Les Icônes ne s'affichent pas
- Vérifier que Font Awesome est chargé dans `layout.blade.php`
- Vérifier la syntaxe: `fas fa-icon-name`

### Styles Tailwind non appliqués
- Exécuter: `npm run dev`
- Vérifier les chemins dans `tailwind.config.cjs`

### Alpine.js ne fonctionne pas
- Vérifier: `defer src="https://cdn.jsdelivr.net/npm/alpinejs..."`
- Vérifier que le script est chargé avant de l'utiliser

### Layout cassé sur mobile
- Vérifier les breakpoints: `md:`, `lg:`, etc.
- Tester avec DevTools (Ctrl+Shift+M)

## 📚 Resources

- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [Alpine.js Docs](https://alpinejs.dev)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Blade Components](https://laravel.com/docs/blade#components)

## ✨ Prochaines Étapes

1. ✅ Appliquer le design aux pages existantes
2. ⏳ Créer des graphiques sur le dashboard
3. ⏳ Implémenter les notifications en temps réel
4. ⏳ Ajouter des exporte de données (PDF, CSV)
5. ⏳ Implémenter le drag & drop pour les images

---

**Dernière mise à jour**: 1er Février 2026