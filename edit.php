<?php include 'db.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $number = htmlspecialchars($_POST['number']);
    $description = htmlspecialchars($_POST['description']);

    $stmt = $conn->prepare("UPDATE cases SET num=?, descricao=? WHERE id=?");
    $stmt->bind_param("ssi", $number, $description, $id);

    if ($stmt->execute() === TRUE) {
        echo "<div class='alert alert-success'>Caso editado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
} else {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM cases WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $number = $row["num"];
            $description = $row["descricao"];
        }
    } else {
        echo "<p>Não foram encontrados casos</p>";
    }
}
?>

<h2>Edit Case</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    <div class="form-group">
        <label for="number">Número:</label>
        <input type="number" class="form-control" id="number" name="number" value="<?php echo htmlspecialchars($number); ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar Caso</button>
</form>

<?php include 'templates/footer.php'; ?>