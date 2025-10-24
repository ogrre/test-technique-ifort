# ifort-test-technique

Application Laravel pour le test technique ifort.

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- SQLite (inclus par défaut avec PHP)

## Installation

### 1. Cloner le projet

```bash
git clone <url-du-repo>
cd ifort-test-technique
```

### 2. Installer les dépendances

```bash
composer install
npm install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Créer la base de données

```bash
touch database/database.sqlite
php artisan migrate
```

### 5. Compiler les assets

```bash
npm run build
```

## Lancement du projet

### Méthode 1 : Script de développement (recommandé)

Lance automatiquement le serveur, la queue, les logs et Vite :

```bash
composer dev
```

### Méthode 2 : Manuel

Dans des terminaux séparés :

```bash
# Terminal 1 - Serveur web
php artisan serve

# Terminal 2 - Assets
npm run dev
```

L'application sera accessible sur `http://localhost:8000`

## Lancement avec Docker

```bash
docker-compose up -d
```

L'application sera accessible sur `http://localhost:8000`

## Tests

```bash
composer test
```
