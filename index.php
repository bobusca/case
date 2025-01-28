<?php include 'db.php'; ?>
<?php include 'templates/header.php'; ?>
<div class="container mt-4 flex-grow-1">
    <h2>Todos os casos</h2>
    <ul class="list-group">
        <?php
        $stmt = $conn->prepare("SELECT id, num FROM cases");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                         <span onclick='redirectToCase(" . htmlspecialchars($row["id"]) . ")' style='cursor:pointer;'>" . htmlspecialchars($row["num"]) . "</span>
                         <span>
                             <button class='btn btn-primary btn-sm' onclick='redirectToEdit(" . htmlspecialchars($row["id"]) . ")'>Editar</button>
                             <form method='POST' action='delete.php' style='display:inline;' onsubmit='return confirmDelete();'>
                                 <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>
                                 <button type='submit' class='btn btn-danger btn-sm'>
                                     <i class='bi bi-trash'></i>
                                 </button>
                             </form>
                         </span>
                      </li>";
            }
        } else {
            echo "<p>Não foram encontrados casos</p>";
        }
        ?>
    </ul>
</div>
<?php include 'templates/footer.php'; ?>