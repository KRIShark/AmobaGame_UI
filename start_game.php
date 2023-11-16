<?php

# Start the session
session_start();

if ($_SESSION["api"] == null){
    $_SESSION["api"] = new AmobaGameAPI("http://5.75.166.91:5555");
}

# if post from a form is snet the id 
if (isset($_POST["join_id"])){
    $id = $_POST["join_id"];
    $api = $_SESSION["api"];

    if ($id == "None"){
        # Create a new game
        # Redirect to the game page

        $_SESSION["join_id"] = $api -> startGame();

        header("Location: game.php");
    } else {
        # Join the game
        # Redirect to the game page

        if ($api -> isGameExists($id))
        {
            $_SESSION["join_id"] = $_POST["join_id"];

            header("Location: game.php");
        }
        else
        {
            $_POST["join_id"] = null;

            header("Location: index.php");
            session_destroy();
        }
    }
}
else
{
    header("Location: index.php");
    session_destroy();
}

?>
