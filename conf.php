<?php

define(API_KEY, 'ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc');
define (MY_ID, '37766425');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define (DB_HOST, 'localhost');
define (DB_USER, 'root');
define (DB_PASS, '');
define (DB_SCHEMA, 'lol_notifications');

// API rate limit
//500 requests every 10 minutes
//10 requests every 10 seconds