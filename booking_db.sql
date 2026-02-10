-- 1. Create Database
CREATE DATABASE IF NOT EXISTS booking_db;
USE booking_db;

-- 2. Create Users Table (For Login)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- 3. Insert Admin Account
-- Username: admin
-- Password: 1234
INSERT INTO users (username, password) VALUES ('admin', '1234');

-- 4. Create Bookings Table (With all new features)
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    service_type VARCHAR(50) NOT NULL,
    guests INT DEFAULT 1,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    notes TEXT,
    status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. Insert Sample Data (Optional: So you can see it working immediately)
INSERT INTO bookings (customer_name, email, phone, service_type, guests, booking_date, booking_time, notes, status) VALUES 
('Juan Dela Cruz', 'juan@gmail.com', '09171234567', 'Dinner Reservation', 2, '2025-10-25', '19:00:00', 'Window seat please', 'Confirmed'),
('Maria Santos', 'maria@yahoo.com', '09187654321', 'Consultation', 1, '2025-10-26', '10:30:00', ' urgent meeting', 'Pending'),
('Pedro Penduko', 'pedro@hotmail.com', '09225556666', 'Haircut / Salon', 1, '2025-10-27', '14:00:00', '', 'Cancelled');