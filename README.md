Writely – Multi-User Blogging Platform

Writely is a dynamic multi-user blogging website where users can create, share, and engage with articles across various categories. It features real-time interactions such as liking, commenting, following/unfollowing users, and instant messaging, all powered by AJAX and jQuery for a seamless user experience. The backend is built with Laravel 11, ensuring robust performance and secure data management.


---

🚀 Features

User-Generated Content:

Create and publish articles with titles, content, categories, and thumbnail images.

Edit or delete published articles anytime.


User Profiles:

Update profile information: name, username, profile picture, email, and password.

Option to delete the account permanently.


Interactive Features:

Like and comment on articles in real-time (AJAX powered).

Follow and unfollow other users to personalize your feed.


Real-Time Messaging:

Chat instantly with other users through the built-in messaging system (AJAX powered).


Responsive UI:

Clean, responsive design built with Bootstrap for a smooth experience on all devices.




---

🛠️ Tech Stack

Frontend: HTML, CSS, JavaScript, jQuery, Bootstrap, AJAX

Backend: Laravel 11 (PHP)

Database: MySQL

Other: RESTful APIs, MVC Architecture



---

⚡ Installation & Setup

1. Clone the repository:

git clone https://github.com/ebenhaiser/writely-project.git
cd writely-project


2. Install dependencies:

composer install
npm install
npm run dev


3. Configure the environment:

Copy .env.example to .env

cp .env.example .env

Update the .env file with your database credentials and app settings.

Generate the application key:

php artisan key:generate



4. Run database migrations:

php artisan migrate


5. Start the development server:

php artisan serve

The application will be running at: http://localhost:8000




---

📂 Folder Structure

├── app/               # Application core (Controllers, Models, etc.)
├── bootstrap/         # Framework bootstrap files
├── config/            # Application configuration files
├── database/          # Migrations and seeders
├── public/            # Publicly accessible files (index.php, assets)
├── resources/         # Views (Blade templates), SASS, and JS
├── routes/            # Web and API route definitions
├── storage/           # Compiled Blade templates, file uploads, logs
├── tests/             # Automated tests
└── vendor/            # Composer dependencies


---