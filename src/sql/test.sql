-- Create the database
CREATE DATABASE IF NOT EXISTS ncst_violation_db;
USE ncst_violation_db;

-- Table for storing student information
CREATE TABLE students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    student_number VARCHAR(20) UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    program VARCHAR(100) NOT NULL,
    year_level INT NOT NULL,
    student_credits INT DEFAULT 100,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing admin information
CREATE TABLE admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(50) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for violation types
CREATE TABLE violation_types (
    type_id INT PRIMARY KEY AUTO_INCREMENT,
    violation_name VARCHAR(100) NOT NULL,
    description TEXT,
    credit_deduction INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE
);

-- Table for storing student violations
CREATE TABLE violations (
    violation_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    admin_id INT NOT NULL,
    type_id INT NOT NULL,
    violation_date DATE NOT NULL,
    description TEXT,
    status ENUM('pending', 'approved', 'declined') DEFAULT 'pending',
    credit_deduction_applied INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (admin_id) REFERENCES admins(admin_id),
    FOREIGN KEY (type_id) REFERENCES violation_types(type_id)
);

-- Table for mail logs (student to admin communication)
CREATE TABLE mail_logs (
    mail_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    admin_id INT,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    mail_type ENUM('student_to_admin', 'admin_to_student') NOT NULL,
    status ENUM('pending', 'approved', 'declined', 'notice') DEFAULT 'pending',
    credit_adjustment INT DEFAULT 0,
    adjustment_reason TEXT,
    response TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    responded_at TIMESTAMP NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (admin_id) REFERENCES admins(admin_id)
);

-- Table for credit transactions
CREATE TABLE credit_transactions (
    transaction_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    admin_id INT,
    violation_id INT,
    mail_id INT,
    amount INT NOT NULL,
    transaction_type ENUM('deduction', 'addition') NOT NULL,
    reason TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (admin_id) REFERENCES admins(admin_id),
    FOREIGN KEY (violation_id) REFERENCES violations(violation_id),
    FOREIGN KEY (mail_id) REFERENCES mail_logs(mail_id)
);