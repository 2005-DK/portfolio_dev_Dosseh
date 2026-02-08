<!-- VISUAL PREVIEW - Admin Panel Layout -->

# 🎨 Admin Panel - Aperçu Visuel

## 📐 Structure Global

```
┌────────────────────────────────────────────────────────────────┐
│  Admin Portfolio                                      01 FÉV    │ ← HEADER
├─────────────────┬──────────────────────────────────────────────┤
│                 │ 🏠 DASHBOARD                                 │
│ ┌─────────────┐ ├──────────────────────────────────────────────┤
│ │ 🏠 Dashboard│ │                                              │
│ ├─────────────┤ │  📊 CARTES STATISTIQUES (5)                 │
│ │ 📁 CONTENU  │ │ ┌──────┐ ┌──────┐ ┌──────┐ ┌──────┐ ┌─────┐│
│ │ 💼 Projets  │ │ │ PROJ │ │ COMP │ │ ART  │ │ MSG  │ │ LUS ││
│ │ ⭐ Skills   │ │ │ 12   │ │ 8    │ │ 25   │ │ 43   │ │ 3   ││
│ │ ✍️ Articles │ │ └──────┘ └──────┘ └──────┘ └──────┘ └─────┘│
│ │ 💬 Messages │ ├──────────────────────────────────────────────┤
│ │   📨 (3)    │ │                                              │
│ ├─────────────┤ │  ⚡ ACTIONS RAPIDES                         │
│ │ 👤 Utilisat.│ │ ┌────────────────┐ ┌────────────────┐      │
│ │ 🔗 Voir site│ │ │ + Nouveau proj │ │ + Nouvel art  │      │
│ │ 🚪 Déconnexion
│ │             │ │ └────────────────┘ └────────────────┘      │
│ └─────────────┘ ├──────────────────────────────────────────────┤
│                 │  📨 MESSAGES RÉCENTS                         │
│ SIDEBAR         │ ┌──────────────────────────────────────────┐ │
│ ────────────    │ │ • John: Superbe portfolio! ✓              │ │
│ Responsive      │ │ • Marie: Votre project est...              │ │
│ Mobile: Caché   │ │ • Admin: Merci de...                      │ │
│ Tablet: Visible │ │ • Pierre: Peux-tu m'aider?                │ │
│ Desktop: Visible│ │ • Sarah: Excellent travail!                │ │
│                 │ └──────────────────────────────────────────┘ │
│                 └──────────────────────────────────────────────┘
└────────────────────────────────────────────────────────────────┘
```

---

## 🎨 Palette de Couleurs

```
PRIMARY:     #7c3aed  ████████ Violet (Principal)
SECONDARY:   #06b6d4  ████████ Cyan (Accent)
ACCENT:      #ec4899  ████████ Rose (Highlight)
SUCCESS:     #10b981  ████████ Vert (Validation)
WARNING:     #f59e0b  ████████ Orange (Alerte)
DANGER:      #ef4444  ████████ Rouge (Erreur)
DARK:        #0f172a  ████████ Noir (Texte)
LIGHT:       #f8fafc  ████████ Blanc (Fond)
```

---

## 🎯 Pages & Composants

### Dashboard View
```
┌─────────────────────────────────────────────────────────┐
│ STATISTIQUES                                            │
│ ┌──────┬──────┬──────┬──────┬──────────────────────┐   │
│ │ 12   │ 8    │ 25   │ 43   │ 🔴 3 Messages à lire │   │
│ │Projets│Skills│Articles│Msg│                      │   │
│ └──────┴──────┴──────┴──────┴──────────────────────┘   │
│                                                         │
│ ACTIONS RAPIDES        MESSAGES RÉCENTS  PROJETS RÉCENTS│
│ ┌──────────────┐      ┌──────────────┐  ┌────────────┐ │
│ │ + Nouveau    │      │ Message 1    │  │ Projet A   │ │
│ │ + Nouvel art │      │ Message 2    │  │ Projet B   │ │
│ │ + Compétence │      │ Message 3    │  │ Projet C   │ │
│ └──────────────┘      └──────────────┘  └────────────┘ │
│                                                         │
│ [BIENVENUE - Message de salutation personnalisé]       │
└─────────────────────────────────────────────────────────┘
```

### Stat Cards
```
┌────────────────┐
│ 📁 Projets     │
│ 12             │  ← Animation au hover (scale 1.05)
│ Vos projets    │  ← Icône colorée
│ Gérer →        │  ← Lien vers gestion
└────────────────┘
```

### Projects Index
```
┌─────────────────────────────────────────────────────────┐
│ MES PROJETS                                [+ Nouveau]  │
├─────────────────────────────────────────────────────────┤
│ ┌──────────────────────┬──────────────────────┐         │
│ │ 🖼️ [Image Projet]    │ 🖼️ [Image Projet]    │         │
│ │ Titre Projet 1       │ Titre Projet 2       │         │
│ │ Description courte...│ Description courte...│         │
│ │ Vue React Vue Laravel│ Node.js Express PHP  │         │
│ │ [Éditer] [Supprimer] │ [Éditer] [Supprimer] │         │
│ └──────────────────────┴──────────────────────┘         │
│ ┌──────────────────────┬──────────────────────┐         │
│ │ ... Plus de projets ...                              │
│ └──────────────────────┴──────────────────────┘         │
└─────────────────────────────────────────────────────────┘
```

### Projects Form
```
┌─────────────────────────────────────────────────────────┐
│ CRÉER UN NOUVEAU PROJET                                 │
├─────────────────────────────────────────────────────────┤
│                                                         │
│ INFORMATIONS GÉNÉRALES                                │
│ ┌─────────────────────────────────────────────────┐   │
│ │ Titre du Projet                                 │   │
│ │ [________________________________]              │   │
│ │ URL du Projet                                   │   │
│ │ [________________________________]              │   │
│ │ Description                                     │   │
│ │ [____________________________________]          │   │
│ │ [____________________________________]          │   │
│ └─────────────────────────────────────────────────┘   │
│                                                         │
│ TECHNOLOGIES                                           │
│ ┌─────────────────────────────────────────────────┐   │
│ │ [Ajouter: _____________] [+ Ajouter]           │   │
│ │ [React] [Vue] [Laravel] [Tailwind] [X]         │   │
│ └─────────────────────────────────────────────────┘   │
│                                                         │
│ IMAGE DU PROJET                                        │
│ ┌─────────────────────────────────────────────────┐   │
│ │ ☁️ Cliquez ou déposez une image                 │   │
│ │ PNG, JPG jusqu'à 5MB                            │   │
│ └─────────────────────────────────────────────────┘   │
│                                                         │
│ VISIBILITÉ                                             │
│ ☑️ Visible      ○ Masqué                              │
│                                                         │
│ [Annuler]                              [💾 Créer]    │
└─────────────────────────────────────────────────────────┘
```

---

## 🧩 Composants Disponibles

### Button Variants
```
[Primary Button]    [Secondary Button]    [Danger Button]
[Success Button]    [Ghost Button]

[Small]    [Medium]    [Large]

[+ Icon]   [Icon + Text]   [Text Only]
```

### Input Variants
```
┌─ Input Text ─────────────────┐
│ Label                         │
│ [🏠 __________________]       │
│ Hint text                     │
└───────────────────────────────┘

┌─ Textarea ───────────────────┐
│ Label                         │
│ [✉️ _________________]       │
│ [_________________]           │
│ [_________________]           │
└───────────────────────────────┘

┌─ With Error ──────────────────┐
│ Label                          │
│ [❌ Email invalid __]          │ ← Red border
│ ⚠️ Cet email existe déjà       │ ← Error message
└────────────────────────────────┘
```

### Alert Variants
```
ℹ️ [Info Message] [X]
✅ [Success Message] [X]
⚠️ [Warning Message] [X]
❌ [Error Message] [X]
```

### Card
```
┌─────────────────────────────────┐
│ Title          [Subtitle]  [⚙️]  │ ← Header
├─────────────────────────────────┤
│                                   │
│ Content goes here...              │
│                                   │
└─────────────────────────────────┘
```

### Table
```
┌────────────────┬──────────────┬──────────────┐
│ Title          │ Status       │ Actions      │
├────────────────┼──────────────┼──────────────┤
│ Project 1      │ ✅ Active    │ [✏️] [🗑️]   │
│ Project 2      │ ⏳ Pending   │ [✏️] [🗑️]   │
│ Project 3      │ ❌ Inactive  │ [✏️] [🗑️]   │
└────────────────┴──────────────┴──────────────┘
```

---

## 📱 Responsive Breakpoints

### Mobile (< 640px)
```
┌──────────────────────┐
│ ☰ Admin Portfolio    │ ← Menu toggle
├──────────────────────┤
│                      │
│ DASHBOARD            │
│ ┌────────────────┐   │
│ │ 12 Projets     │   │
│ ├────────────────┤   │
│ │ 8 Skills       │   │
│ ├────────────────┤   │
│ │ 25 Articles    │   │
│ └────────────────┘   │
│                      │
└──────────────────────┘

[Sidebar masqué]
[Menu toucher: optimisé]
[Grille: 1 colonne]
```

### Tablet (640px - 1024px)
```
┌──────────────────────────────────────────┐
│ Admin Portfolio                   01 FÉV  │
├──────────┬────────────────────────────────┤
│          │ DASHBOARD                     │
│ Sidebar  │ ┌──────┬──────┬──────┐       │
│ visible  │ │ 12   │ 8    │ 25   │       │
│          │ └──────┴──────┴──────┘       │
│          │                              │
│          │ Contenu 2 colonnes           │
│          │ ┌───────────┬───────────┐    │
│          │ │ Messages  │ Projets   │    │
│          │ └───────────┴───────────┘    │
└──────────┴────────────────────────────────┘
```

### Desktop (> 1024px)
```
┌────────────────────────────────────────────────────┐
│ Admin Portfolio                          01 FÉV    │
├────────────┬──────────────────────────────────────┤
│ Sidebar    │ DASHBOARD                            │
│ fixe       │ ┌──┬──┬──┬──┬──────┐                 │
│            │ │12│ 8│25│43│  3   │                 │
│ 🏠         │ └──┴──┴──┴──┴──────┘                 │
│ 💼         │                                      │
│ ⭐         │ ⚡ Actions │ 📨 Messages │ 💼 Projets│
│ ✍️         │ ─────────┼────────────┼──────────    │
│ 💬         │ Content  │ Content    │ Content      │
│ 👤         │                                      │
└────────────┴──────────────────────────────────────┘
[Grille: 3+ colonnes]
[Toutes les infos visibles]
```

---

## 🎭 États & Interactions

### Button Hover
```
DEFAULT:    [Button]         (border, shadow soft)
HOVER:      [Button] 🔼      (scale +5%, shadow medium)
ACTIVE:     [Button] ↓       (scale -2%, shadow hard)
DISABLED:   [Button] 50%     (opacity 50%, cursor)
```

### Input Focus
```
DEFAULT:    [Input Field] (border gray)
FOCUS:      [Input Field] (border primary, glow)
ERROR:      [Input Field] (border red, bg red-50)
FILLED:     [Input Field] (border primary, filled)
```

### Card Hover
```
DEFAULT:    [Card]        (shadow soft)
HOVER:      [Card] 🔼     (scale +5%, shadow hard)
TRANSITION: 300ms ease    (smooth)
```

---

## ✨ Animations

```
Fade In Up       ↗️  (0.5s ease-out)
Slide Down       ↓   (0.4s ease-out) [Notifications]
Scale Hover      🔍  (0.3s ease)
Pulse Badge      📍  (2s infinite)
Spin Loader      ⟳   (0.6s infinite)
```

---

## 🎯 User Flows

### Flow: Créer un Projet
```
Dashboard
    ↓ [+ Nouveau Projet]
    ↓
Formulaire Création
    ├─ Infos Générales
    ├─ Technologies
    ├─ Image
    ├─ Visibilité
    ↓
[💾 Créer]
    ↓
✅ Succès → Redirection Dashboard
```

### Flow: Voir Messages
```
Dashboard [3] Notification Badge
    ↓ [Clic]
    ↓
Messages Index (liste)
    ↓
Clic sur message
    ↓
Détails Message
    ↓ [Répondre/Marquer comme lu]
```

---

## 📊 Légende des Icônes

| Icône | Signification |
|-------|---------------|
| 🏠 | Dashboard |
| 💼 | Projets |
| ⭐ | Compétences |
| ✍️ | Articles |
| 💬 | Messages |
| 👤 | Utilisateur |
| 🔗 | Lien externe |
| 🚪 | Déconnexion |
| ✏️ | Éditer |
| 🗑️ | Supprimer |
| ➕ | Ajouter |
| ✅ | Valider |
| ❌ | Erreur |
| ⏳ | En attente |
| 📨 | Messages |
| 🔔 | Notification |
| ⚡ | Actions rapides |

---

**Créé le**: 1er Février 2026
**Version**: 1.0 Final
**Status**: ✅ Complet