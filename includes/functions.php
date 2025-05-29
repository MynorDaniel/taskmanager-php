<?php
function getTasks($conn) {
  $stmt = $conn->prepare("SELECT * FROM tasks ORDER BY created_at DESC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTask($conn, $title, $description) {
  $stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
  return $stmt->execute([$title, $description]);
}

function deleteTask($conn, $id) {
  $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
  return $stmt->execute([$id]);
}

function modifyTask($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        return false;
    }

    $newStatus = ($task['status'] === 'pending') ? 'done' : 'pending';

    $stmt2 = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    return $stmt2->execute([$newStatus, $id]);
}
