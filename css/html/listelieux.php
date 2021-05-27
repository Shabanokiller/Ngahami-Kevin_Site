<?php
    session_start();
    // require_once 'receiveVisite.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title> PAGE DE RECENSEMENT</title>
<head>
<body>
    <?php
    
    echo "Bonjour " . $_SESSION["user"]["email"] ;
    
    ?>
    <!-- <div id="container">
        <form>
            <div id="row">
                <div id="sous-row">
                    <div id="form-group">
                
                    </div>
                </div>
            </div>
        </form>
    </div> -->
    <script src="./js/ajax.js"></script>
</body>
</html>