<!DOCTYPE html>
<html>

<head>
    <title>Negación de Acceso</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div id="access-denied">
        <i class="fas fa-exclamation-triangle"></i>
        <h1>Acceso Denegado</h1>
        <p>No tienes los permisos necesarios para acceder a esta página.</p>
    </div>

    <script src="script.js"></script>
</body>

</html>
<style>
    #access-denied {
        text-align: center;
        margin-top: 200px;
    }

    #access-denied h1 {
        color: red;
    }

    #access-denied p {
        font-size: 18px;
    }

    #access-denied i {
        font-size: 48px;
        color: red;
        margin-bottom: 20px;
    }
</style>