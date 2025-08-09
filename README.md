
## Tech Stack

Laravel, MySQL, Alpine, TailwindCSS

## Run Locally

Clone the project

```bash
  git clone https://github.com/SetraNugraha/postspot
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  npm install
```

Environtment

```bash
  copy .env.example to .env, set the value as needed
```

### Setup Laravel

Install composer

```bash
  composer install
```

Generate Key

```bash
  php artisan key:generate
```

Run the migrations (Make sure you have already created the database in MySQL)

```bash
  php artisan migrate
```

Link Storage 

```bash
  php artisan storage:link
```


### Run project

```bash
  npm run dev
  php artisan serve
```
