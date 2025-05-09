
-- Create Tables
CREATE TABLE Departments (
    dept_id INT AUTO_INCREMENT PRIMARY KEY,
    dept_code VARCHAR(10) NOT NULL,
    dept_name VARCHAR(100) NOT NULL
);

CREATE TABLE Courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    nc_level VARCHAR(50)
);

CREATE TABLE DepartmentCourses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dept_id INT,
    course_id INT,
    year_level INT,
    FOREIGN KEY (dept_id) REFERENCES Departments(dept_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

-- Insert Departments
INSERT INTO Departments (dept_code, dept_name) VALUES
('DCvET', 'Diploma in Civil Engineering Technology'),
('DCET', 'Diploma in Computer Engineering Technology'),
('DEET', 'Diploma in Electrical Technology'),
('DECET', 'Diploma in Electronics Engineering Technology'),
('DICT', 'Diploma in Information Communication Technology'),
('DMET', 'Diploma in Mechanical Engineering Technology'),
('DOMT', 'Diploma in Office Management Technology'),
('DRET', 'Diploma in Railway Engineering Technology');

-- Insert Courses (no duplicates)
INSERT INTO Courses (course_name, nc_level) VALUES
('Technical Drafting', 'NC II'),
('Carpentry', 'NC II'),
('Carpentry', 'NC III'),
('Construction Painting', 'NC II'),
('Masonry', 'NC I'),
('Masonry', 'NC II'),
('Masonry', 'NC III'),
('Pipe Fitting', 'NC II'),
('Plumbing', 'NC I'),
('Plumbing', 'NC II'),
('Plumbing', 'NC III'),
('Wood Working Machine Operation', NULL),
('Pipe Insulation', NULL),
('Landscape Installation and Maintenance', 'NC II'),
('Blasting/Painting', NULL),
('Computer Hardware Servicing', 'NC II'),
('PC Operation', 'NC II'),
('Electronics Products and Assembly', 'NC II'),
('Illustration', 'NC II'),
('Computer System Servicing', 'NC II'),
('Web Development', 'NC II'),
('Computer Programming', 'NC II'),
('Animation', 'NC II'),
('Consumer Electronics Servicing', 'NC II'),
('Electrical Installation and Maintenance', 'NC II'),
('Electrical Installation and Maintenance', 'NC III'),
('Mechatronics Servicing', 'NC II'),
('Cable Television (CATV) Installation', 'NC II'),
('2D Animation', 'NC III'),
('3D Animation', 'NC III'),
('Game Programming', 'NC III'),
('Programming', 'NC III'),
('Programming', 'NC IV'),
('Automotive Servicing', 'NC I'),
('Automotive Servicing', 'NC II'),
('Automotive Servicing', 'NC III'),
('RAC Servicing', 'NC II'),
('Auto-Engine Rebuilding', 'NC II'),
('SMAW', 'NC I'),
('SMAW', 'NC II'),
('Machining', 'NC I'),
('Driving', 'NC II'),
('Transport RAC Servicing', 'NC II'),
('GMAW', 'NC I'),
('Front Office Services', 'NC II'),
('Bookkeeping', 'NC III'),
('Medical Transcription', 'NC II'),
('Events Management', 'NC III'),
('Process Inspection', 'NC II'),
('Train Driver PRI Certification', NULL);
