$(function () {
    
    $('#fone').mask('(00) 0000-00009');
    $('#fone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('#fone').mask('(00) 00000-0009');
        } else {
            $('#fone').mask('(00) 0000-00009');
        }
    });

    // $('.open_filter').on('click', function (event) {
    //     event.preventDefault();

    //     box = $(".form_advanced");
    //     button = $(this);

    //     if (box.css("display") !== "none") {
    //         button.text("Filtro Avançado ↓");
    //     } else {
    //         button.text("✗ Fechar");
    //     }

    //     box.slideToggle();
    // });

    // $('body').on('change', 'select[name*="filter_"]', function () {

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     var search = $(this);
    //     var nextIndex = $(this).data('index') + 1;

    //     $.post(search.data('action'), {search: search.val()}, function(response){

    //             if(response.status === 'success') {

    //                 $('select[data-index="' + nextIndex + '"]').empty();

    //                 $.each(response.data, function(key, value){
    //                     $('select[data-index="' + nextIndex + '"]').append(
    //                         $('<option>', {
    //                             value: value,
    //                             text: value
    //                         })
    //                     );
    //                 });

    //                 $.each($('select[name*="filter_"]'), function(index, element){

    //                     if($(element).data('index') >= nextIndex + 1){
    //                         $(element).empty().append(
    //                             $('<option>', {
    //                                 text: 'Selecione o filtro anterior',
    //                                 disabled: true
    //                             })
    //                         );
    //                     }

    //                 });

    //                 $('.selectpicker').selectpicker('refresh');
    //             }

    //             if(response.status === 'fail') {

    //                 if($(element).data('index') >= nextIndex){
    //                     $(element).empty().append(
    //                         $('<option>', {
    //                             text: 'Selecione o filtro anterior',
    //                             disabled: true
    //                         })
    //                     );
    //                 }

    //                 $('.selectpicker').selectpicker('refresh');
    //             }

    //         }, 'json');
    //     });

});