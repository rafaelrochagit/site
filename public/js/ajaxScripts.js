/**
 * Paginação testemunhos
 */

function carregarPaginaTestemunho(pagina) {
    $.ajax({
        'url': BASE_URL + "/ajax/ajaxcontroller/ajaxTestemunhoNewPage",
        'type': 'POST',
        'data': {'pagina': pagina},
        'success': function (data) {
            var result = data;
            var setas = $('.setas');
            var next = $('.next');
            var prev = $('.prev');
            var total = $('#total').val();
            var regPorPag = $('#regPorPag').val();
            if (!(prev.length)) {
                prev = "<div class='prev'></div>"
                        + "<script>"
                        + "$('.prev').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text()) - 2;"
                        + 'carregarPaginaTestemunho(page);'
                        + '});'
                        + '</script>';
                setas.append(prev);
            } else if (pagina <= 0) {
                prev.remove();
            }

            if (next.length && ((pagina + 1) * regPorPag) >= total) {
                next.remove();
            } else if (!next.length) {
                next = "<div class='next'></div>"
                        + "<script>"
                        + "$('.next').on('click', function () {"
                        + " var page = parseInt($('.texto_paginacao_pgatual').text());"
                        + 'carregarPaginaTestemunho(page);'
                        + '});'
                        + '</script>';
                setas.append(next);
            }
            var test = $('#testemunhos');
            test.empty();
            test.append(result);
        }
    });

}
$(document).ready(function () {
    $(".next").on("click", function () {
        var page = parseInt($('.texto_paginacao_pgatual').text());
        carregarPaginaTestemunho(page);
    });
});