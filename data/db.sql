DROP DATABASE IF EXISTS forum_2022;

CREATE DATABASE forum_2022 
DEFAULT CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

USE forum_2022;

CREATE TABLE authors (
    id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    author_name VARCHAR(40) NOT NULL
);

CREATE TABLE posts(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(80) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    author_id MEDIUMINT UNSIGNED NOT NULL,
    parent_id INT UNSIGNED,
    CONSTRAINT post_to_author
        FOREIGN KEY (author_id)
        REFERENCES authors (id),
    CONSTRAINT post_to_parent
        FOREIGN KEY (parent_id)
        REFERENCES posts (id)
);

INSERT INTO authors (author_name) VALUES
('Paul Auster'), ('Patrice Arfi'), ('Diane Arbus'), ('Pénélope Fillon');

INSERT INTO posts (title, content, created_at, author_id, parent_id)
VALUES
(
    'Comment installer PHP ?', 
    '## Bonjour \n je veux installer PHP', 
    NOW(),
    1,
    NULL
),
(
    'Télécharge', 
    'tu dois télécharger XAMPP et installer', 
    NOW(),
    2,
    1
);

