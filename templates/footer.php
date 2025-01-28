</div>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; 2025 Case Management</span>
    </div>
</footer>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JS for confirmation and redirection -->
<script>
    function confirmDelete() {
        return confirm('Tem a certeza que pretende eliminar o caso?');
    }

    function redirectToEdit(id) {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = 'edit.php';
        
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'id';
        hiddenField.value = id;
        
        form.appendChild(hiddenField);
        document.body.appendChild(form);
        form.submit();
    }

    function redirectToCase(id) {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = 'case.php';
        
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'id';
        hiddenField.value = id;
        
        form.appendChild(hiddenField);
        document.body.appendChild(form);
        form.submit();
    }
</script>
</body>
</html>