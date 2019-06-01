
$('#ligneName').change(function () {
   if ($(this).is(':checked')){
       $('#ligne_p_B').val($('#ligne_p_A').val());
       $('#ligne_p_B').attr('disabled', 'disabled');
   }else{
       $('#ligne_p_B').removeAttr('disabled');
   }
});

$('#ligne_p_A').on('keyup', function () {
    if ($('#ligneName').is(':checked')){
        $('#ligne_p_B').val($('#ligne_p_A').val());
    }
});