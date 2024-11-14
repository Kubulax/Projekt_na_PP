$("form[name='editPlantOfferForm']").on("submit", function(ev) {
    ev.preventDefault();
    
    let badData = false;

    if(!$("input[name='plantId']").val())
    {
        $("#selectPlant").addClass("is-invalid");
        $("#validationFeedback_selectPlant").text("Nie wybrano oferty do edycji.");
        $(".is-invalid").on("change", function() {
            $(this).removeClass("is-invalid"); 
        });
        return;
    }

    if(!$("select[name='categoryId']").val())
    {
        $("select[name='categoryId']").addClass("is-invalid");
        $("#validationFeedback_inputCategoryId").text("Pole kategorii rośliny nie może być puste.");
        badData = true;
    }

    if(!$("input[name='name']").val())
    {
        $("input[name='name']").addClass("is-invalid");
        $("#validationFeedback_inputName").text("Pole nazwy rośliny nie może być puste.");
        badData = true;
    }

    if(!$("input[name='price']").val() || $("input[name='price']").val() == 0)
    {
        $("input[name='price']").addClass("is-invalid");
        $("#validationFeedback_inputPrice").text("Pole ceny rośliny nie może być puste lub równe zero.");
        badData = true;
    }
    
    $(".is-invalid").on("keydown", function() {
        $(this).removeClass("is-invalid"); 
    });

    $(".is-invalid").on("change", function() {
        $(this).removeClass("is-invalid"); 
    });

    if(badData)
    {
        return;
    }
  
    var formData = new FormData(this);
      
    $.ajax({
      url: "ajax/editPlantOffer.php",
      type: "POST",
      data: formData,
      success: function (response) {
        if(response * 1)
        {
            alert("Zedytowano ofertę.");
            location.reload();
        }
        else
        {
            alert("Wystąpił błąd podczas edycji oferty.");
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });
      
});