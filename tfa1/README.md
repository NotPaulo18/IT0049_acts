# Simple POS System – TFA2

This project is a basic Point-of-Sale website developed using CodeIgniter 4.

The Customer Accounts and User Accounts pages retrieve records from a MySQL database using CodeIgniter 4 models.

## Pages

- Home
- About
- Customer Accounts
- User Accounts

## Requirements

- PHP 8.1 or later
- Composer
- XAMPP
- MySQL or MariaDB
- CodeIgniter 4

## Local Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/NotPaulo18/IT0049_acts.git
   ```

2. Open the project directory:

   ```bash
   cd IT0049_acts/tfa1
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Start Apache and MySQL through XAMPP.

5. Open phpMyAdmin and create a database named:

   ```text
   pos_db
   ```

6. Import this database export:

   ```text
   app/Database/pos_db.sql
   ```

7. Create a `.env` file and configure it:

   ```ini
   CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = pos_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

8. Start the CodeIgniter server:

   ```bash
   php spark serve
   ```

9. Open the application:

   ```text
   http://localhost:8080
   ```

## Database Tables

### Customers

- id
- full_name
- email
- phone
- created_at

### Users

- id
- username
- full_name
- created_at

## Repository

https://github.com/NotPaulo18/IT0049_acts

## Hosted Application

Add the public website URL here after deployment.