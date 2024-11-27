<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep z Roślinami</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Sklep z Roślinami</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="search_page.php">Katalog Roślin</a></li>
                <li><a href="contact_page.php">Kontakt</a></li>
                <li><a href="shopping_card.php">Koszyk</a></li>
                <li><a href="../admin/admin-log-in-page.php">Zarządzaj</a></li>
            </ul>
        </nav>
    </header>

    <section id="home">
        <h2>Witamy w naszym sklepie z roślinami!</h2>
        <p>Znajdziesz tutaj szeroki wybór roślin domowych, ogrodowych oraz dodatków do pielęgnacji.</p>
    </section>

    <section id="catalog">
        <h2>Koszyk</h2> 
        <div>
            <?php
            $shoppingBag = '';

            if (isset($_GET['delete'])) {
                $deleteId = intval($_GET['delete']);
                if (isset($_COOKIE["shoppingCart"])) {
                    $cookieData = stripslashes($_COOKIE["shoppingCart"]);
                    $shoppingBag = json_decode($cookieData, true);

                    $shoppingBag = array_filter($shoppingBag, function ($item) use ($deleteId) {
                        return $item['id'] !== $deleteId;
                    });

                    setcookie("shoppingCart", json_encode(array_values($shoppingBag)), time() + (86400 * 30), "/");
                    header("Location: shopping_card.php");
                    exit();
                }
            }

            if (isset($_COOKIE["shoppingCart"]) || !empty($shoppingBag)) {
                $cookieData = stripslashes($_COOKIE["shoppingCart"]);
                $shoppingBag = json_decode($cookieData, true);

                    echo "<ul>";
                    foreach ($shoppingBag as $item) {
                        echo "<li>{$item['product']} - Ilość: {$item['quantity']}, Koszt: " . number_format($item['totalCost'], 2) . " zł 
                        <a href='shopping_card.php?delete={$item['id']}'>Usuń</a></li>";
                    }
                    echo "</ul>";
            } else {
                echo "<p>Twój koszyk jest pusty.</p>";
            }

            ?>
        </div>
            
    </section>

    <section id="contact" style="height: 430px">
        <h2>Kontakt</h2>
        <p>Email: kontakt@sklepzroslinami.pl</p>
        <p>Telefon: 123 456 789</p>
        <p>Adres: ul. Zielona 15, 00-000 Miasto</p>
    </section>

    <footer>
        <p>&copy; 2023 Sklep z Roślinami</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
