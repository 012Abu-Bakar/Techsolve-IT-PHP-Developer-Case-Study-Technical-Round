
CREATE TABLE contact_form (
    id INT PRIMARY KEY,
    full_name VARCHAR(30) NOT NULL,
    ph_num VARCHAR(13) NOT NULL,
    email VARCHAR(50) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(50) NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);