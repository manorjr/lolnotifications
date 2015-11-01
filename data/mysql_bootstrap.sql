CREATE DATABASE IF NOT EXISTS lol_notifications;

CREATE TABLE IF NOT EXISTS user (email VARCHAR(255), name VARCHAR(255), password VARCHAR(255), date_registration TIMESTAMP);
CREATE TABLE IF NOT EXISTS summoner (id INT(8), name VARCHAR(255), region VARCHAR(255));
CREATE TABLE IF NOT EXISTS subscription (id INT(8) AUTO_INCREMENT, email VARCHAR(255), summoner_id INT(8), date_subscription TIMESTAMP, PRIMARY KEY (id));
CREATE TABLE IF NOT EXISTS notification (id INT(8) AUTO_INCREMENT, email VARCHAR(255), subscription_id INT(8), date_send TIMESTAMP, content TEXT, PRIMARY KEY (id));
CREATE TABLE IF NOT EXISTS champion (id INT(8), name VARCHAR(255), PRIMARY KEY (id));

INSERT INTO user VALUES('pol.pereta@gmail.com', 'Manor', '', NOW());
INSERT INTO user VALUES('sandrete66@gmail.com', 'Hemlet', '', NOW());
INSERT INTO user VALUES('ccricab@gmail.com', 'Groccat', '', NOW());
INSERT INTO user VALUES('foldfiesta@gmail.com', 'Fiestau', '', NOW());

INSERT INTO summoner VALUES('37766425', 'manorjr', 'euw');
INSERT INTO summoner VALUES('309409', 'hemlet', 'euw');
INSERT INTO summoner VALUES('42239822', 'groccat', 'euw');
INSERT INTO summoner VALUES('19098856', 'fiestau', 'euw');

INSERT INTO subscription VALUES('', 'pol.pereta@gmail.com', '309409', NOW());
INSERT INTO subscription VALUES('', 'pol.pereta@gmail.com', '42239822', NOW());
INSERT INTO subscription VALUES('', 'pol.pereta@gmail.com', '19098856', NOW());
INSERT INTO subscription VALUES('', 'pol.pereta@gmail.com', '37766425', NOW());
INSERT INTO subscription VALUES('', 'sandrete66@gmail.com', '37766425', NOW());
INSERT INTO subscription VALUES('', 'sandrete66@gmail.com', '42239822', NOW());
INSERT INTO subscription VALUES('', 'sandrete66@gmail.com', '19098856', NOW());
INSERT INTO subscription VALUES('', 'ccricab@gmail.com', '37766425', NOW());
INSERT INTO subscription VALUES('', 'ccricab@gmail.com', '309409', NOW());
INSERT INTO subscription VALUES('', 'ccricab@gmail.com', '19098856', NOW());
INSERT INTO subscription VALUES('', 'foldfiesta@gmail.com', '37766425', NOW());
INSERT INTO subscription VALUES('', 'foldfiesta@gmail.com', '309409', NOW());
INSERT INTO subscription VALUES('', 'foldfiesta@gmail.com', '42239822', NOW());
