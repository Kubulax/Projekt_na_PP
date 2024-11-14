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
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kreator ofert</title>
        <link rel="stylesheet" href="css/uniform-style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="css/color-classes.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <?php
            require_once 'classes/pages/PlantOfferCreationPage.php';

            $PlantOfferCreationPage = PlantOfferCreationPage::instance();
        ?>
    </head>
    <body>
        <div class="container text-center mt-3 card shadow">
            <h1>Stwórz ofertę</h1>
            <p>Panel tworzenia ofert</p>
        </div>

        <form name='createPlantOfferForm'>
            <input type="number" class="collapse" hidden id="inputPlantId" name="plantId">
            <div class="container my-3 card shadow">
                <div class="row m-4">
                    <div class="col-md-6">
                        <img id="plantImage" src="null.png" class="img-fluid rounded" alt="Roślina" onerror="this.src='images/null.png';">
                        <br>
                        <label class="form-label mt-2">Zdjęcie:</label>
                        <input type="file" class="form-control" id="inputPlantImageFile" accept="image/*" name="image">
                        <div id="validationFeedback_inputImage" class="invalid-feedback">
                                            
                        </div>
                        <script>
                            const inputPlantImageFile = document.getElementById("inputPlantImageFile");
                            const plantImage = document.getElementById("plantImage");

                            inputPlantImageFile.onchange = evt => {
                                const [file] = inputPlantImageFile.files
                                if (file) {
                                    plantImage.src = URL.createObjectURL(file)
                                }
                            }
                        </script>                    
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted">Gatunek:</p>
                        <div class="mb-2">
                            <select id="selectCategory" class="form-select shadow-sm" name="categoryId">
                                <option class="collapse" id="selectedCategory" value selected>Gatunek rośliny</option>
                                <?php $PlantOfferCreationPage->render_plant_category_html_option_fields();?>
                            </select>
                            <div id="validationFeedback_inputCategoryId" class="invalid-feedback">
                                            
                            </div>
                        </div>
                        <p><strong>Nazwa:</strong></p>
                        <div class="mb-2">
                            <input type="text" class="form-control shadow-sm" id="inputName" placeholder="Nazwa" name="name">
                            <div id="validationFeedback_inputName" class="invalid-feedback">
                                            
                            </div>
                        </div>
                        <p><strong>Opis:</strong></p>
                        <div class="mb-2">
                            <textarea type="text" class="form-control shadow-sm" id="inputDescription" placeholder="Opis" name="description" rows="5"></textarea>
                            <div id="validationFeedback_inputDescription" class="invalid-feedback">
                                            
                            </div>
                        </div>
                        <h4>Wymagania pielęgnacyjne:</h4>
                        <div class="mb-2">
                            <textarea type="text" class="form-control shadow-sm" id="inputTreatment" placeholder="Opis wymagań pielęgnacyjnych" name="treatment"  rows="5"></textarea>
                            <div id="validationFeedback_inputTreatment" class="invalid-feedback">
                                            
                            </div>
                        </div>
                        <p><?php ?></p>
                        <p>Cena:</p>
                        <div class="mb-2">
                            <div class="input-group">
                                <input type="number" class="form-control shadow-sm rounded" min="0.01" step="0.01" id="inputPrice" placeholder="Cena" name="price">
                                <div class="input-group-text shadow-sm rounded">zł</div>
                                <div id="validationFeedback_inputPrice" class="invalid-feedback">
                                            
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center my-3 p-3 card shadow">
                <button type="submit" class="btn col-md-3 mb-2 mx-auto shadow ps-button">Stwórz ofertę</button>
                <button type="button" class="btn col-md-3 mx-auto shadow ps-blue-button" onclick="window.location.href = 'admin-panel.php';">Anuluj</button>
            </div>
        </form>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="ajax/createPlantOffer.js"></script>
        <script src="https://kit.fontawesome.com/09b95ca3a3.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>