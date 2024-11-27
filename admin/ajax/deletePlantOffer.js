function deletePlantOffer() {
    if(!$("input[name='plantId']").val())
    {
        $("#selectPlant").addClass("is-invalid");
        $("#validationFeedback_selectPlant").text("Nie wybrano oferty do edycji.");
        $(".is-invalid").on("change", function() {
            $(this).removeClass("is-invalid"); 
        });
        window.scrollTo(0, 0);
        return;
    }
    if (confirm("Czy na pewno chcesz usunąć wybraną ofertę?") == true) {
        let id = document.getElementById("selectPlant").value;
        let imageName = document.getElementById("inputPlantImageName").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Usunięto ofertę");
                window.scrollTo(0, 0);
                location.reload();      
            }
        };
        xmlhttp.open("GET", "ajax/deletePlantOffer.php?id=" + id + "&imageName=" + imageName, true);
        xmlhttp.send();
    } 
}