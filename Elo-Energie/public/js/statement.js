//-------------------------------
//       Initialisation
//-------------------------------

if($('#formNewPylonA').find('span.text-danger').length==0){
    $('#formNewPylonA').hide();

}else{
    $('#newPylonA').prop( "checked", true );
    $('#pylonA').parent().hide()
}

if($('#formNewPylonB').find('span.text-danger').length==0){
    $('#formNewPylonB').hide();

}else{
    $('#newPylonB').prop( "checked", true );
    $('#pylonB').parent().hide()
}

$('.spinner-grow').hide();

document.getElementById("nom").disabled = true;



//-------------------------------
//            Event
//-------------------------------

$('#data').change(function () {
    $('#nom').val($("#data")[0].files[0].name);
    document.getElementById("nom").disabled = false;
});

$('#newPylonA, #newPylonB').click(function () {
    $(this).parent().prev('div').toggle();
    $(this).parent().next('div').toggle();
});

$('#pylonA, #pylonB').on('keyup', function () {
    if ($('#pylonA').val() == $('#pylonB').val()){
        $('#pylonA').addClass('is-invalid');
        $('#pylonB').addClass('is-invalid');
    }else{
        $('#pylonA').removeClass('is-invalid');
        $('#pylonB').removeClass('is-invalid');
    }
});

$('form').submit(function () {
    $('.spinner-grow').show();
    $('.spinner-grow').prev().prop('disabled', true);
    $('.spinner-grow').prev().text('Chargement en cours ...');
});