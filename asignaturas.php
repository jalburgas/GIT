<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asignaturas - Ctrl de Estudios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Asignaturas</h1>
    <p>Página de gestión de asignaturas (placeholder).</p>
    <a href="menu.php" class="btn btn-secondary">Volver</a>
</div>
</body>
</html>