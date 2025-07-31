CREATE DATABASE IF NOT EXISTS bookstore;

USE bookstore;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS product_options (
    id INT(11) NOT NULL AUTO_INCREMENT,
    product_id INT(11) NOT NULL,
    option_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert 20 products
INSERT INTO products (name, description, price, image) VALUES
('The Lord of the Rings', 'The classic fantasy novel by J.R.R. Tolkien.', 25.00, 'lotr.jpg'),
('The Hobbit', 'The prequel to The Lord of the Rings.', 15.00, 'hobbit.jpg'),
('A Game of Thrones', 'The first book in the A Song of Ice and Fire series.', 20.00, 'got.jpg'),
('The Chronicles of Narnia', 'A series of seven high fantasy novels by C. S. Lewis.', 30.00, 'narnia.jpg'),
('The Hitchhiker''s Guide to the Galaxy', 'A comedy science fiction series created by Douglas Adams.', 12.00, 'hitchhikers.jpg'),
('Dune', 'A 1965 science fiction novel by American author Frank Herbert.', 18.00, 'dune.jpg'),
('Foundation', 'A science fiction novel by American writer Isaac Asimov.', 16.00, 'foundation.jpg'),
('Brave New World', 'A dystopian social science fiction novel by English author Aldous Huxley.', 14.00, 'brave_new_world.jpg'),
('Nineteen Eighty-Four', 'A dystopian social science fiction novel and cautionary tale by English writer George Orwell.', 13.00, '1984.jpg'),
('Fahrenheit 451', 'A 1953 dystopian novel by American writer Ray Bradbury.', 11.00, 'fahrenheit_451.jpg'),
('The Martian', 'A 2011 science fiction debut novel written by Andy Weir.', 17.00, 'the_martian.jpg'),
('Project Hail Mary', 'A 2021 science fiction novel by Andy Weir.', 19.00, 'project_hail_mary.jpg'),
('The Hunger Games', 'A 2008 dystopian novel by the American writer Suzanne Collins.', 10.00, 'hunger_games.jpg'),
('Harry Potter and the Sorcerer''s Stone', 'The first novel in the Harry Potter series written by J. K. Rowling.', 22.00, 'harry_potter.jpg'),
('The Da Vinci Code', 'A 2003 mystery thriller novel by Dan Brown.', 14.00, 'da_vinci_code.jpg'),
('The Alchemist', 'A novel by Brazilian author Paulo Coelho.', 12.00, 'alchemist.jpg'),
('To Kill a Mockingbird', 'A novel by the American author Harper Lee.', 11.00, 'to_kill_a_mockingbird.jpg'),
('The Great Gatsby', 'A 1925 novel by American writer F. Scott Fitzgerald.', 10.00, 'great_gatsby.jpg'),
('Moby-Dick', 'The 1851 novel by American writer Herman Melville.', 13.00, 'moby_dick.jpg'),
('Pride and Prejudice', 'An 1813 romantic novel of manners written by Jane Austen.', 9.00, 'pride_and_prejudice.jpg');

-- Insert product options
INSERT INTO product_options (product_id, option_name) VALUES
(1, 'Hardcover'),
(1, 'Paperback'),
(2, 'Hardcover'),
(2, 'Paperback'),
(3, 'Hardcover'),
(3, 'Paperback'),
(4, 'Hardcover'),
(4, 'Paperback'),
(5, 'Hardcover'),
(5, 'Paperback'),
(6, 'Hardcover'),
(6, 'Paperback'),
(7, 'Hardcover'),
(7, 'Paperback'),
(8, 'Hardcover'),
(8, 'Paperback'),
(9, 'Hardcover'),
(9, 'Paperback'),
(10, 'Hardcover'),
(10, 'Paperback'),
(11, 'Hardcover'),
(11, 'Paperback'),
(12, 'Hardcover'),
(12, 'Paperback'),
(13, 'Hardcover'),
(13, 'Paperback'),
(14, 'Hardcover'),
(14, 'Paperback'),
(15, 'Hardcover'),
(15, 'Paperback'),
(16, 'Hardcover'),
(16, 'Paperback'),
(17, 'Hardcover'),
(17, 'Paperback'),
(18, 'Hardcover'),
(18, 'Paperback'),
(19, 'Hardcover'),
(19, 'Paperback'),
(20, 'Hardcover'),
(20, 'Paperback');
