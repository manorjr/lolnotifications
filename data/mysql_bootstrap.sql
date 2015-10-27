CREATE DATABASE IF NOT EXISTS lol_notifications;
CREATE TABLE IF NOT EXISTS user (email VARCHAR(255), name VARCHAR(255), password VARCHAR(255), date_registration TIMESTAMP);
CREATE TABLE IF NOT EXISTS summoner (id INT(8), name VARCHAR(255));
CREATE TABLE IF NOT EXISTS subscription (id INT(8), email VARCHAR(255), id INT(8), date_subscription TIMESTAMP);
CREATE TABLE IF NOT EXISTS notification (id INT(8), user_id INT(8), notification_id INT(8), date_send TIMESTAMP, content TEXT);
-- INSERT INTO summoner VALUES('37766425', 'manorjr');
