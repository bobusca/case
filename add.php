<?php include 'db.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $description = $_POST['description'];

    $sql = "INSERT INTO cases (num, descricao) VALUES ('$number', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>O caso foi criado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<h2>Adicionar um novo caso</h2>
<form method="POST">
    <div class="form-group">
        <label for="number">Número do Caso:</label>
        <input type="number" class="form-control" id="number" name="number" required>
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar caso</button>
</form>

<?php include 'templates/footer.php'; ?>