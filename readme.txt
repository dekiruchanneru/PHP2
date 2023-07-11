
Nama     : Ramadhan Saputra
NIM      : 20220200080
Software : Sublime, mysql


Database yang digunakan adalah "mydatabase" di phpMyAdmin.
Tabel dengan kolom yang diperlukan, seperti "id", "nama", dan "email".


Query SQL berikut:
CREATE DATABASE mydatabase;

USE mydatabase;

CREATE TABLE users (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
);
