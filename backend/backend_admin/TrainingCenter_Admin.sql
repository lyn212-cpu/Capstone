CREATE TABLE TrainingCenter_Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    training_center_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20),
    contact_email VARCHAR(100),
    requirements JSON, -- Store multiple selectable requirements
    operation_hours VARCHAR(100),
    available_courses JSON, -- Store multiple selected courses
    student_slot INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

