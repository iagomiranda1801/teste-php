<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $status = $_POST["status"];
    $sql = "INSERT INTO tasks (task,status) VALUES ('$task','$status')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Tarefa adicionada com sucesso!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao adicionar: " . $conn->error]);
    }
}
