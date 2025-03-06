<?php
include 'connection.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$status = isset($_POST['status']) ? (int) $_POST['status'] : 0;

if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "ID inválido!"]);
    exit;
}

// Alterna entre 1 e 0 no campo completed
$sql = "UPDATE tasks SET status = $status WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Tarefa atualizada com sucesso!"]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao atualizar tarefa: " . $conn->error]);
}

$conn->close();
?>
