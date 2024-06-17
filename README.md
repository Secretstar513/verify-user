## Project Overview

This project is a Laravel application that implements a simple API for user management. It includes endpoints to register users and retrieve users with optional filtering by verification status. The application also sends a verification email upon user registration.

## Prerequisites

- PHP >= 8.3
- Composer
- MySQL
- An email service provider (e.g., Mailtrap, Gmail, SendGrid)

## Setup Instructions

### Step 1: Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/your-username/everli-interview.git
cd everli-interview
```

### Step 2: Install Dependencies

Install the required PHP dependencies using Composer:

```bash
composer install
```

### Step 3: Configure the Environment

Copy the example environment file and configure it with your own settings:

```bash
cp .env.example .env
```

Update the `.env` file with your database and mail server credentials. Here is an example configuration using Mailtrap:

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=everli_db
DB_USERNAME=root
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### Step 4: Set Up the Database

Run the following commands to create the database tables and seed the database with test data:

```bash
php artisan migrate
php artisan db:seed --class=UserSeeder
```

### Step 5: Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

### Step 6: Test the API

You can use Postman or any other API testing tool to test the endpoints.

#### Register a User

- **Method:** POST
- **URL:** `http://127.0.0.1:8000/api/user`
- **Headers:** `Content-Type: application/json`
- **Body:**
  ```json
  {
    "name": "John Doe",
    "email": "john.doe@example.com"
  }
  ```

#### Retrieve Users

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/users`
- **Query Parameters (Optional):**
  - `verified` (boolean): Filter users by verification status (`true` or `false`)

### Additional Information

#### MailService

The `MailService` is used to send a verification email to the user upon registration. The email is logged for demonstration purposes, simulating the sending of an email.

#### File Structure

- **app/Http/Controllers/UserController.php:** Handles the user registration and retrieval.
- **app/Services/MailService.php:** Simulates sending a verification email.
- **app/Mail/VerifyUserMail.php:** Mailable class for the verification email.
- **resources/views/emails/verify-user.blade.php:** Email template for the verification email.
- **routes/api.php:** Defines the API routes.
- **database/seeders/UserSeeder.php:** Seeds the database with 100,000 users.

## Notes

- Ensure your mail service credentials are correct in the `.env` file.
- For production use, configure a real email service provider and handle exceptions in the `MailService`.
