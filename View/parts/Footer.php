
<?php if($_SESSION['error']): ?>
    <p class="error"><?php echo $_SESSION['error']; ?></p>
<?php removeFromSession('error'); endif; ?>

    <script src="styles/js/admin.js"></script>
    <script src="styles/js/AJAxadmin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>