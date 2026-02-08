<!-- Quick Reference Guide - Admin Components -->

# 🎯 Guide Rapide - Composants Admin

## 📦 Composants Disponibles

### 1️⃣ Button (Bouton)
```blade
<!-- Variantes -->
<x-admin-components-button variant="primary">Primary</x-admin-components-button>
<x-admin-components-button variant="secondary">Secondary</x-admin-components-button>
<x-admin-components-button variant="danger">Danger</x-admin-components-button>
<x-admin-components-button variant="success">Success</x-admin-components-button>
<x-admin-components-button variant="ghost">Ghost</x-admin-components-button>

<!-- Tailles -->
<x-admin-components-button size="sm">Small</x-admin-components-button>
<x-admin-components-button size="md">Medium</x-admin-components-button>
<x-admin-components-button size="lg">Large</x-admin-components-button>

<!-- Avec icône -->
<x-admin-components-button icon="fas fa-plus">Ajouter</x-admin-components-button>

<!-- Comme lien -->
<x-admin-components-button href="/route">Aller vers</x-admin-components-button>

<!-- Type spécial -->
<x-admin-components-button type="submit">Envoyer</x-admin-components-button>
<x-admin-components-button type="reset">Réinitialiser</x-admin-components-button>
```

---

### 2️⃣ Input (Formulaire)
```blade
<!-- Input texte -->
<x-admin-components-input 
    label="Nom"
    name="name"
    placeholder="Entrez votre nom"
    icon="fas fa-user"
    required />

<!-- Input email -->
<x-admin-components-input 
    label="Email"
    name="email"
    type="email"
    placeholder="email@example.com" />

<!-- Input URL -->
<x-admin-components-input 
    label="Site Web"
    name="website"
    type="url"
    placeholder="https://example.com" />

<!-- Input nombre -->
<x-admin-components-input 
    label="Quantité"
    name="quantity"
    type="number" />

<!-- Input mot de passe -->
<x-admin-components-input 
    label="Mot de passe"
    name="password"
    type="password" />

<!-- Textarea -->
<x-admin-components-input 
    label="Description"
    name="description"
    type="textarea"
    placeholder="Décrivez quelque chose..." />

<!-- Input avec hint -->
<x-admin-components-input 
    label="Nom d'utilisateur"
    name="username"
    hint="Minimum 3 caractères" />

<!-- Input avec valeur par défaut -->
<x-admin-components-input 
    label="Titre"
    name="title"
    value="Mon Titre" />

<!-- Input avec erreur personnalisée -->
<x-admin-components-input 
    label="Email"
    name="email"
    type="email"
    error="Cet email est déjà utilisé" />
```

---

### 3️⃣ Alert (Alerte)
```blade
<!-- Info -->
<x-admin-components-alert type="info" title="Information">
    Voici une information importante.
</x-admin-components-alert>

<!-- Success -->
<x-admin-components-alert type="success" title="Succès!">
    L'action a été complétée avec succès.
</x-admin-components-alert>

<!-- Warning -->
<x-admin-components-alert type="warning" title="Attention">
    Veuillez vérifier avant de continuer.
</x-admin-components-alert>

<!-- Error -->
<x-admin-components-alert type="error" title="Erreur" dismissible>
    Une erreur est survenue. Veuillez réessayer.
</x-admin-components-alert>

<!-- Sans titre -->
<x-admin-components-alert type="info">
    Alerte simple sans titre.
</x-admin-components-alert>

<!-- Non fermable -->
<x-admin-components-alert type="warning" :dismissible="false">
    Cette alerte ne peut pas être fermée.
</x-admin-components-alert>

<!-- Icône personnalisée -->
<x-admin-components-alert type="info" icon="fas fa-lightbulb" title="Astuce">
    Voici une astuce utile.
</x-admin-components-alert>
```

---

### 4️⃣ Card (Carte)
```blade
<!-- Card simple -->
<x-admin-components-card title="Mon Titre">
    Contenu de la card.
</x-admin-components-card>

<!-- Card avec sous-titre -->
<x-admin-components-card 
    title="Projets" 
    subtitle="Tous vos projets actuels">
    Contenu ici.
</x-admin-components-card>

<!-- Card avec actions -->
<x-admin-components-card title="Paramètres">
    @slot('actions')
        <x-admin-components-button size="sm" variant="ghost">Modifier</x-admin-components-button>
    @endslot
    Contenu ici.
</x-admin-components-card>
```

---

### 5️⃣ Modal (Fenêtre)
```blade
<!-- Modal de confirmation -->
<x-admin-components-modal 
    title="Confirmer?"
    message="Êtes-vous sûr de vouloir continuer?"
    confirmText="Oui"
    cancelText="Non">
    <button>Cliquez-moi</button>
</x-admin-components-modal>

<!-- Modal danger -->
<x-admin-components-modal 
    title="Supprimer?"
    message="Cette action est irréversible!"
    confirmText="Supprimer"
    variant="danger">
    <button>Supprimer</button>
</x-admin-components-modal>

<!-- Modal avec action -->
<x-admin-components-modal 
    title="Exporter?"
    message="Voulez-vous exporter les données?"
    confirmText="Exporter"
    onConfirm="document.getElementById('exportForm').submit()">
    <x-admin-components-button icon="fas fa-download">Exporter</x-admin-components-button>
</x-admin-components-modal>
```

---

### 6️⃣ Table (Tableau)
```blade
<x-admin-components-table :headers="[
    ['label' => 'Titre'],
    ['label' => 'Statut'],
    ['label' => 'Actions']
]">
    @foreach($items as $item)
        <tr>
            <td class="px-6 py-4">{{ $item->title }}</td>
            <td class="px-6 py-4">
                <span class="badge badge-success">Actif</span>
            </td>
            <td class="px-6 py-4">
                <x-admin-components-button 
                    variant="ghost" 
                    size="sm"
                    href="/edit/{{ $item->id }}">
                    Éditer
                </x-admin-components-button>
            </td>
        </tr>
    @endforeach
</x-admin-components-table>
```

---

## 🎨 Classes Utilitaires

### Badges
```html
<span class="badge badge-primary">Primary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-danger">Danger</span>
```

### Shadows
```html
<div class="shadow-soft">Ombre légère</div>
<div class="shadow-medium">Ombre moyenne</div>
<div class="shadow-hard">Ombre forte</div>
```

### Hover Effects
```html
<div class="hover-lift">Élève au survol</div>
<div class="hover-grow">Grandit au survol</div>
```

### Animations
```html
<div class="animate-fade-in-up">Fade in up</div>
<div class="animate-shimmer">Shimmer</div>
```

---

## 📋 Patterns Courants

### Pattern: Formulaire Complet
```blade
<form method="POST" action="{{ route('store') }}">
    @csrf
    
    <x-admin-components-card title="Créer un Projet">
        <x-admin-components-input 
            label="Titre"
            name="title"
            required />
        
        <x-admin-components-input 
            label="Description"
            name="description"
            type="textarea"
            required />
        
        <div class="flex gap-2 justify-end">
            <x-admin-components-button variant="ghost" href="/cancel">
                Annuler
            </x-admin-components-button>
            <x-admin-components-button variant="primary" type="submit">
                <i class="fas fa-save mr-2"></i>
                Créer
            </x-admin-components-button>
        </div>
    </x-admin-components-card>
</form>
```

### Pattern: Liste avec Actions
```blade
<x-admin-components-card title="Mes Projets">
    @forelse($projects as $project)
        <div class="p-4 border-b hover:bg-gray-50 transition flex justify-between items-center">
            <div>
                <h4 class="font-semibold">{{ $project->title }}</h4>
                <p class="text-sm text-gray-600">{{ $project->description }}</p>
            </div>
            <div class="flex gap-2">
                <x-admin-components-button 
                    variant="ghost" 
                    size="sm"
                    href="/edit/{{ $project->id }}">
                    Éditer
                </x-admin-components-button>
                <form action="/delete/{{ $project->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <x-admin-components-button 
                        variant="danger" 
                        size="sm"
                        onclick="return confirm('Êtes-vous sûr?')">
                        Supprimer
                    </x-admin-components-button>
                </form>
            </div>
        </div>
    @empty
        <div class="text-center py-12">
            <i class="fas fa-inbox text-gray-300 text-3xl mb-2 block"></i>
            <p class="text-gray-500">Aucun projet trouvé</p>
        </div>
    @endforelse
</x-admin-components-card>
```

### Pattern: Statut et Badges
```blade
@if($item->status === 'active')
    <span class="badge badge-success">Actif</span>
@elseif($item->status === 'pending')
    <span class="badge badge-warning">En attente</span>
@else
    <span class="badge badge-danger">Inactif</span>
@endif
```

### Pattern: Messages d'Erreur/Succès
```blade
@if($errors->any())
    <x-admin-components-alert type="error" title="Erreurs détectées">
        <ul class="list-disc ml-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-admin-components-alert>
@endif

@if(session('success'))
    <x-admin-components-alert type="success" title="Succès!">
        {{ session('success') }}
    </x-admin-components-alert>
@endif
```

---

## 🔗 Icônes Font Awesome Utiles

```
fas fa-plus           # Plus
fas fa-minus          # Moins
fas fa-edit           # Éditer
fas fa-trash          # Supprimer
fas fa-download       # Télécharger
fas fa-upload         # Téléverser
fas fa-search         # Rechercher
fas fa-filter         # Filtrer
fas fa-save           # Enregistrer
fas fa-times          # Fermer
fas fa-check          # Valider
fas fa-exclamation    # Attention
fas fa-info           # Information
fas fa-question       # Question
fas fa-link           # Lien
fas fa-globe          # Globe
fas fa-lock           # Verrouillé
fas fa-unlock         # Déverrouillé
fas fa-eye            # Voir
fas fa-eye-slash      # Masquer
fas fa-user           # Utilisateur
fas fa-briefcase      # Projet
fas fa-star           # Compétence
fas fa-pen            # Article
fas fa-envelope       # Message
fas fa-bell           # Notification
fas fa-cog            # Paramètres
fas fa-logout         # Déconnexion
```

---

## ✨ Tips & Tricks

1. **Utilisez Alpine.js pour les interactions:**
```blade
<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <div x-show="open">Contenu visible</div>
</div>
```

2. **Combinez les composants:**
```blade
<x-admin-components-card title="Confirmation">
    <x-admin-components-alert type="warning" title="Attention">
        Confirmez cette action.
    </x-admin-components-alert>
</x-admin-components-card>
```

3. **Utilisez les slots pour la flexibilité:**
```blade
<x-admin-components-button>
    <i class="fas fa-heart"></i> J'aime
</x-admin-components-button>
```

---

**Dernière mise à jour**: 1er Février 2026
**Version**: 1.0