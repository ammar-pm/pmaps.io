# pmaps.io

To deploy, follow Laravel Spark installation based on the version in composer.json.

Spark 4.0.7 is provided as a folder named  `spark-4.0.7` . Rename the folder to `spark` and add to /vendor/laravel

env.txt file holds environment variables. Rename to `.env` and populate as needed. Do not commit to the repo.

Run `php artisan migrate` to migrate database tables.