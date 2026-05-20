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
        <title>Panel - Sistema de Alumnos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="menu.php">Sistema Alumnos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ctrlEstudiosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ctrl de Estudios
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="ctrlEstudiosDropdown">
                                <li><a class="dropdown-item" href="alumnos.php">Alumnos</a></li>
                                <li><a class="dropdown-item" href="profesores.php">Profesores</a></li>
                                <li><a class="dropdown-item" href="asignaturas.php">Asignaturas</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="navbar-text me-3 text-white">
                        <?php echo htmlspecialchars($_SESSION['nombre'] ?? $_SESSION['usuario']); ?>
                    </span>
                    <a class="btn btn-outline-light" href="logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre'] ?? $_SESSION['usuario']); ?></h1>
                    <p class="card-text">Has iniciado sesión correctamente. Usa el menú "Ctrl de Estudios" para gestionar entidades.</p>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>