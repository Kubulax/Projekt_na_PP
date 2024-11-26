<?php
    require_once 'classes/session/SessionManager.php';
?>
<?php
    $session = SessionManager::get_currently_running_session_object();

    if($session === null)
    {
        header('Location: admin-log-in-page.php');
        exit();
    }
?>
<?php
    if(isset($_POST["logOut"]))
    {
        SessionManager::stop_session();
        header('Location: admin-log-in-page.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel Administratora</title>
        <link rel="stylesheet" href="css/uniform-style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="css/color-classes.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <h1>Sklep z Roślinami</h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../pages/search_page.php">Katalog Roślin</a></li>
                    <li><a href="../pages/contact_page.php">Kontakt</a></li>
                    <li><a href="../pages/shopping_card.php">Koszyk</a></li>
                    <li><a href="admin-log-in-page.php">Zarządzaj</a></li>
                </ul>
            </nav>
        </header>
        <section style="min-height: 1000px">
            <div class="container text-center mt-3 card shadow">
                <h1>Panel Administratora</h1>
                <form action="admin-panel.php" method="POST">
                    <button type="submit" name="logOut" class="btn col-md-3 mb-2 mx-auto shadow ps-button">Wyloguj</button>
                </form>
            </div>
            <div class="container text-center my-3 p-3 card shadow">
                <h2>Zarządzaj sklepem</h2>
                <button class="btn col-md-3 mb-2 mx-auto shadow ps-button" onclick="window.location.href = 'plant-offer-creation-page.php';">Stwórz ofertę</button>
                <button class="btn col-md-3 mb-2 mx-auto shadow ps-button" onclick="window.location.href = 'plant-offer-modification-page.php';">Edytuj oferty</button>     
            </div>
        </section>
        <footer>
            <p>&copy; 2023 Sklep z Roślinami</p>
        </footer>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="ajax/createPlantOffer.js"></script>
        <script src="https://kit.fontawesome.com/09b95ca3a3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>