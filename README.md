# SISEDU

## Instalando

### 1. Clonando projeto

```bash
    git clone https://github.com/GabrielFogo/sisedu.git
    cd sisedu
```

### 2. Instalando as dependências

```bash
    composer install
    npm install
```

### 3. Clone o .env.example e configure o seu banco

```bash
   cp .env.example .env
```

### 4. Rode as migrations

```bash
    php artisan migrate
```

### 5. Inicie o projeto


```bash
    npm run dev
    php artisan serve
```