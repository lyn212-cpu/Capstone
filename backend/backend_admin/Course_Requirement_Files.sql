CREATE TABLE Course_Requirement_Files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    file_name VARCHAR(255),
    file_path VARCHAR(255),
    uploaded_by ENUM('admin', 'user') DEFAULT 'user',
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES Course_Admin(id) ON DELETE CASCADE
);
