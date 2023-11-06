# Inisev Task

## Installation

First clone the repository.

```
git clone https://github.com/ibrahimmalii/inisev-task.git
```

Then copy the .env.example file to .env file.

```
cp .env.example .env
```

Then install the dependencies.

```
composer install
```

Then start the application

```
./vendor/bin/sail up -d 
```

Then generate the application key.

```
php artisan key:generate
```

Then run the migrations with seed.

```
php artisan migrate --seed
```

Then start the queue worker.

```
php artisan queue:work
```

Then run the create post command.

```
php artisan send:posts
```

Then start to use the application end points.
