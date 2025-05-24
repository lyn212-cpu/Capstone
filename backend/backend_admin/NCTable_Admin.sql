CREATE TABLE NCTable_Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    section_code VARCHAR(50),
    email VARCHAR(255),
    certificate_title VARCHAR(255),
    certificate_number VARCHAR(100),
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

