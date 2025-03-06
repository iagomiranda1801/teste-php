<?php
include 'connection.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "ID inválido!"]);
    exit;
}

$sql = "DELETE FROM tasks WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Tarefa excluída com sucesso!"]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao excluir tarefa: " . $conn->error]);
}

$conn->close();
?>
