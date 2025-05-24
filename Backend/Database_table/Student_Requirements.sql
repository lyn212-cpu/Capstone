CREATE TABLE IF NOT EXISTS Student_Requirements (
    student_requirement_id INT AUTO_INCREMENT PRIMARY KEY,
    student_email VARCHAR(255) NOT NULL,
    requirement_id INT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (requirement_id) REFERENCES NC_Requirements(requirement_id)
);
