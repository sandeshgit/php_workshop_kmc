# Chapter 2: Object-Oriented Programming (OOP) in PHP

---

## 1. Introduction to OOP

### What is Object-Oriented Programming?

OOP is a programming paradigm that organizes code into **objects** — self-contained units that bundle data (properties) and behavior (methods) together.

### Why OOP?

Think about real life: A **student** has properties (name, age, roll number) and behaviors (study, attend class, submit assignment). OOP lets us model code the same way.

### Procedural vs OOP

**Procedural Approach (Day 1 style):**
```php
<?php
$username = "john_doe";
$email = "john@example.com";
$password = "secret123";

function getUsername($user) {
    return $user;
}

echo getUsername($username);
?>
```

**OOP Approach (Day 2 style):**
```php
<?php
class User {
    public string $username = "john_doe";
    public string $email = "john@example.com";

    public function getUsername(): string {
        return $this->username;
    }
}

$user = new User();
echo $user->getUsername();
?>
```

### Benefits of OOP
- **Organization** — Related data and functions are grouped together
- **Reusability** — Create objects from the same class multiple times
- **Maintainability** — Easier to update and debug
- **Scalability** — Better for large applications
- **Security** — Control access to data with access modifiers

---

## 2. Classes and Objects

### What is a Class?

A **class** is a blueprint/template for creating objects. It defines what properties and methods an object will have.

**Analogy:** A class is like an architectural blueprint. You can build many houses (objects) from one blueprint (class).

### What is an Object?

An **object** is an instance of a class — a specific thing created from the blueprint.

### Creating a Class

```php
<?php
class Car {
    // Properties (data)
    public string $brand;
    public string $color;
    public int $speed = 0;

    // Methods (behavior)
    public function accelerate(): void {
        $this->speed += 10;
        echo "Speed is now: " . $this->speed . " km/h<br>";
    }

    public function brake(): void {
        $this->speed -= 10;
        echo "Speed is now: " . $this->speed . " km/h<br>";
    }
}
?>
```

### Creating Objects (Instantiation)

```php
<?php
// Create objects from the class
$car1 = new Car();
$car1->brand = "Toyota";
$car1->color = "Red";

$car2 = new Car();
$car2->brand = "Honda";
$car2->color = "Blue";

// Use methods
echo $car1->brand . " - " . $car1->color . "<br>"; // Toyota - Red
echo $car2->brand . " - " . $car2->color . "<br>"; // Honda - Blue

$car1->accelerate(); // Speed is now: 10 km/h
$car1->accelerate(); // Speed is now: 20 km/h
$car1->brake();      // Speed is now: 10 km/h
?>
```

### Key Syntax
- `class ClassName { }` — Define a class (PascalCase naming)
- `new ClassName()` — Create an object
- `$object->property` — Access property (no `$` before property name)
- `$object->method()` — Call method

---

## 3. Properties and Methods

### Properties

Properties are variables that belong to a class. They hold the data/state of an object.

```php
<?php
class Student {
    // Properties with default values
    public string $name;
    public int $age;
    public string $grade = "Not Assigned";
    public bool $isActive = true;
}

$student = new Student();
$student->name = "Ram";
$student->age = 20;

echo $student->name;    // Ram
echo $student->grade;   // Not Assigned
echo $student->isActive; // 1 (true)
?>
```

### Methods

Methods are functions that belong to a class. They define the behavior of an object.

```php
<?php
class Calculator {
    public float $result = 0;

    public function add(float $number): static {
        $this->result += $number;
        return $this; // enables method chaining
    }

    public function subtract(float $number): static {
        $this->result -= $number;
        return $this;
    }

    public function multiply(float $number): static {
        $this->result *= $number;
        return $this;
    }

    public function getResult(): float {
        return $this->result;
    }

    public function reset(): static {
        $this->result = 0;
        return $this;
    }
}

$calc = new Calculator();
$calc->add(10);
$calc->subtract(3);
$calc->multiply(2);
echo $calc->getResult(); // 14

// Method chaining (because we return $this)
$calc->reset()->add(5)->multiply(4);
echo $calc->getResult(); // 20
?>
```

---

## 4. The `$this` Keyword

`$this` refers to the **current object** — the specific instance that is calling the method.

```php
<?php
class Person {
    public string $name;
    public int $age;

    public function introduce(): void {
        // $this->name refers to THIS specific person's name
        echo "Hi, I'm " . $this->name . " and I'm " . $this->age . " years old.<br>";
    }

    public function setName(string $name): void {
        // Without $this, PHP doesn't know you mean the property
        $this->name = $name;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }
}

$person1 = new Person();
$person1->setName("Sita");
$person1->setAge(22);
$person1->introduce(); // Hi, I'm Sita and I'm 22 years old.

$person2 = new Person();
$person2->setName("Ram");
$person2->setAge(23);
$person2->introduce(); // Hi, I'm Ram and I'm 23 years old.
?>
```

### Why `$this` is Needed

```php
<?php
class Example {
    public mixed $value;

    public function setValue(mixed $value): void {
        // $value = parameter, $this->value = property
        // Without $this, you'd just be assigning the parameter to itself!
        $this->value = $value;
    }
}
?>
```

**Remember:** `$this` is only available inside non-static methods of a class.

---

## 5. Constructor and Destructor

### Constructor (`__construct`)

A constructor is a special method that runs **automatically** when an object is created. It's used to initialize properties.

```php
<?php
class Book {
    public string $title;
    public string $author;
    public float $price;

    // Constructor - runs when you do: new Book(...)
    public function __construct(string $title, string $author, float $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        echo "Book '$this->title' created!<br>";
    }

    public function getInfo(): string {
        return "$this->title by $this->author - Rs. $this->price";
    }
}

// No need to set properties separately anymore!
$book1 = new Book("PHP Basics", "John Doe", 500);
$book2 = new Book("Web Development", "Jane Smith", 750);

echo $book1->getInfo() . "<br>"; // PHP Basics by John Doe - Rs. 500
echo $book2->getInfo() . "<br>"; // Web Development by Jane Smith - Rs. 750
?>
```

### Constructor with Default Parameters

```php
<?php
class DatabaseConfig {
    public string $host;
    public int $port;
    public string $database;

    public function __construct(string $host = "localhost", int $port = 3306, string $database = "test") {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
    }

    public function getConnectionString(): string {
        return "mysql:host=$this->host;port=$this->port;dbname=$this->database";
    }
}

// Using defaults
$config1 = new DatabaseConfig();
echo $config1->getConnectionString();
// mysql:host=localhost;port=3306;dbname=test

// Custom values
$config2 = new DatabaseConfig("192.168.1.100", 3307, "social_media");
echo $config2->getConnectionString();
// mysql:host=192.168.1.100;port=3307;dbname=social_media
?>
```

### Destructor (`__destruct`)

A destructor runs **automatically** when an object is destroyed (goes out of scope or script ends). It's used for cleanup tasks.

```php
<?php
class FileHandler {
    private string $filename;
    private mixed $handle;

    public function __construct(string $filename) {
        $this->filename = $filename;
        echo "Opening file: $filename<br>";
    }

    public function __destruct() {
        echo "Closing file: $this->filename<br>";
        // Cleanup: close file handles, free resources, etc.
    }
}

echo "Start of script<br>";
$file = new FileHandler("data.txt"); // Output: Opening file: data.txt
echo "Doing some work...<br>";
// When script ends or $file goes out of scope:
// Output: Closing file: data.txt

// You can also destroy manually:
unset($file); // Triggers __destruct immediately
echo "End of script<br>";
?>
```

**Output:**
```
Start of script
Opening file: data.txt
Doing some work...
Closing file: data.txt
End of script
```

---

## 6. Access Modifiers

Access modifiers control **who can access** properties and methods of a class.

| Modifier | Inside Class | Child Class | Outside Class |
|----------|:---:|:---:|:---:|
| **public** | Yes | Yes | Yes |
| **protected** | Yes | Yes | No |
| **private** | Yes | No | No |

### Public

Accessible from anywhere — inside the class, child classes, and outside code.

```php
<?php
class PublicExample {
    public string $name = "Hello";

    public function greet(): string {
        return $this->name;
    }
}

$obj = new PublicExample();
echo $obj->name;    // Works - accessible from outside
echo $obj->greet(); // Works
?>
```

### Private

Accessible ONLY inside the class where it's defined. Not even child classes can access it.

```php
<?php
class BankAccount {
    private float $balance = 0;      // Can't be accessed directly from outside
    private string $pin;

    public function __construct(float $initialBalance, string $pin) {
        $this->balance = $initialBalance;
        $this->pin = $pin;
    }

    public function deposit(float $amount): void {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: Rs. $amount<br>";
        }
    }

    public function withdraw(float $amount, string $pin): void {
        if ($pin !== $this->pin) {
            echo "Invalid PIN!<br>";
            return;
        }
        if ($amount > $this->balance) {
            echo "Insufficient balance!<br>";
            return;
        }
        $this->balance -= $amount;
        echo "Withdrawn: Rs. $amount<br>";
    }

    public function getBalance(string $pin): string {
        if ($pin !== $this->pin) {
            return "Invalid PIN!";
        }
        return "Balance: Rs. $this->balance";
    }
}

$account = new BankAccount(10000, "1234");
$account->deposit(5000);             // Deposited: Rs. 5000
$account->withdraw(3000, "1234");    // Withdrawn: Rs. 3000
echo $account->getBalance("1234");   // Balance: Rs. 12000

// These would cause errors:
// echo $account->balance;   // Error! Private property
// echo $account->pin;       // Error! Private property
?>
```

### Protected

Accessible inside the class and its child classes, but NOT from outside.

```php
<?php
class Animal {
    protected string $name;
    protected string $sound;

    public function __construct(string $name, string $sound) {
        $this->name = $name;
        $this->sound = $sound;
    }

    public function speak(): void {
        echo "$this->name says $this->sound!<br>";
    }
}

class Dog extends Animal {
    public function fetch(): void {
        // Can access protected $name from parent class
        echo "$this->name is fetching the ball!<br>";
    }
}

$dog = new Dog("Buddy", "Woof");
$dog->speak();  // Buddy says Woof!
$dog->fetch();  // Buddy is fetching the ball!

// This would cause an error:
// echo $dog->name;  // Error! Protected property
?>
```

### When to Use Which?

| Use Case | Modifier |
|----------|----------|
| Data that external code needs to read/write | `public` |
| Internal implementation details | `private` |
| Data that child classes should inherit | `protected` |
| Sensitive data (passwords, tokens) | `private` |
| Methods that form the public API | `public` |
| Helper methods used only internally | `private` |

---

## 7. Getters and Setters

Getters and setters are methods that provide controlled access to private properties. They allow you to add validation and logic when reading or writing data.

### Why Use Getters and Setters?

Instead of making properties public (no control), we make them private and provide methods to access them safely.

```php
<?php
class Product {
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price, int $quantity) {
        $this->setName($name);
        $this->setPrice($price);
        $this->setQuantity($quantity);
    }

    // Getter for name
    public function getName(): string {
        return $this->name;
    }

    // Setter for name (with validation)
    public function setName(string $name): void {
        if (empty($name)) {
            echo "Error: Name cannot be empty!<br>";
            return;
        }
        $this->name = $name;
    }

    // Getter for price
    public function getPrice(): float {
        return $this->price;
    }

    // Setter for price (with validation)
    public function setPrice(float $price): void {
        if ($price < 0) {
            echo "Error: Price cannot be negative!<br>";
            return;
        }
        $this->price = $price;
    }

    // Getter for quantity
    public function getQuantity(): int {
        return $this->quantity;
    }

    // Setter for quantity (with validation)
    public function setQuantity(int $quantity): void {
        if ($quantity < 0) {
            echo "Error: Quantity cannot be negative!<br>";
            return;
        }
        $this->quantity = $quantity;
    }

    // Calculated property (getter only, no setter)
    public function getTotalValue(): float {
        return $this->price * $this->quantity;
    }
}

$product = new Product("Laptop", 85000, 5);
echo $product->getName();        // Laptop
echo $product->getPrice();       // 85000
echo $product->getTotalValue();  // 425000

// Validation in action
$product->setPrice(-100);    // Error: Price cannot be negative!
$product->setName("");       // Error: Name cannot be empty!

// Valid update
$product->setPrice(90000);
echo $product->getPrice();   // 90000
?>
```

### Practical Example: User Profile

```php
<?php
class UserProfile {
    private string $username;
    private string $email;
    private int $age;

    public function __construct(string $username, string $email, int $age) {
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setAge($age);
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        if (strlen($username) < 3) {
            echo "Username must be at least 3 characters<br>";
            return;
        }
        if (strlen($username) > 20) {
            echo "Username must be less than 20 characters<br>";
            return;
        }
        $this->username = strtolower($username);
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format!<br>";
            return;
        }
        $this->email = $email;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setAge(int $age): void {
        if ($age < 13 || $age > 120) {
            echo "Age must be between 13 and 120<br>";
            return;
        }
        $this->age = $age;
    }

    public function getInfo(): string {
        return "Username: $this->username | Email: $this->email | Age: $this->age";
    }
}

$user = new UserProfile("JohnDoe", "john@example.com", 20);
echo $user->getInfo() . "<br>";
// Username: johndoe | Email: john@example.com | Age: 20

$user->setEmail("not-an-email");  // Invalid email format!
$user->setAge(10);                // Age must be between 13 and 120
$user->setUsername("ab");         // Username must be at least 3 characters
?>
```

---

## 8. Static Properties and Methods

Static members belong to the **class itself**, not to any specific object. You access them without creating an object.

### Static Properties

```php
<?php
class Counter {
    // Static property - shared across ALL objects
    public static int $count = 0;

    public function __construct() {
        self::$count++; // Increment when a new object is created
    }

    public static function getCount(): int {
        return self::$count;
    }
}

echo Counter::$count; // 0 (no objects yet)

$a = new Counter();
$b = new Counter();
$c = new Counter();

echo Counter::$count;       // 3
echo Counter::getCount();   // 3
?>
```

### Key Syntax

- `static` keyword before property/method declaration
- `self::$property` — Access static property inside the class
- `self::method()` — Call static method inside the class
- `ClassName::$property` — Access static property from outside
- `ClassName::method()` — Call static method from outside

### Static Methods

Static methods can be called without creating an object. They're useful for utility functions.

```php
<?php
class MathHelper {
    public static function add(float $a, float $b): float {
        return $a + $b;
    }

    public static function subtract(float $a, float $b): float {
        return $a - $b;
    }

    public static function percentage(float $amount, float $percent): float {
        return ($amount * $percent) / 100;
    }

    public static function isEven(int $number): bool {
        return $number % 2 === 0;
    }
}

// No need to create an object!
echo MathHelper::add(10, 5);          // 15
echo MathHelper::percentage(1000, 15); // 150
echo MathHelper::isEven(4);           // 1 (true)
?>
```

### Practical Example: Configuration Manager

```php
<?php
class AppConfig {
    private static array $settings = [];

    public static function set(string $key, mixed $value): void {
        self::$settings[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed {
        return self::$settings[$key] ?? $default;
    }

    public static function has(string $key): bool {
        return isset(self::$settings[$key]);
    }

    public static function getAll(): array {
        return self::$settings;
    }
}

// Set configuration values (no object needed)
AppConfig::set("app_name", "College Social Media");
AppConfig::set("version", "1.0");
AppConfig::set("debug", true);
AppConfig::set("max_upload_size", 5242880); // 5MB

// Retrieve values anywhere in the application
echo AppConfig::get("app_name");     // College Social Media
echo AppConfig::get("version");      // 1.0
echo AppConfig::get("timezone", "UTC"); // UTC (default value)
?>
```

### Static vs Non-Static: When to Use

| Use Static When | Use Non-Static When |
|-----------------|---------------------|
| Utility/helper functions | Each object needs its own data |
| Counting instances | Methods work with object-specific state |
| Shared configuration | You need `$this` to access properties |
| Factory methods | Objects represent distinct entities |

### Important Rules

```php
<?php
class Demo {
    public string $instanceProp = "I belong to an object";
    public static string $staticProp = "I belong to the class";

    public function instanceMethod(): void {
        echo $this->instanceProp;   // Works
        echo self::$staticProp;     // Works (can access static from non-static)
    }

    public static function staticMethod(): void {
        echo self::$staticProp;     // Works
        // echo $this->instanceProp; // ERROR! Can't use $this in static method
    }
}
?>
```

**Rule:** Static methods cannot use `$this` because they don't belong to any specific object.

---

## 9. Project Work: Building the User Class

Now let's apply everything we've learned to build a `User` class for our social media project.

### Basic User Class

```php
<?php
class User {
    // Properties (matching our database schema)
    private ?int $id = null;
    private string $username;
    private string $email;
    private string $password;
    private ?string $profilePicture = null;
    private ?string $bio = null;
    private string $createdAt;

    // Static property to track users
    private static int $userCount = 0;

    // Constructor
    public function __construct(string $username, string $email, string $password) {
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->createdAt = date("Y-m-d H:i:s");
        self::$userCount++;
    }

    // --- Getters ---

    public function getId(): ?int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getProfilePicture(): ?string {
        return $this->profilePicture;
    }

    public function getBio(): ?string {
        return $this->bio;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    // --- Setters (with validation) ---

    public function setUsername(string $username): bool {
        $username = trim($username);
        if (strlen($username) < 3 || strlen($username) > 30) {
            echo "Username must be between 3 and 30 characters<br>";
            return false;
        }
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            echo "Username can only contain letters, numbers, and underscores<br>";
            return false;
        }
        $this->username = strtolower($username);
        return true;
    }

    public function setEmail(string $email): bool {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format<br>";
            return false;
        }
        $this->email = strtolower($email);
        return true;
    }

    public function setPassword(string $password): bool {
        if (strlen($password) < 6) {
            echo "Password must be at least 6 characters<br>";
            return false;
        }
        // Hash the password for security (never store plain text!)
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return true;
    }

    public function setProfilePicture(string $path): void {
        $this->profilePicture = $path;
    }

    public function setBio(string $bio): bool {
        if (strlen($bio) > 255) {
            echo "Bio must be under 255 characters<br>";
            return false;
        }
        $this->bio = $bio;
        return true;
    }

    // --- Methods ---

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    public function getProfile(): array {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'bio' => $this->bio ?? "No bio yet",
            'profile_picture' => $this->profilePicture ?? "default.png",
            'member_since' => $this->createdAt
        ];
    }

    public function displayProfile(): void {
        $profile = $this->getProfile();
        echo "<div style='border:1px solid #ccc; padding:15px; margin:10px; border-radius:8px;'>";
        echo "<h3>@" . $profile['username'] . "</h3>";
        echo "<p>Email: " . $profile['email'] . "</p>";
        echo "<p>Bio: " . $profile['bio'] . "</p>";
        echo "<p><small>Member since: " . $profile['member_since'] . "</small></p>";
        echo "</div>";
    }

    // --- Static Methods ---

    public static function getUserCount(): int {
        return self::$userCount;
    }
}
?>
```

### Using the User Class

```php
<?php
// Create users
$user1 = new User("Ram_Sharma", "ram@example.com", "password123");
$user2 = new User("Sita_KC", "sita@example.com", "securePass456");
$user3 = new User("Hari_Bahadur", "hari@example.com", "mypass789");

// Set additional info
$user1->setBio("Computer Science student. Love coding!");
$user2->setBio("Design enthusiast and tech lover.");

// Display profiles
$user1->displayProfile();
$user2->displayProfile();
$user3->displayProfile();

// Check user count
echo "Total users: " . User::getUserCount() . "<br>"; // Total users: 3

// Verify password
if ($user1->verifyPassword("password123")) {
    echo "Login successful!<br>";
} else {
    echo "Wrong password!<br>";
}

// Validation in action
$user1->setUsername("ab");          // Username must be between 3 and 30 characters
$user1->setEmail("not-valid");      // Invalid email format
$user2->setPassword("12");          // Password must be at least 6 characters
?>
```

### File Organization (Preview for Day 3)

For now, save your User class in a separate file:

```
Day2/
├── Object_Oriented_Programming_OOP_in_PHP.md
└── sandbox/
    ├── User.php          (The User class)
    ├── test_user.php     (Test/demo script)
    ├── Car.php           (Practice: Car class)
    └── BankAccount.php   (Practice: BankAccount class)
```

**User.php** — just the class:
```php
<?php
class User {
    // ... (the class code from above)
}
?>
```

**test_user.php** — include and use it:
```php
<?php
require_once 'User.php';

$user = new User("test_user", "test@example.com", "password123");
$user->setBio("Testing the User class!");
$user->displayProfile();
?>
```

---

## 10. Complete Example: Student Management

A larger example combining all concepts from today:

```php
<?php
class Student {
    // Private properties
    private int $id;
    private string $name;
    private string $email;
    private array $marks = [];
    private string $enrolledAt;

    // Static property
    private static int $totalStudents = 0;
    private static int $nextId = 1;

    // Constructor
    public function __construct(string $name, string $email) {
        $this->id = self::$nextId++;
        $this->setName($name);
        $this->setEmail($email);
        $this->enrolledAt = date("Y-m-d");
        self::$totalStudents++;
    }

    // Destructor
    public function __destruct() {
        self::$totalStudents--;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    // Setters with validation
    public function setName(string $name): bool {
        if (empty(trim($name))) {
            echo "Name cannot be empty<br>";
            return false;
        }
        $this->name = trim($name);
        return true;
    }

    public function setEmail(string $email): bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email<br>";
            return false;
        }
        $this->email = $email;
        return true;
    }

    // Methods
    public function addMark(string $subject, int $score): bool {
        if ($score < 0 || $score > 100) {
            echo "Score must be between 0 and 100<br>";
            return false;
        }
        $this->marks[$subject] = $score;
        return true;
    }

    public function getAverage(): float {
        if (empty($this->marks)) {
            return 0;
        }
        return array_sum($this->marks) / count($this->marks);
    }

    public function getGrade(): string {
        $avg = $this->getAverage();
        if ($avg >= 90) return "A+";
        if ($avg >= 80) return "A";
        if ($avg >= 70) return "B+";
        if ($avg >= 60) return "B";
        if ($avg >= 50) return "C";
        return "F";
    }

    public function displayReport(): void {
        echo "<div style='border:1px solid #333; padding:15px; margin:10px;'>";
        echo "<h3>Student Report Card</h3>";
        echo "<p><strong>ID:</strong> $this->id</p>";
        echo "<p><strong>Name:</strong> $this->name</p>";
        echo "<p><strong>Email:</strong> $this->email</p>";
        echo "<p><strong>Enrolled:</strong> $this->enrolledAt</p>";
        echo "<hr>";
        echo "<h4>Marks:</h4>";
        foreach ($this->marks as $subject => $score) {
            echo "$subject: $score/100<br>";
        }
        echo "<hr>";
        echo "<p><strong>Average:</strong> " . number_format($this->getAverage(), 2) . "</p>";
        echo "<p><strong>Grade:</strong> " . $this->getGrade() . "</p>";
        echo "</div>";
    }

    // Static method
    public static function getTotalStudents(): int {
        return self::$totalStudents;
    }
}

// Usage
$student1 = new Student("Anish Thapa", "anish@college.edu");
$student1->addMark("PHP", 85);
$student1->addMark("JavaScript", 78);
$student1->addMark("Database", 92);

$student2 = new Student("Priya Sharma", "priya@college.edu");
$student2->addMark("PHP", 95);
$student2->addMark("JavaScript", 88);
$student2->addMark("Database", 90);

$student1->displayReport();
$student2->displayReport();

echo "Total students enrolled: " . Student::getTotalStudents();
?>
```

---

## 11. Key Takeaways

- A **class** is a blueprint; an **object** is an instance of that class
- **Properties** hold data; **methods** define behavior
- **`$this`** refers to the current object inside a method
- **Constructor** (`__construct`) initializes an object automatically
- **Destructor** (`__destruct`) cleans up when an object is destroyed
- **Access modifiers** control visibility: `public`, `private`, `protected`
- **Getters/Setters** provide controlled access with validation
- **Static** members belong to the class, not individual objects
- Use `self::` for static access inside the class
- Use `ClassName::` for static access from outside

---

## 12. Practice Exercises

### Exercise 1: Product Class
Create a `Product` class with private properties (name, price, stock). Include getters, setters with validation (price > 0, stock >= 0), and a method `purchase($quantity)` that reduces stock.

### Exercise 2: BankAccount Class
Create a `BankAccount` class with private balance and pin. Include methods: `deposit()`, `withdraw()` (validates pin and sufficient balance), and `getBalance()`. Use a static property to count total accounts.

### Exercise 3: Todo List
Create a `TodoItem` class with properties (title, isCompleted, createdAt). Include methods: `markComplete()`, `markIncomplete()`, and `getStatus()`. Use a static counter for total items.

### Exercise 4: Extend the User Class
Add these methods to the User class:
- `updateProfile($bio, $profilePicture)` — update user profile info
- `changePassword($oldPassword, $newPassword)` — verify old password before changing
- `toArray()` — return all user data as an associative array

---

## 13. Common Mistakes to Avoid

- Forgetting `$this->` when accessing properties inside methods
- Using `$this` in static methods (not allowed!)
- Making everything `public` (defeats the purpose of OOP)
- Forgetting `$` in `self::$staticProperty` (the `$` is required)
- Not calling `parent::__construct()` in child classes (Day 3+ topic)
- Confusing `self::` (current class) with `$this->` (current object)
- Storing passwords as plain text (always use `password_hash()`)

---

## Next Session Preview

In **Chapter 3**, we'll learn:
- Namespaces and PSR-4 autoloading
- Organizing our project with `src/Models/`, `src/Controllers/`, `src/Core/`
- The `use` keyword and aliasing
- Building a custom autoloader so we never need `require_once` again
- Restructuring our User class as `App\Models\User`

---

**Remember:** OOP is the foundation of modern PHP development. Every framework (Laravel, Symfony, CodeIgniter) is built on these concepts. Master classes, objects, and access modifiers — everything else builds on top!
