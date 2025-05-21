CREATE TABLE Course_Requirements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    requirement_name VARCHAR(255),
    FOREIGN KEY (course_id) REFERENCES Course_Admin(id) ON DELETE CASCADE
);
