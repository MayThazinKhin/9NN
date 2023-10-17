## 9N Web Development Guideline
- Laravel Framework 8.0
- PHP 7.3

## Project Overall
This system allows staff to track sessions, sell pool-related items, and compute bills for the pool hall.

##Installation Commands
- cp .env.example .env  (set DB_DATABASE,DB_USERNAME,DB_PASSWORD according to the local mysql database)
- php artisan key:generate
- php artisan cache:clear  &&
  php artisan route:cache &&
  php artisan config:cache &&
  php artisan view:clear
- php artisan migrate:refresh --seed

##Naming Conventions

- `Variables` should typically be in snake case because all table columns are snake_case. (i.e. user_posts).
- `Methods`  methods should be camelCase but the first character lower case and should start with verb . (i.e. getAllUsers)
- `Blade files` should be in lower case, snake_case (underscore between words). (i.e. all.blade.php, all_posts.blade.php)
- `Controllers` should be in singular case, no spacing between words, and end with "Controller".
  Also, each word should be capitalised. (i.e. BlogController)
- `DB tables` should be in lower case, with underscores to separate words (snake_case), and should be in plural form.
  (i.e. posts, project_tasks)
- `Pivot tables` should be all lower case, each model in alphabetical order, separated by an underscore (snake_case).
  (i.e. post_user, task_user )
- `Table column`  should be in lower case, and snake_case (underscores between words). It shouldn't be referenced the table name.
- `Primary Key` This should normally be id.
- `Foreign keys` should be the model name (singular), with '_id' appended to it (assuming the PK in the other table is 'id').


