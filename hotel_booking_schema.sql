-- Create the database
CREATE DATABASE IF NOT EXISTS hotel_booking;
USE hotel_booking;

-- Create the 'admins' table
CREATE TABLE IF NOT EXISTS admins (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('super', 'staff') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'rooms' table
CREATE TABLE IF NOT EXISTS rooms (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_rooms INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'bookings' table with 'email' as NULLABLE
CREATE TABLE IF NOT EXISTS bookings (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100), -- Made nullable by removing NOT NULL
    phone VARCHAR(20),
    check_in DATETIME NOT NULL,
    check_out DATETIME NOT NULL,
    room_type_id INT NOT NULL,
    status ENUM('pending','confirmed','cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    updated_by INT,
    number_of_rooms INT NOT NULL DEFAULT 1,
    payment_status VARCHAR(20) DEFAULT 'Unpaid',
    payment_method VARCHAR(50),
    FOREIGN KEY (room_type_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (updated_by) REFERENCES admins(id) ON DELETE SET NULL
);

-- Create the 'bookings' table
CREATE TABLE contacts (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  subject VARCHAR(255),
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
