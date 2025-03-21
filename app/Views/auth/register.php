<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <h2>Registrazione</h2>
        <form action="Auth/doRegister" method="post">
            <input type="text" name="nome" class="form-control mb-2" placeholder="Nome" required>
            <input type="text" name="cognome" class="form-control mb-2" placeholder="Cognome" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Registrati</button>
        </form>
        <form action="Auth/login" method="post">
            <button type="submit" class="btn btn-link">Hai già un account? Accedi</button>
        </form>
    </div>
</body>
</html>
