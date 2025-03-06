<?php
include 'connection.php';

$sql = "SELECT * FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statusClass = $row['status'] == 1 ? 'success' : 'secondary';
        $statusIcon = $row['status'] == 1 ? '✅' : '⭕';
        $toggleText = $row['status'] == 1 ? 'Desfazer' : 'Concluir';

        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo '<span>' . htmlspecialchars($row['task']) . '</span>';
        echo '<div>';
        echo '<button class="btn btn-' . $statusClass . ' btn-sm toggle-status" data-id="' . $row['id'] . '">' . $statusIcon . ' ' . $toggleText . '</button> ';
        echo '<button class="btn btn-danger btn-sm delete-task" data-status="' . $row['status'] . '" data-id="' . $row['id'] . '">🗑 Excluir</button>';
        echo '</div>';
        echo '</li>';
    }
} else {
    echo '<li class="list-group-item text-center">Nenhuma tarefa encontrada.</li>';
}

$conn->close();
