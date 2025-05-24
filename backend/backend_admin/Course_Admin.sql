USE NC_Finder;

CREATE TABLE Course_Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    training_center_name VARCHAR(255) NOT NULL,
    duration VARCHAR(100) NOT NULL,
    slots_available INT NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20),
    contact_email VARCHAR(255),
    course_description TEXT,
    requirements TEXT,  -- Comma-separated list or JSON string
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
