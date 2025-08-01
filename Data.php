CREATE DATABASE IF NOT EXISTS beauty_db;
USE beauty_db;

CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100),
    image_path VARCHAR(255)
);

-- Insert your sample image data here
INSERT INTO images (category, image_path) VALUES
('Make Up', 'upload/makeup1.jpg'),
('Massage', 'upload/massage1.jpg'),
('Facial', 'upload/facial1.jpg'),
('Hair', 'upload/hair1.jpg'),
('Nail', 'upload/nail1.jpg');
