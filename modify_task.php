<?php
include 'includes/db.php';
include 'includes/functions.php';

$id = $_GET['id'] ?? null;
if ($id) {
  modifyTask($conn, $id);
}

header('Location: index.php');
exit;