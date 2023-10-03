# web services

## Setup

clone the repo and then install dependencies.

### install dependencies

```bash
composer install
composer install --ignore-platform-reqs
```

### Setup Dev Environment
Copy .env.example to .env.dev and set the following variables:

### Create Database
```bash
php artisan db:create
php artisan db:create --env=dev
```


### Backup Database
```bash
php artisan db:backup
php artisan db:backup --env=dev
```

### delete all table
```bash
php artisan db:wipe
php artisan db:wipe --env=dev
```

### Migrations

Run the following command to run startup migrations.

```bash
php artisan migrate --force
php artisan migrate:fresh --seed --force
php artisan migrate --force --env=dev
php artisan migrate:fresh --seed --force --env=dev
```

### Seed

Run the following command to run startup seeds.

```bash
php artisan db:seed --force
php artisan db:seed --force --env=dev
php -d memory_limit=512M artisan db:seed --force --env=dev
```

command for specific seeder file.

```bash
php artisan db:seed --class=SeederName
php artisan db:seed --class=SeederName --env=dev
```

### Run Application

Run the following command to run application.

```bash
php artisan serve
php artisan serve --env=dev
```

### Update Permissions

Run the following command to update permissions.

```bash
php artisan sync:permission
php artisan sync:permission --env=dev
```

### Link Storage Application

Run the following command to link storage.

```bash
php artisan storage:link
```

### backup database sql

```bash
mysqldump -u root -p itag > db.sql
mysqldump -u root -p --no-data itag > db_structure.sql
```
<!-- some apis (Fleet fuels, Fleet fuel usages, fleet meter readings, fleet odos, fleet transfers, fleet usage charges) get one week data . 
   listing data for tow variables (1,0 1 is active 0 unactive)
   1 = oneWeekCreatedDateGetData=1
   2 = &oneWeekUpdatedDateGetData=0

  -->
