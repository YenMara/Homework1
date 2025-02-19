CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(120),
    email VARCHAR(255) NOT NULL UNIQUE,
    avatar VARCHAR(255)
);

CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    path VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, email) VALUES
('mara', 'mara@gmail.com'),
('nisa', 'nisa@gmail.com');