-- Create table for department courses
CREATE TABLE department_courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_code VARCHAR(10),
    department_name VARCHAR(100),
    year_level INT,
    course_name VARCHAR(100)
);

-- Insert DCvET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DCvET', 'Diploma in Civil Engineering Technology', 1, 'Technical Drafting NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 1, 'Carpentry NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 1, 'Carpentry NC III'),
('DCvET', 'Diploma in Civil Engineering Technology', 1, 'Construction Painting NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Masonry NC I'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Masonry NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Masonry NC III'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Pipe Fitting NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Plumbing NC I'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Plumbing NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 2, 'Plumbing NC III'),
('DCvET', 'Diploma in Civil Engineering Technology', 3, 'Wood Working Machine Operation'),
('DCvET', 'Diploma in Civil Engineering Technology', 3, 'Pipe Insulation'),
('DCvET', 'Diploma in Civil Engineering Technology', 3, 'Landscape Installation and Maintenance NC II'),
('DCvET', 'Diploma in Civil Engineering Technology', 3, 'Blasting/Painting');

-- Insert DCET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DCET', 'Diploma in Computer Engineering Technology', 1, 'Technical Drafting NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 1, 'Computer Hardware Serving NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 1, 'PC Operation NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 2, 'Electronics Products and Assembly NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 2, 'Illustration NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 2, 'Computer System Servicing NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 2, 'Web Development NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 3, 'Computer Programming NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 3, 'Animation NC II'),
('DCET', 'Diploma in Computer Engineering Technology', 3, 'Consumer Electronics Servicing NC II');

-- Insert DEET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DEET', 'Diploma in Electrical Technology', 1, 'Technical Drafting NC II'),
('DEET', 'Diploma in Electrical Technology', 1, 'Electrical Installation and Maintenance NC II'),
('DEET', 'Diploma in Electrical Technology', 2, 'Electrical Installation and Maintenance NC III'),
('DEET', 'Diploma in Electrical Technology', 3, 'Mechatronics Servicing NC II');

-- Insert DECET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DECET', 'Diploma in Electronics Engineering Technology', 1, 'Technical Drafting NC II'),
('DECET', 'Diploma in Electronics Engineering Technology', 1, 'Electronics Products Assembly NC II'),
('DECET', 'Diploma in Electronics Engineering Technology', 2, 'Consumer Electronics Servicing NC II'),
('DECET', 'Diploma in Electronics Engineering Technology', 2, 'PC Operation NC II'),
('DECET', 'Diploma in Electronics Engineering Technology', 3, 'Cable Television (CATV) Installation NC II'),
('DECET', 'Diploma in Electronics Engineering Technology', 3, 'Mechatronics Servicing NC II');

-- Insert DICT courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DICT', 'Diploma in Information Communication Technology', 1, 'Computer Hardware Servicing NC II'),
('DICT', 'Diploma in Information Communication Technology', 1, 'Computer System Servicing NC II'),
('DICT', 'Diploma in Information Communication Technology', 1, 'Consumer Electronics Servicing NC II'),
('DICT', 'Diploma in Information Communication Technology', 2, 'Animation NC II'),
('DICT', 'Diploma in Information Communication Technology', 2, '2D Animation NC III'),
('DICT', 'Diploma in Information Communication Technology', 2, '3D Animation NC III'),
('DICT', 'Diploma in Information Communication Technology', 3, 'Game Programming NC III'),
('DICT', 'Diploma in Information Communication Technology', 3, 'Programming NC III / NC IV');

-- Insert DMET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DMET', 'Diploma in Mechanical Engineering Technology', 1, 'Automotive Servicing NC I'),
('DMET', 'Diploma in Mechanical Engineering Technology', 1, 'Automotive Servicing NC II'),
('DMET', 'Diploma in Mechanical Engineering Technology', 1, 'Automotive Servicing NC III'),
('DMET', 'Diploma in Mechanical Engineering Technology', 2, 'RAC Servicing NC II'),
('DMET', 'Diploma in Mechanical Engineering Technology', 2, 'Auto-Engine Rebuilding NC II'),
('DMET', 'Diploma in Mechanical Engineering Technology', 2, 'SMAW NC I'),
('DMET', 'Diploma in Mechanical Engineering Technology', 2, 'Machining NC I'),
('DMET', 'Diploma in Mechanical Engineering Technology', 3, 'Driving NC II'),
('DMET', 'Diploma in Mechanical Engineering Technology', 3, 'Transport RAC Servicing NC II'),
('DMET', 'Diploma in Mechanical Engineering Technology', 3, 'GMAW NC I'),
('DMET', 'Diploma in Mechanical Engineering Technology', 3, 'SMAW NC II');

-- Insert DOMT courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DOMT', 'Diploma in Office Management Technology', 1, 'Front Office services NC II'),
('DOMT', 'Diploma in Office Management Technology', 2, 'Bookkeeping NC III'),
('DOMT', 'Diploma in Office Management Technology', 2, 'Medical Transcription NC II'),
('DOMT', 'Diploma in Office Management Technology', 3, 'Events Management NC III');

-- Insert DRET courses
INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES
('DRET', 'Diploma in Railway Engineering Technology', 1, 'Technical Drafting NC II'),
('DRET', 'Diploma in Railway Engineering Technology', 1, 'Process Inspection NC II'),
('DRET', 'Diploma in Railway Engineering Technology', 2, 'Technical Drafting NC II'),
('DRET', 'Diploma in Railway Engineering Technology', 2, 'Process Inspection NC II'),
('DRET', 'Diploma in Railway Engineering Technology', 3, 'Process Inspection NC II'),
('DRET', 'Diploma in Railway Engineering Technology', 3, 'Train Driver PRI Certification');
