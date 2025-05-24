CREATE TABLE NC_Course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    training_center_name VARCHAR(255) NOT NULL,
    duration VARCHAR(100) NOT NULL,
    slots_available INT NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_info VARCHAR(255),
    course_description TEXT,
    requirements TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
