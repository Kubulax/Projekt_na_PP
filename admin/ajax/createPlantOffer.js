$("form[name='createPlantOfferForm']").on("submit", function(ev) {
    ev.preventDefault();
    
    let badData = false;

    if(!$("input[name='image']").val())
    {
        $("input[name='image']").addClass("is-invalid");
        $("#validationFeedback_inputImage").text("Pole zdjęcia rośliny nie może być puste.");
        badData = true;
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

    if(!$("input[name='price']").val() || $("input[name='price']").val() > 99999999.99)
    {
        $("input[name='price']").addClass("is-invalid");
        $("#validationFeedback_inputPrice").text("Podana cena jest za duża.");
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
        window.scrollTo(0, 0);
        return;
    }
  
    var formData = new FormData(this);
      
    $.ajax({
      url: "ajax/createPlantOffer.php",
      type: "POST",
      data: formData,
      success: function (response) {
        if(response * 1)
        {
            alert("Dodano ofertę.");
            window.scrollTo(0, 0);
            location.reload();    
        }
        else
        {
            alert(response);
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });
      
});