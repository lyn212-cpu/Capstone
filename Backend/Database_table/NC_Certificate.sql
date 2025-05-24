CREATE TABLE IF NOT EXISTS NC_Certificate (
    certificate_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    section_code VARCHAR(100),
    email VARCHAR(255),
    national_certificate VARCHAR(255),
    certificate_no VARCHAR(100) UNIQUE
)
