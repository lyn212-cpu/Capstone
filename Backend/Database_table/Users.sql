CREATE TABLE IF NOT EXISTS Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Common fields
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Student') NOT NULL,
    
    -- Student fields
    school_number VARCHAR(100),
    full_name VARCHAR(255),
    course VARCHAR(255),
    year_level VARCHAR(50),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
