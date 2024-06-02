# PHP Notes App

A simple Notes application built with PHP, MySQL, and basic HTML/CSS. This app allows users to sign up, log in, and manage their notes.

## Features

- User authentication (sign up, log in, log out)
- Create, read, update, and delete notes
- Responsive design
- Secure password hashing

## Directory Structure

```
/notes-app
    /css
        main.css
    /includes
        _header.php
        etc...
    /pages
        login.php
        signup.php
        dashboard.php
        logout.php
        etc...
    /database
        dbConnect.php
    index.php
```

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/your-username/notes-app-php.git
   cd notes-app-php
   ```

2. **Set up the database**

   - Create a MySQL database called `notes_app`.
   - Create a `users` table with the following SQL:

   ```sql
   CREATE DATABASE myapp;
   USE myapp;
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL,
       reg_date datetime NOT NULL DEFAULT current_timestamp()
   );
   ```
