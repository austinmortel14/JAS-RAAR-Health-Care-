CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(15),
    address TEXT,
    position_applied VARCHAR(255),
    resume TEXT,
    date_applied DATETIME DEFAULT CURRENT_TIMESTAMP
);
