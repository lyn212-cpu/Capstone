CREATE USER 'NC_Admin'@'localhost' IDENTIFIED BY 'AdminGroup3';
GRANT ALL PRIVILEGES ON *.* TO 'NC_Admin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
