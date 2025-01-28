<?php include 'db.php'; ?>
<?php include 'templates/header.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2> Case " . $row["num"] . "</h2>";
        echo "<p>" . $row["descricao"] . "</p>";
    }
} else {
    echo "<p>Não foram encontrados casos</p>";
}
?>

<a class="btn btn-secondary" href="index.php">Voltar ao início</a>
<?php include 'templates/footer.php'; ?>