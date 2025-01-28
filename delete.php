<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM cases WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        echo "Caso eliminado com sucesso!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
header("Location: index.php");
exit();