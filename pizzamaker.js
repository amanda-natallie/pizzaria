/*Cookies para serem usados nas validações*/
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/*Tamanho*/

$(".btnTamanho").click(function () {
    var tamanho = $(this).data("tamanho");
    var nomeDoTamanho = $(this).data("nometam");
    var qtdFatias = $(this).data("qtdfatias");


    /*SETA VARIAVEIS PARA SEREM USADAS DEPOIS*/
    $("#NOMEtamanho").val(nomeDoTamanho);
    $("#QTDFATIAStamanho").val(qtdFatias);
    $("#tamanho").val(tamanho);

    setCookie("_Tamanho", tamanho, 40);
    setCookie("_nomeTamanho", nomeDoTamanho, 40);
    setCookie("_fatiasTamanho", qtdFatias, 40);

    $("#divTamanho").hide("slow");
    $("#Passo2").show("slow");

    /*configura TR de tamanho no carrinho*/
    $("#imgTam").attr("src", "images/pizza" + tamanho + ".png");
    $("#nomeTamCart").append(nomeDoTamanho);
    if (qtdFatias === "1") {
        $("#FatiasTamCart").append(qtdFatias + " Fatia");
    } else {
        $("#FatiasTamCart").append(qtdFatias + " Fatias");
    }
    $("#CARTtamanho").show("slow");


});

/* mostra o passo 2 caso exista dados nos cookies */
var _tamanho = getCookie("_tamanho");
if (_tamanho !== "") {
    var tam = $("#tamanho").val();
    $("#Passo2").show("slow");
}


$(".btnFatias").click(function () {
    var QTDsabores = $(this).data("qtdfatias");
    $("#QTDsabor").val(QTDsabores);
    setCookie("_QTDsabor", QTDsabores, 40);

    /*Adiciona no carrinho as configurações de sabor*/
    $("#imgSab").attr("src", "images/pizza" + QTDsabores + "Fatias.png");
    if (QTDsabores === "1") {
        $("#nomeSab").text(QTDsabores + " Sabor");
    } else {
        $("#nomeSab").text(QTDsabores + " Sabores");
    }
    /* Depois de adicionar, mostra a row da tabela da quantidade de sabores*/
    $("#CARTsabores").show("slow");

    /* Esconde todas as outras divs menos a que contem o sabor escolhido */
    $("#DIV" + QTDsabores + "sabores").removeClass("col-lg-3 col-md-3 col-sm-6").addClass("col-lg-12 col-md-12 col-sm-12 pull-left").siblings("div").hide("slow");
    $("#saboresWrapper").removeClass("col-lg-12").addClass("col-md-3");
    $("#escolherSabores").removeAttr("style").show("slow");
    $("#infoP").show("slow");

    var $owl = $('.sabores').owlCarousel({
        margin: 30,
        loop: true,
        nav: true,
        dots: false,
        autoplay: false,
        navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>'],
        items: 3
    });
    $owl.trigger('refresh.owl.carousel');
});



/*resetando montador*/
$("#resetar").click(function () {
    $.ajax({
        type: "POST",
        url: "clearCookies.php",
        success: function () {
            location.reload();
        }
    });
});