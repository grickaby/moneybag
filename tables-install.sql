/**
 * Author:  grick
 * Created: Jan 23, 2017
 */

/* CREATE moneybag DATABASE */
CREATE DATABASE moneybag DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;;

/**
 * CREATE TABLES
 */

/* DRIVERS TABLE */
CREATE TABLE moneybag.mb_drivers (
    id INT NOT NULL AUTO_INCREMENT,
    driver_number INT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    username VARCHAR(255),
    passwd VARCHAR(255),
    address TEXT,
    pay_rate DECIMAL(50,3),
    pay_ratesun DECIMAL(50,3),
    reg_date TIMESTAMP,
    PRIMARY KEY (id)
);

/* CLIENTS TABLE */
CREATE TABLE moneybag.mb_clients (
    id INT NOT NULL AUTO_INCREMENT,
    c_number VARCHAR(255),
    c_address TEXT,
    c_city VARCHAR(255),
    c_state VARCHAR(255),
    c_zip VARCHAR(255),
    primary_phone VARCHAR(255),
    secondary_phone VARCHAR(255),
    fax_number VARCHAR(255),
    email VARCHAR(255),
    price_num1dslclr DECIMAL(50,8),
    price_num1dsldye DECIMAL(50,8),
    price_num2dslclr DECIMAL(50,8),
    price_num2dsldye DECIMAL(50,8),
    price_num2dslpdfclr DECIMAL(50,8),
    price_num2dslpdfdye DECIMAL(50,8),
    price_gasprem DECIMAL(50,8),
    price_gasmid DECIMAL(50,8),
    price_gasnl DECIMAL(50,8),
    price_gas DECIMAL(50,8),
    price_distillate DECIMAL(50,8),
    lastupdate_date DATE,
    create_date TIMESTAMP,
    PRIMARY KEY (id)
);

/* TERMINALS TABLE */
CREATE TABLE moneybag.mb_terminals (
    id INT NOT NULL AUTO_INCREMENT,
    term_id VARCHAR(255),
    term_name VARCHAR(255),
    term_address TEXT,
    term_city VARCHAR(255),
    term_state VARCHAR(255),
    term_zip VARCHAR(255),
    term_phone VARCHAR(255),
    create_date TIMESTAMP,
    PRIMARY KEY (id)
);

/* ORDERS TABLE */
CREATE TABLE moneybag.mb_orders (
    id INT NOT NULL AUTO_INCREMENT,
    client_id INT NOT NULL,
    terminal_id INT NOT NULL,
    driver_id INT NOT NULL,
    bol1 VARCHAR(255),
    bol2 VARCHAR(255),
    bol3 VARCHAR(255),
    bol4 VARCHAR(255),
    bol_date DATE,
    amount_gasnl INT,
    amount_gasmid INT,
    amount_gasprem INT,
    amount_dsl1clr INT,
    amount_dsl1dye INT,
    amount_dsl2clr INT,
    amount_dsl2dye INT,
    amount_dsl2pdfclr INT,
    amount_dsl2pdfdye INT,
    pump INT,
    drops INT,
    freight_rate_gas VARCHAR(255),
    freight_rate_dist VARCHAR(255),
    create_date TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (client_id) REFERENCES mb_clients(id), 
    FOREIGN KEY (terminal_id) REFERENCES mb_terminals(id), 
    FOREIGN KEY (driver_id) REFERENCES mb_drivers(id)
);