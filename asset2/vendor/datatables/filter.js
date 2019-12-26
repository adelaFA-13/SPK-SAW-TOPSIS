
function fnFilterJenisPaket(){
    alert("woy");
    var actualValue= $('.jenis_paket').val();
    var expectedValue=["Haji","Umrah"];
    var jenisPaketColumnIndex=4;

    if(expectedValue.includes(actualValue)){
        $('#dataTable').dataTable().fnFilter()(
            actualValue,
            jenisPaketColumnIndex
        );
    }
    
}

$(document).ready(function(){
    $('#jenisPaketSubmitButton').click(function(){
        fnFilterJenisPaket();
    });

});
