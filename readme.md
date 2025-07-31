# Online Bookstore

This is a simple online bookstore website built with PHP and MySQL.

## Website Overview

The online bookstore has the following features:

*   **User Authentication:** Users can register for a new account, log in, and log out.
*   **Product Catalog:** Browse a list of available books.
*   **Shopping Cart:** Add books to a shopping cart and view the cart's contents.
*   **Checkout:** Proceed to a checkout page (note: payment processing is not implemented).
*   **Admin Panel:** A separate section for administrators to manage products and users.

## Project Structure

The project is organized into the following directories:

*   `/admin`: Contains pages for the admin panel.
*   `/css`: Contains stylesheets for the website.
*   `/help`: Contains help and guide pages.
*   `/images`: Contains product images.
*   `/includes`: Contains reusable PHP files, such as the database connection and header/footer.
*   `/js`: Contains JavaScript files.

## Installation Guide

To run this website, you will need a local web server with PHP and a MySQL database. We recommend using a software package like XAMPP, which provides all the necessary components.

### 1. Install XAMPP

1.  Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html).
2.  Start the Apache and MySQL services from the XAMPP control panel.

### 2. Set up the Database

1.  Open your web browser and navigate to `http://localhost/phpmyadmin`.
2.  Create a new database. You can name it `bookstore` or choose another name.
3.  Select the newly created database and go to the "Import" tab.
4.  Click "Choose File" and select the `database.sql` file from this project's directory.
5.  Click "Go" to import the database structure and sample data.

### 3. Configure the Website

1.  Copy the project folder to the `htdocs` directory inside your XAMPP installation folder (usually `C:\xampp\htdocs`).
2.  Open `includes/db.php` and update the database connection variables with your own database credentials:
    ```php
    $servername = "your_servername"; // example, "localhost"
    $username = "your_username";   // example, "root"
    $password = "your_password";   // example, "" (empty for default XAMPP)
    $dbname = "your_dbname";       // example, "bookstore"
    ```

### 4. Run the Website

1.  Open your web browser and navigate to `http://localhost/online-bookstore`.
2.  You should now see the online bookstore website.

## Database Schema

The `database.sql` file sets up the following tables:

*   **`users`**: Stores user information.
    *   `id`: Unique identifier for each user.
    *   `name`: The user's name.
    *   `email`: The user's email address (used for logging in).
    *   `password`: The user's hashed password.
    *   `is_admin`: A flag (0 or 1) to indicate if the user has admin privileges.
*   **`products`**: Stores information about the books.
    *   `id`: Unique identifier for each product.
    *   `name`: The title of the book.
    *   `description`: A short description of the book.
    *   `price`: The price of the book.
    *   `image`: The filename of the book's cover image (located in the `/images` directory).
*   **`product_options`**: Stores different options for each product (example, Hardcover, Paperback).
    *   `id`: Unique identifier for each option.
    *   `product_id`: A foreign key that links to the `id` in the `products` table.
    *   `option_name`: The name of the option (example., "Hardcover").

## Database Management

Here are some useful SQL queries for managing the bookstore data. You can run these in the "SQL" tab of phpMyAdmin after selecting your database.

### Make a User an Admin

To grant admin privileges to an existing user, you need to update the `is_admin` field for that user in the `users` table.

```sql
UPDATE users SET is_admin = 1 WHERE email = 'user@example.com';
```
*Replace `user@example.com` with the email address of the user you want to make an admin.*

### Add a New Product

To add a new product, it is recommended to use the admin panel:

1.  Log in with an admin account.
2.  Navigate to the "Admin" page.
3.  Go to "Manage Products" and click on "Add New Product".

## Theming

The website supports a simple theming system that allows you to change its appearance by applying different stylesheets.

### How Theming Works

The theme is controlled by a `$_SESSION['theme']` variable. The `includes/header.php` file checks for this session variable and includes the corresponding CSS file from the `/css` directory. For example, if `$_SESSION['theme']` is set to `christmas.css`, the website will load `/css/christmas.css`.

### Changing the Theme

To change the theme, you need to set the `$_SESSION['theme']` variable. While there is no built-in theme switcher in the UI, you can change the theme programmatically. For example, you could add code to your `profile.php` or a new settings page to allow users to select a theme.

### Creating a New Theme

1.  Create a new CSS file in the `/css` directory (e.g., `my-theme.css`).
2.  Add your custom CSS rules to this file to override the default styles in `style.css` and the Bulmaswatch theme.
3.  To apply your new theme, you will need to set the `$_SESSION['theme']` variable to the name of your new CSS file (e.g., `my-theme.css`).
