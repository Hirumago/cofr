$(document).ready(function(){
    let first_button = $("#test button:first-of-type");
    let second_button = $("#test button:nth-of-type(2)");

    first_button.click(function () {
        $.ajax({
            url: "ajax/lettres.php?entrainement=true",
            method: "GET"
        })
            .done(function (response) {
                $("#test-area").html(response);
                let nb_lignes_reponse = $(".ligne-reponse").length;
                $(".ligne-reponse:not(:first-of-type)").hide();

                let reponses = [];

                let step = 1;

                $("#validation").click(function(){
                    let input = $('.ligne-reponse:nth-of-type('+step+') input')[0];
                    let reponse = input.value;

                    let coreen = $(input).parent().parent().first().text().trim();
                    console.log(coreen)
                    if (reponse.length > 0 && reponse !== "" && nb_lignes_reponse === step){
                        reponses[step] = coreen+"-"+reponse;
                        reponses = reponses.slice(1);
                        $(".ligne-reponse:nth-of-type("+step+")").hide();
                        step++;
                        $("#tableau-lettres").hide();

                        $.ajax({
                            url: "ajax/lettres.php?entrainement=true",
                            method: "POST",
                            data: "reponses="+JSON.stringify(reponses)
                        })
                            .done(function (response) {
                                $("#test-area").html(response)
                            })
                            .fail(function (error) {
                                $("#test-area").html(
                                    "<p class='error'>Un problème est survenu, veuillez contacter un administrateur si le problème persiste.</p>"
                                );
                            })
                    }
                    else if (reponse.length > 0 && reponse !== ""){
                        reponses[step] = coreen+"-"+reponse;
                        $(".ligne-reponse:nth-of-type("+step+")").hide();
                        step++;
                        $(".ligne-reponse:nth-of-type("+step+")").show();
                    }
                    $(".ligne-reponse:nth-of-type("+step+") input").focus();

                });
            })
            .fail(function (error) {
                $("#test-area").html(
                    "<p class='error'>Un problème est survenu, veuillez contacter un administrateur si le problème persiste.</p>"
                );
            })
    });

    second_button.click(function () {
        $.ajax({
            url: "ajax/lettres.php?tableau_entier=true",
            method: "GET"
        })
            .done(function (response) {
                $("#test-area").html(response);
            })
            .fail(function (error) {
                $("#test-area").html(
                    "<p class='error'>Un problème est survenu, veuillez contacter un administrateur si le problème persiste.</p>"
                );
            })
    });
})