# Installation et Lancement du Projet

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- SQLite

## Installation

1. Cloner le projet et se placer dans le répertoire

```bash
cd ifort-test-technique
```

2. Installer les dépendances PHP

```bash
composer install
```

3. Installer les dépendances npm (optionnel pour le moment)

```bash
npm install
```

4. Créer le fichier de base de données SQLite

```bash
touch database/database.sqlite
```

5. Configurer l'environnement

Le fichier `.env` devrait déjà être configuré pour utiliser SQLite. Vérifiez que ces lignes sont présentes :

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

6. Générer la clé d'application

```bash
php artisan key:generate
```

7. Exécuter les migrations

```bash
php artisan migrate
```

8. Remplir la base de données avec des données de test (optionnel)

```bash
php artisan db:seed --class=InscriptionSeeder
```

## Lancement de l'application

Démarrer le serveur de développement :

```bash
php artisan serve
```

L'application sera accessible à l'adresse : `http://localhost:8000`

## Fonctionnalités implémentées

### Requis

- ✅ Formulaire d'inscription fonctionnel avec validation (nom, email requis)
- ✅ Redirection vers la page listing après enregistrement
- ✅ Affichage dynamique des inscriptions
- ✅ Recherche par nom ou e-mail
- ✅ Filtre par statut (dropdown)
- ✅ Prioritisation des inscriptions (étoile cliquable)
- ✅ Les inscriptions prioritaires s'affichent en premier

### Bonus

- ✅ Seeder pour remplir la base de données avec 15 inscriptions
- ✅ Pagination (10 résultats par page)

## Structure des fichiers

- **Routes** : `routes/web.php`
- **Contrôleur** : `app/Http/Controllers/InscriptionController.php`
- **Modèle** : `app/Models/Inscription.php`
- **Migration** : `database/migrations/2025_10_23_212800_create_inscriptions_table.php`
- **Seeder** : `database/seeders/InscriptionSeeder.php`
- **Vues Blade** :
  - Layout : `resources/views/layouts/app.blade.php`
  - Listing : `resources/views/inscriptions/index.blade.php`
  - Formulaire création : `resources/views/inscriptions/create.blade.php`
  - Formulaire édition : `resources/views/inscriptions/edit.blade.php`
- **CSS** : `public/css/style.css`

## Utilisation

### Page d'accueil (Listing)

- Affiche toutes les inscriptions avec pagination
- Barre de recherche pour filtrer par nom ou email
- Filtre par statut (dropdown)
- Bouton étoile pour marquer/démarquer comme prioritaire
- Boutons "Modifier" et "Supprimer" pour chaque inscription

### Ajouter une inscription

- Cliquer sur "Ajouter une inscription"
- Remplir le formulaire (nom et email obligatoires)
- Cliquer sur "Enregistrer l'inscription"

### Modifier une inscription

- Cliquer sur "Modifier" sur la ligne souhaitée
- Modifier les informations
- Cliquer sur "Mettre à jour l'inscription"

### Supprimer une inscription

- Cliquer sur "Supprimer" sur la ligne souhaitée
- Confirmer la suppression

### Marquer comme prioritaire

- Cliquer sur l'étoile (☆) pour marquer comme prioritaire
- L'étoile devient pleine (★) et la ligne change de style
- Les inscriptions prioritaires apparaissent en premier dans la liste

## Remarques techniques

- Base de données : SQLite (facile à configurer et portable)
- Framework : Laravel 11
- JavaScript vanilla pour les interactions (pas de framework JS nécessaire)
- CSS importé depuis le test technique original
- Architecture MVC respectée
- Code propre et commenté
