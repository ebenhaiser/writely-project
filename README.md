# Writely - Multi-User Blogging Platform

## Introduction
Writely is a dynamic multi-user blogging platform that allows users to create, share, and engage with articles across various categories. It provides a seamless experience with real-time interactions, user management, and article customization.

## Features
- **User-Generated Content**: Users can create and publish articles with customizable thumbnails, titles, and categories.
- **Real-Time Interaction**:
  - AJAX-powered liking and commenting system for instant engagement.
  - Real-time messaging system for user communication.
- **Follow/Unfollow System**: Users can follow and unfollow other creators to personalize their content feed.
- **User Profile Management**:
  - Update profile details (name, username, profile picture, email, password).
  - Account deletion option.
- **Article Management**:
  - Users can edit content, thumbnails, titles, and categories at any time.
- **Responsive UI**: Built with Bootstrap for an optimal viewing experience on all devices.
- **Secure Backend**: Developed with Laravel 11 for efficient and secure data management.

## Tech Stack
- **Frontend**: HTML, CSS, JavaScript, jQuery, Bootstrap, AJAX
- **Backend**: Laravel 11 (PHP Framework)
- **Database**: MySQL

## Installation
### Prerequisites
Ensure you have the following installed:
- PHP (>=8.1)
- Composer
- MySQL
- Node.js & npm

### Steps
1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/writely.git
   cd writely
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
3. Set up the environment file:
   ```sh
   cp .env.example .env
   ```
   Configure database and other credentials in the `.env` file.
4. Generate application key:
   ```sh
   php artisan key:generate
   ```
5. Run database migrations and seed data:
   ```sh
   php artisan migrate --seed
   ```
6. Start the development server:
   ```sh
   php artisan serve
   ```
   The application should now be accessible at `http://127.0.0.1:8000`.

## Usage
- Register/Login to create an account.
- Start posting articles with thumbnails, titles, and categories.
- Interact with other users by liking, commenting, and following creators.
- Engage in real-time messaging with other users.
- Manage your profile and articles with ease.

## Author
Created by **Ebenhaiser Jonathan Caprisiano**  
Connect with me on [LinkedIn](https://www.linkedin.com/in/ebenhaiser-caprisiano/)

