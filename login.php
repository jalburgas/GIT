<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: menu.php');
    exit();
}

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'conexion.php';

    // Obtener datos del formulario
    $usuario = trim($_POST['username'] ?? '');
    $clave = trim($_POST['password'] ?? '');

    // Consulta preparada con PDO para SQLite
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario, $clave]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['usuario_id'] = $result['id'];
        $_SESSION['nombre'] = $result['nombre'];
        header('Location: menu.php');
        exit();
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Sistema de Alumnos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
        <style>
            body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; }
            .login-container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); max-width: 400px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h2 class="text-center mb-4"><i class="fas fa-lock"></i> Login</h2>
                        <?php if ($error): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i> Usuario o contraseña incorrectos
                            </div>
                        <?php endif; ?>
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label"><i class="fa-solid fa-user"></i> Usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button class="btn btn-primary w-100" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                        </form>
                        <hr>
                        <p class="text-center text-muted small">
                            <strong>Usuarios de prueba:</strong><br>
                            jalburgas / 12345<br>
                            admin / admin123<br>
                            usuario1 / pass123
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>