function getPlantOffer(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
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