CREATE TABLE brand (
    id INT IDENTITY NOT NULL,
    name NVARCHAR(50) NOT NULL,
    description NVARCHAR(255) NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE product (
    id INT IDENTITY NOT NULL,
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    name NVARCHAR(255) NOT NULL,
    description VARCHAR(MAX) NOT NULL,
    price DOUBLE PRECISION NOT NULL,
    stock_quantity INT NOT NULL,
    PRIMARY KEY (id)
);

