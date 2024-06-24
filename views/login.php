<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="controllers/autenticar.php" method="post">
            <h1>Login</h1>
            <div>
                <label for="nome">Name:</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="nivel">Acess Password:</label>
                <input type="password" name="nivel" id="nivel">
            </div>
            <section>
                <button type="submit">Login</button>
            </section>
        </form>
    </main>
</body>
</html>
