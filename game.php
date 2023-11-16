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
    <header>
        <!-- Navbar or Header Content -->
    </header>

    <main>
        <!-- Main content about Amöba Game -->
        <div class="container mt-5">
            <h1>Welcome to Amöba Game</h1>
            
            <?php
            
                session_start();
                if ($_SESSION["api"] == null){
                    $_SESSION["api"] = new AmobaGameAPI("http://5.75.166.91:5555");
                }
        
                if (!isset($_SESSION["join_id"])){
                    
                    session_destroy();
                    header("Location: index.php");
                }

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_POST['row']) && isset($_POST['col'])) {
                        // Process the received position
                        $row = $_POST['row'];
                        $col = $_POST['col'];
                        echo "Button at row $row, column $col was clicked.<br>";
                    }
                }

                // Define the number of rows and columns
                $rows = 5; // number of rows
                $cols = 5; // number of columns

                echo "<table border='1'>"; // Start the table with a border

                // Outer loop for rows
                for($r = 1; $r <= $rows; $r++){
                    echo "<tr>"; // Start a new row

                    // Inner loop for columns
                    for($c = 1; $c <= $cols; $c++){
                        echo "<td>"; // Start a new cell
                        // Create a form with a button inside the cell
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='row' value='$r'>";
                        echo "<input type='hidden' name='col' value='$c'>";
                        echo "<input type='submit' value='Button $r-$c'>";
                        echo "</form>";
                        echo "</td>"; // Close the cell
                    }

                    echo "</tr>"; // Close the row
                }

                echo "</table>"; // Close the table 
            
            ?>

        </div>
    </main>

    <footer>
        <!-- Footer Content -->
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
