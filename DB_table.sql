-- Connect as NC_Admin now
-- Create the database
CREATE DATABASE `NC Finder`;

-- Use the database
USE `NC Finder`;

-- Table: Sign-up
CREATE TABLE `Sign_up` (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    mid_name VARCHAR(50),
    extension_name VARCHAR(10),
    address TEXT,
    birth_date DATE,
    gender ENUM('Male', 'Female', 'Other'),
    student_number VARCHAR(20) UNIQUE
);

-- Table: Student Dashboard
CREATE TABLE `Student_Dashboard` (
    student_number VARCHAR(20),
    certificates TEXT,
    student_feedback TEXT,
    student_course VARCHAR(100),
    FOREIGN KEY (student_number) REFERENCES Sign_up(student_number)
);

-- Table: NC Sites
CREATE TABLE `NC_Sites` (
    site_name VARCHAR(100) PRIMARY KEY,
    site_contact_num VARCHAR(20),
    site_email VARCHAR(100),
    requirements TEXT,
    site_location TEXT,
    operating_hours VARCHAR(100),
    available_courses TEXT,
    slot INT,
    fb_page VARCHAR(255)
);

-- Table: Feedback
CREATE TABLE `Feedback` (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    training_site_feed TEXT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    project_members TEXT,
    website_feed TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
