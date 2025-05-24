CREATE TABLE IF NOT EXISTS NC_Course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    description TEXT,
    duration VARCHAR(100),
    category VARCHAR(100),
    start_date DATE,
    end_date DATE,
    trainer_name VARCHAR(255),
    location VARCHAR(255),
    image VARCHAR(255)
)
