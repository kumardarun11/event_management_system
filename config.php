<?php
session_start();

$pdo = new PDO(
"mysql:host=localhost;dbname=ems;charset=utf8mb4",
"root",
""
);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

function require_login(){
 if(empty($_SESSION['uid'])){
  header("Location: login.php");
  exit;
 }
}

function require_admin(){
 if(($_SESSION['role'] ?? '') !== 'admin'){
  die("Admin only");
 }
}

function clean($v){
 return htmlspecialchars(trim($v));
}