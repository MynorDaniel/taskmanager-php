<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'] ?? '';
  $description = $_POST['description'] ?? '';

  if ($title) {
    addTask($conn, $title, $description);
  }
}

header('Location: index.php');
exit;
