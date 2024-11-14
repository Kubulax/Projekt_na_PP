<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep z Roślinami</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Sklep z Roślinami</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/search_page.php">Katalog Roślin</a></li>
                <li><a href="pages/contact_page.php">Kontakt</a></li>
                <li><a href="admin/admin-log-in-page.php">Zarządzaj</a></li>
            </ul>
        </nav>
    </header>

    <section id="home">
        <h2>Witamy w naszym sklepie z roślinami!</h2>
        <p>Znajdziesz tutaj szeroki wybór roślin domowych, ogrodowych oraz dodatków do pielęgnacji.</p>
    </section>

    <section id="catalog">
        <h2>Katalog Roślin</h2>
        <div class="plant-grid">
            <!-- Przykładowe karty roślin -->
            <div class="plant-card">
                <img src="https://homejungle.club/wp-content/uploads/monstera-deliciosa-dziurawa-na-paliku-xxl-homejungleclub-600x600.jpeg.webp" height="150" width="150" alt="Roślina 1">
                <h3>Monstera</h3>
                <p>Cena: 50 zł</p>
            </div>
            <div class="plant-card">
                <img src="https://www.cocaflora.com/userdata/public/news/images/68.jpg" height="150" width="150" alt="Roślina 2">
                <h3>Fikus</h3>
                <p>Cena: 40 zł</p>
            </div>
            <div class="plant-card">
                <img src="https://bunny-wp-pullzone-4tbe90pthw.b-cdn.net/wp-content/uploads/2022/10/Pastelowy-wielkanocny-planer-z-lista-zadan-i-planem-wielkiego-tygodnia-do-druku-A4-1024%C3%97768-mm-9-1050x788.png" height="150" width="150" alt="Roślina 3">
                <h3>Storczyk</h3>
                <p>Cena: 35 zł</p>
            </div>
            
        </div>
    </section>

    <section id="contact">
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
