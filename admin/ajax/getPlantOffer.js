function getPlantOffer(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("inputPlantId").disabled = false;
            document.getElementById("inputPlantImageName").disabled = false;
            document.getElementById("inputPlantImageFile").disabled = false;
            document.getElementById("selectCategory").disabled = false;
            document.getElementById("inputName").disabled = false;
            document.getElementById("inputDescription").disabled = false;
            document.getElementById("inputTreatment").disabled = false;
            document.getElementById("inputPrice").disabled = false;

            var plant = JSON.parse(this.responseText);
            document.getElementById("inputPlantId").value = id;
            document.getElementById("plantImage").src = "../images/" + plant["image"];
            document.getElementById("inputPlantImageName").value = plant["image"];
            document.getElementById("selectedCategory").innerText = plant["category"];
            document.getElementById("selectedCategory").value= plant["categoryId"];
            document.getElementById("inputName").value = plant["name"];
            document.getElementById("inputDescription").innerText = plant["description"];
            document.getElementById("inputTreatment").innerText = plant["treatment"];
            document.getElementById("inputPrice").value = plant["price"];
        }
    };
    xmlhttp.open("GET", "ajax/getPlantOffer.php?id=" + id, true);
    xmlhttp.send();
}