DROP DATABASE IF EXISTS Shop;
CREATE DATABASE Shop;
USE Shop;

CREATE TABLE Clients(
  id integer PRIMARY KEY AUTO_INCREMENT,
  client VARCHAR(255) NOT NULL,
  service VARCHAR(255) NOT NULL,
  date  DATETIME NOT NULL
);
INSERT INTO Clients (client, service, `date`)
values
("Jose Rodriguez", "Cut/Beard","2022-02-06 12:00:00")
;
