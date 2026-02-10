📅 Booking System Pro

![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-000000?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

A professional, secure, and modern **Booking Management System** built with **PHP** and **MySQL**. Features a glassmorphism UI, real-time dashboard statistics, and full CRUD capabilities for managing reservations.

---

## 🚀 Option 1: Run in GitHub Codespaces (Cloud)
*Best for instant setup without installing software.*

### 1. Install Dependencies
Open your terminal and run this single command to install PHP, MySQL, and necessary drivers:
```bash
sudo apt-get update && sudo apt-get install -y mariadb-server php-mysql php8.3-cli
2. Setup DatabaseStart the database service and create the tables automatically:Bash# Start MariaDB
sudo service mariadb start

# Create Database & Tables
sudo mariadb -e "CREATE DATABASE IF NOT EXISTS booking_db; USE booking_db; CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(255)); INSERT INTO users (username, password) VALUES ('admin', '1234'); CREATE TABLE IF NOT EXISTS bookings (id INT AUTO_INCREMENT PRIMARY KEY, customer_name VARCHAR(100), email VARCHAR(100), phone VARCHAR(20), service_type VARCHAR(50), guests INT DEFAULT 1, booking_date DATE, booking_time TIME, notes TEXT, status VARCHAR(20) DEFAULT 'Pending');"
3. Start the ServerRun the application using the built-in PHP server:Bash/usr/bin/php8.3 -S 0.0.0.0:8000
Click "Open in Browser" when the popup appears.💻 Option 2: Run Locally (XAMPP on Windows)Best for permanent development.Download XAMPP and ensure Apache and MySQL are running.Go to http://localhost/phpmyadmin and create a database named booking_db.Click the SQL tab and paste the SQL code provided in database.sql (or from the command above).Move your project folder to C:\xampp\htdocs\booking-system.Open your browser to: http://localhost/booking-system.🔑 Login CredentialsRoleUsernamePasswordAdminadmin1234✨ Key Features📊 Dashboard Analytics: Visual cards showing Total, Confirmed, and Pending bookings.🔍 Smart Search: Instantly find customers by Name, Email, or Phone.🎨 Modern UI: Glassmorphism design with responsive Bootstrap 5 layout.🚦 Status Logic:<span style="color:green">● Confirmed</span> (Green Badge)<span style="color:orange">● Pending</span> (Yellow Badge)<span style="color:red">● Cancelled</span> (Red Badge)📝 CRUD Operations: Add, Edit, and Delete reservations effortlessly.📂 Project StructurePlaintext/booking-system
├── index.php        # Login Page
├── dashboard.php    # Main Admin Interface (Stats, Table, Search)
├── add.php          # Logic to add new bookings
├── edit.php         # Logic to edit existing bookings
├── db.php           # Database Connection
├── logout.php       # Session destroyer
└── README.md        # Documentation
Created with ❤️ by Jhaenicole
