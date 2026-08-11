# PHP Course Syllabus
**Duration:** 10 Days | 1 - 1.5 Hours per Day   
**Level:** Bachelor's (Mixed - Beginners to Intermediate)  
**Project:** Status Update Portal

---

## Course Overview
This course teaches modern PHP development by building a basic 'Status Update' platform from scratch. Students will learn core PHP concepts, object-oriented programming, modern development practices (namespaces, PSR-4, Composer), and database integration. 

**Note:** CSS files will be provided. Database schema will be pre-designed with an overview provided. Focus is 100% on PHP implementation.

---

## Chapter 1: PHP Fundamentals & Environment Setup
**Duration:** 1 - 1.5 hours

### Topics Covered:
- Introduction to PHP and its role in web development
- Setting up local development environment (XAMPP/WAMP/MAMP)
- PHP syntax basics: variables, data types, operators
- Control structures: if-else, switch, loops
- Functions in PHP
- Working with forms: GET and POST methods
- Understanding `$_GET`, `$_POST`, `$_SERVER` superglobals

### Project Work:
- Set up development environment
- Create project folder structure
- Build a simple form and process it with PHP
- Create `index.php` and basic routing concept

### Deliverable:
- Working local PHP environment
- Basic understanding of PHP syntax and form processing

---

<div style="page-break-after: always;"></div>

## Chapter 2: Object-Oriented Programming (OOP) in PHP

**Duration:** 1 - 1.5 hours

### Topics Covered:
- Introduction to OOP concepts
- Classes and Objects
- Properties and Methods
- Constructor and Destructor
- `$this` keyword
- Access modifiers: public, private, protected
- Getters and Setters
- Static properties and methods

### Project Work:
- Create a `User` class with properties (id, username, email, password)
- Create methods in the User class
- Instantiate User objects
- Introduction to project structure organization

### Deliverable:
- Basic `User` class implementation
- Understanding of OOP fundamentals

---

<div style="page-break-after: always;"></div>

## Chapter 3: Namespaces, Autoloading & PSR-4

**Duration:** 1 - 1.5 hours

### Topics Covered:
- What are namespaces and why use them?
- Declaring and using namespaces
- The `use` keyword and aliasing
- PSR-4 autoloading standard
- `spl_autoload_register()` function
- File and folder naming conventions
- Organizing code with namespaces

### Project Work:
- Restructure project with proper namespaces
- Create folder structure: `src/Models/`, `src/Controllers/`, `src/Core/`
- Implement custom PSR-4 autoloader
- Refactor User class with namespace: `App\Models\User`
- Create `Config` class for application settings

### Deliverable:
- Properly namespaced project structure
- Working autoloader implementation
- Organized codebase following PSR-4 standards

---

<div style="page-break-after: always;"></div>

## Chapter 4: Composer & Database Connection (OOP)

**Duration:** 1 - 1.5 hours

### Topics Covered:
- Introduction to Composer (PHP dependency manager)
- Installing Composer
- `composer.json` and autoloading with Composer
- Installing packages via Composer
- Database connection using PDO (Object-Oriented approach)
- Prepared statements and SQL injection prevention
- Creating a reusable Database class (Singleton pattern)
- Environment variables and configuration

### Project Work:
- Initialize Composer in the project
- Configure Composer autoloading (PSR-4)
- Install useful packages (e.g., `vlucas/phpdotenv` for environment variables)
- Create `Database` class with PDO connection
- Overview of database schema (users, posts, likes, comments, follows tables)
- Test database connection

### Deliverable:
- `composer.json` configured
- Reusable `Database` class
- Successful database connection
- Understanding of database tables structure

---

<div style="page-break-after: always;"></div>

## Chapter 5: User Authentication System

**Duration:** 1 - 1.5 hours

### Topics Covered:
- Password hashing: `password_hash()` and `password_verify()`
- Sessions in PHP: `session_start()`, `$_SESSION`
- User registration process
- User login process
- User logout
- Form validation and error handling
- Redirect after login
- Creating a base `Controller` class

### Project Work:
- Create `AuthController` class
- Build registration page (`register.php`)
  - Form with username, email, password fields
  - Validate input
  - Hash password
  - Insert user into database
- Build login page (`login.php`)
  - Validate credentials
  - Start session
  - Redirect to dashboard
- Build logout functionality
- Create `auth_check.php` middleware
- Build simple dashboard page (logged-in home page)

### Deliverable:
- Complete user registration system
- Working login/logout functionality
- Session-based authentication

---

<div style="page-break-after: always;"></div>

## Chapter 6: Posts/Status Updates System

**Duration:** 1 - 1.5 hours

### Topics Covered:
- Creating and managing posts
- Working with text content
- Displaying posts from database
- Inheritance in PHP (extending classes)
- Date and time formatting in PHP
- Sanitizing output: `htmlspecialchars()`
- CRUD operations (Create, Read, Update, Delete)

### Project Work:
- Create `Post` model class (`App\Models\Post`)
- Create `PostController` class
- Build post creation form
  - Textarea for status/content
  - Submit button
- Implement `createPost()` method
  - Insert post into database with user_id and timestamp
- Display user's own posts on profile page
- Implement delete post functionality
- Display post author information

### Deliverable:
- Users can create text posts/status updates
- Posts display on profile page
- Delete functionality for own posts

---

