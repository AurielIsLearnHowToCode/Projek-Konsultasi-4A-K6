<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nnugas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tasks.id, subjects.name AS subject, tasks.content, tasks.due_date, siswa.nama 
        FROM tasks 
        JOIN siswa ON tasks.user_id = siswa.nis
        JOIN subjects ON tasks.subject_id = subjects.id";

$result = $conn->query($sql);

$tasks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = [
            'id' => $row['id'],
            'subject' => $row['subject'],
            'content' => $row['content'],
            'due_date' => $row['due_date'],
            'nama' => $row['nama']
        ];
    }
} else {
    echo json_encode(['tasks' => []]);
    exit;
}

echo json_encode(['tasks' => $tasks]);

$conn->close();
?>
