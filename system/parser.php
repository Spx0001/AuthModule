<?php
//CHANGELOG PROJECT - PARSER
//@NEKKATHECAT
if (isset($_GET['cat'])) {
    if (!isset($_GET['action'])) {
        if (preg_match('#^[a-zA-Z0-9]+$#', $_GET['cat'])) {
            if (file_exists('pages/content/'. $_GET['cat'] .'/index.php')) {
                include 'pages/content/'. $_GET['cat'] .'/index.php';
            } else {
                include 'pages/content/auth/index.php';
            }
        } else {
            include 'pages/content/auth/index.php';
        }
    }

    if (isset($_GET['action'])) {
        if (preg_match('#^[a-zA-Z0-9]+$#', $_GET['action'])) {
            if (file_exists('pages/content/'. $_GET['cat'] .'/'. $_GET['action'] .'.php')) {
                include 'pages/content/'. $_GET['cat'] .'/'. $_GET['action'] .'.php';
            } else {
                include 'pages/content/auth/index.php';
            }
        } else {
           include 'pages/content/auth/index.php';
        }
    }
} else {
    include 'pages/content/auth/index.php';
}