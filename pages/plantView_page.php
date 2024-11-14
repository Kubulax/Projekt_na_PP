<?php
     $connect = mysqli_connect("localhost", "root", "", "plantshop");
     $query1 = "SELECT * FROM `plants` WHERE ID = '". $_GET['id'] ."'";
     $plant = mysqli_query($connect, $query1)->fetch_array();
     $query2 = "SELECT * FROM `plant_categories` where id = '". $plant['plant_categoires_id'] ."'";
     $category = mysqli_query($connect, $query2)->fetch_array();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły Rośliny</title>
    <!-- Link do Bootstrapa (z CDN) -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Nagłówek -->
    <header>
        <h1>Sklep z Roślinami</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="search_page.php">Katalog Roślin</a></li>
                <li><a href="contact_page.php">Kontakt</a></li>
                <li><a href="pages/shopping_card.php">Koszyk</a></li>
            </ul>
        </nav>
    </header>

    <div class="container text-center mt-5">
        <h1>Szczegóły Rośliny</h1>
        <p>Wszystko, co musisz wiedzieć o tej roślinie!</p>
    </div>

    <div class="container my-5">
        <!-- Szczegóły rośliny -->
        <div class="row">
            <div class="col-md-6">
                <!-- Duże zdjęcie rośliny -->
                <img src="../images/<?php echo $plant['image']; ?>" class="img-fluid rounded" alt="Roślina">
            </div>
            <div class="col-md-6">
                <!-- Szczegóły rośliny -->
                <h2><?php echo $plant['name'] ?></h2>
                <p class="text-muted">Gatunek: <?php echo $category['name'] ?></p>
                <p><strong>Opis:</strong> <?php echo $plant['description'] ?></p>

                <h4>Wymagania:</h4>
                <ul>
                    <li><strong>Światło:</strong> Słoneczne</li>
                    <li><strong>Wilgotność:</strong> Umiarkowana</li>
                    <li><strong>Wysokość:</strong> 50 cm</li>
                    <li><strong>Okres kwitnienia:</strong> Wiosna</li>
                </ul>
                <h4>Jak traktować roślinę?</h4>
                <p><?php echo $plant['treatment']?></p>
                <p>Cena: <span class="text-success font-weight-bold"><?php echo number_format($plant['price'], 2, ',', ' '); ?> PLN</span></p>
            </div>
        </div>

        <!-- Możliwe inne sekcje, np. opinie użytkowników -->
        
    </div>

</body>

</html>
