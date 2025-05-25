# Laravel Support Ticket

A simple yet powerful support ticket system built with Laravel, allowing users to create support requests that notify the admin via email. Admins can view, manage, and respond to tickets, and upon resolution, they can update the ticket status. The user receives an email notification when the ticket status is updated, ensuring smooth and transparent communication between users and the support team.

This project covers creating a new Laravel application and working with routes and Blade templates. It includes setting up authentication using Laravel Breeze, working with migrations, running raw SQL queries, using the query builder and Eloquent ORM. It also includes accessors, mutators, image storage, and caching.


## Features

* **User Registration & Login**: Secure authentication system for users.
* **Create Support Tickets**: Users can create tickets for queries or issues.
* **Email Notifications**: Ticket creation notifies the admin, and status updates notify the user.
* **Admin Dashboard**: View and manage tickets with real-time status updates.
* **Status Updates**: Admin can mark tickets as resolved or in-progress.
* **GitHub OAuth**: Login with GitHub functionality included.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/Laravel-Support-Ticket.git
   cd Laravel-Support-Ticket
   ```
2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configure environment variables:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Set up your database in the `.env` file, then run migrations:

   ```bash
   php artisan migrate
   ```
5. Start the application:

   ```bash
   php artisan serve
   ```

## Usage

* Users can register/login to create support tickets.
* Admin receives email notifications upon ticket creation.
* Admin updates ticket statuses, which notify the user by email.

## Contributing

Feel free to fork this repository and submit pull requests.

## License

This project is licensed under the [MIT License](LICENSE).
