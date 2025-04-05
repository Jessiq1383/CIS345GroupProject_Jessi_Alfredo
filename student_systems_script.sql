	CREATE DATABASE IF NOT EXISTS student_system;
    Use student_system; 
    
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_ VARCHAR(255) NOT NULL
);
CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    staff_password VARCHAR(255) NOT NULL
);
CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
);
CREATE TABLE enrollments (
    student_id INT,
    course_id INT,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);
CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    grade DECIMAL(5,2) CHECK (grade >= 0 AND grade <= 100),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);
CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    date DATE NOT NULL,
    status ENUM('Present', 'Absent') NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);


INSERT INTO students (first_name, last_name, email, password_) VALUES 
('Herbert', 'Lehman', 'herbert.lehman@student.edu', 'hashed_pw_1'),
('Aaron', 'Judge', 'aaron.judge@student.edu', 'hashed_pw_2');

INSERT INTO teachers (first_name, last_name, email, staff_password) VALUES 
('Alan', 'Turing', 'alan.turing@school.edu', 'hashed_pw_3'),
('Bob', 'Smith', 'bob.smith@school.edu', 'hashed_pw4');

INSERT INTO courses (course_name, teacher_id) VALUES 
('Math 101', 1),
('Intro to Computer Science',2);

INSERT INTO enrollments (student_id, course_id) VALUES 
(1, 1), (2, 2);

INSERT INTO grades (student_id, course_id, grade) VALUES 
(1, 1, 89.5), (2, 2, 94.0);

INSERT INTO attendance (student_id, course_id, date, status) VALUES
(1, 1, '2025-03-10', 'Present'),
(2, 2, '2025-03-10', 'Absent'),
(1, 1, '2025-03-11', 'Absent'),
(2, 2, '2025-03-11', 'Present');

SELECT 
    s.first_name AS student_first_name,
    s.last_name AS student_last_name,
    c.course_name
FROM enrollments e
JOIN students s ON e.student_id = s.id
JOIN courses c ON e.course_id = c.course_id;

SELECT 
    c.course_name,
    t.first_name AS teacher_first_name,
    t.last_name AS teacher_last_name
FROM courses c
JOIN teachers t ON c.teacher_id = t.id;

SELECT 
    s.first_name AS student_first_name,
    s.last_name AS student_last_name,
    c.course_name,
    g.grade
FROM grades g
JOIN students s ON g.student_id = s.id
JOIN courses c ON g.course_id = c.course_id;

SELECT 
    s.first_name,
    s.last_name,
    c.course_name,
    a.date,
    a.status
FROM attendance a
JOIN students s ON a.student_id = s.id
JOIN courses c ON a.course_id = c.course_id
ORDER BY a.date;

SELECT 
    s.first_name,
    s.last_name,
    a.date,
    a.status
FROM attendance a
JOIN students s ON a.student_id = s.id
WHERE a.course_id = 1 AND a.date = '2025-03-10';

SELECT 
    c.course_name,
    a.date,
    a.status,
    COUNT(*) AS count
FROM attendance a
JOIN courses c ON a.course_id = c.course_id
GROUP BY c.course_name, a.date, a.status
ORDER BY a.date;

SELECT 
    s.first_name,
    s.last_name,
    c.course_name,
    g.grade
FROM grades g
JOIN students s ON g.student_id = s.id
JOIN courses c ON g.course_id = c.course_id
WHERE g.grade > 90;





