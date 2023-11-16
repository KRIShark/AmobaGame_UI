<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amöba Game</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php
        session_start();
        if ($_SESSION["api"] == null){
            $_SESSION["api"] = new AmobaGameAPI("http://5.75.166.91:5555");
        }
    ?>

    <header>
        <!-- Navbar or Header Content -->
    </header>

    <main>
        <!-- Main content about Amöba Game -->
        <div class="container mt-5">
            <h1>Welcome to Amöba Game</h1>
            <p>Description and details about the game.</p>
            <!-- Add more content here -->

            <!-- Buttons -->
            <div class="mt-4">
                <form action="start_game.php", method="post">
                    <h1>Enter noting if you want to create an new game</h1>
                    <p>Enter the id to join the game</p>
                    <input type="text" name="join_id" placeholder="enter the id" value="None">
                    <input type="submit" value="Create Game">
                </form>
            </div>

        </div>
    </main>

    <footer>
        <!-- Footer Content -->
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
