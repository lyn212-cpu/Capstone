CREATE TABLE IF NOT EXISTS Training_Center (
    center_id INT AUTO_INCREMENT PRIMARY KEY,
    center_name VARCHAR(255) NOT NULL,
    location VARCHAR(255),
    contact_info VARCHAR(255),
    requirements TEXT,
    operation_hours VARCHAR(100),
    available_courses TEXT,
    student_slot INT
)
