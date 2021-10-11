<script>
$('.allClick-cha').click(function() {

    $('.click-cha').click();




});
var idjson = [];

function clickInvoice() {

    $('.click-cha').each(function() {
        let checked = $(this)[0].checked;
        if (checked === true) {



            idjson.push($(this).val());

        }


    });

    jQuery.ajax({
        url: "{{ url('#') }}",
        method: 'post',
        data: {
            "_token": "{{ csrf_token() }}",
            idjson,

        },
        success: function(data) {
            valid = data.status;
          
            location.replace("list-invoice");


        },
        error: function(data) {
            
           $("#errorCheckbox").html('กรุณากด Click Checkbox');
        }

    });

    console.log(idjson);


}
</script>