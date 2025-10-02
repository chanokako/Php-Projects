CREATE DATABASE IF NOT EXISTS php_dashboard;
USE php_dashboard;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    middlename VARCHAR(50) NULL,
    lastname VARCHAR(50) NOT NULL,
    suffix VARCHAR(10) NULL,
    student_id VARCHAR(20) NOT NULL,
    batch VARCHAR(20) NOT NULL,
    technology ENUM('Computer Engineering','Electrical','Electronics','Mechanical') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (firstname, lastname, student_id, batch, technology, email, password)
VALUES ('Test', 'User', '2025-001', '2025', 'Computer Engineering', 'test@example.com',
'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
