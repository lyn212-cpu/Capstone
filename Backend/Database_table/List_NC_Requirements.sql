CREATE TABLE IF NOT EXISTS NC_Requirements (
    requirement_id INT AUTO_INCREMENT PRIMARY KEY,
    requirement_name VARCHAR(255) NOT NULL,
    is_custom BOOLEAN DEFAULT FALSE
)
