
## About Blog

To run the project please follow these steps:

    <!-- Clone -->
1. git clone https://github.com/vasilkovski/Blog_post.git

 <!-- Commands -->
2. composer install
3. npm install
4. npm run dev

 <!-- Create env file (commands for env)-->

5. .cp env.example .env
6. php artisan key:generate

<!-- Migration -->
7. php artisan migrate --seed

<!-- Start server -->
8. php artisan serve

<!-- Successfully started -->


Register User, created user by default have Role User, to change to admin please do that manually into model_has_roles table and role_id field change to 1.
Anyone can create post,  user who have created the post can edit adn delete that post, otherwise he cant view edit and delete icons.
Admins can edit/delete all post.



Thank you.
