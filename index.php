<?php

include 'includes/db.php';
include 'includes/functions.php';

$tasks = getTasks($conn);

include 'templates/header.php';

?>

<div class="container">
    <h1 class="main-title">Task Manager</h1>

    <form method="POST" action="add_task.php" class="task-form">
        <input type="text" placeholder="New Task" name="title" required class="input-text">
        <textarea placeholder="Description" name="description" class="input-textarea"></textarea>
        <button type="submit" class="btn-submit">Add</button>
    </form>

    <ul class="task-list">
        <?php foreach($tasks as $task): ?>
            <li class="task-item">
                <div class="task-info">
                    <strong><?= htmlspecialchars($task['title']) ?></strong> - <?= htmlspecialchars($task['description']) ?>
                </div>

                <div class="task-actions">
                    <a href="delete_task.php?id=<?= $task['id'] ?>" class="delete-link" onclick="return confirm('Delete task?')">Delete</a>
                    <a href="modify_task.php?id=<?= $task['id'] ?>"
                       class="status-link <?= $task['status'] === 'done' ? 'status-done' : 'status-pending' ?>">
                        <?= htmlspecialchars($task['status']) ?>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include 'templates/footer.php'; ?>