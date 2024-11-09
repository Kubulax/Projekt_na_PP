<?php
    $connect = mysqli_connect("localhost", "root", "", "plantshop");
    $query1 = "SELECT * FROM `plant_categories`";
    $plant_categories = mysqli_query($connect, $query1);
    $query2 = "SELECT * FROM `plants`";
    $plants = mysqli_query($connect,$query2);
    
?>

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
            </ul>
        </nav>
    </header>
    
    <div class="container-flex mt-5">
        <div class="row">
            <div class="col-4">
                <ul class="list-group m-5 brb-0">
                    <li class="list-group-item">
                        <p class="fs-3 text-center"> Filtry</p>
                    </li>
                    <li class="list-group-item"> 
                        <div class="d-flex flex-wrap">
                            <?php
                                while($row = $plant_categories->fetch_array()){
                                    echo "<span class='badge text-bg-none border border-2 text-black m-1 fs-5'>". $row['name'] ."</span>";
                                }
                            ?>
                        </div>
                    </li>
                   
                </ul>
            </div>
            <div class="col-8 flex-wrap d-flex">
                <?php
                while($row = $plants->fetch_array()){
                    ?>
                    <!-- template -->
                    <div class="col-lg-3 col-md-4 col-sm-6 m-2">
                        <a href="plantView_page.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                            <div class="card shadow-sm">
                                <img src="../images/<?php echo $row['image']; ?>" class="card-img-top" alt="Plant image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                    <p class="card-text text-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($row['description']); ?></p>
                                    <span class="text-success font-weight-bold"><?php echo number_format($row['price'], 2, ',', ' '); ?> PLN</span>
                                </div>
                            </div>
                        </a>
                    </div>
                <!-- template -->
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 Sklep z Roślinami</p>
    </footer>

    <script src="../js/script.js"></script>
    
</body>
</html>