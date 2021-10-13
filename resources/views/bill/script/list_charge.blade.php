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
/*
    jQuery.ajax//({
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

    console.log(idjson);*/
    
}



    
let idView = [];

$('.click-cha').click(function() {
    let checked = $(this)[0].checked;
    if (checked === true) {

      
                idView.push($(this).val());


    }


/*
  // let id = idView;
   console.log(//'tt',groupBy())
    if (id != undefined) {
   
      
       
       let  urlEmail = `<a  class="text-white"  id="getMail" href="{{url('get-mail/${id}')}}"    >ส่งใบเเจ้งหนี้ทางอีเมล</a>`
        document.getElementById("getMail").innerHTML = urlEmail;
    }else{
        document.getElementById("getMail").innerHTML = `<a  class="text-white" href="{{url('get-mail')}}" id="getMail" >ส่งใบเเจ้งหนี้ทางอีเมล</a>` ;
    }*/

});


$("#getMail").click(function() {
    jQuery.ajax({
        url: "{{ url('get-mailGroup') }}",
        method: 'post',
        data: {
            "_token": "{{ csrf_token() }}",
            idView,

        },
        success: function(data) {
            valid = data.messageEmail;

            console.log(valid);
            $("#messageEmail").html(valid);
            location.replace("list-charge");


        },
        error: function(data) {
            
           $("#errorCheckbox").html('กรุณากด Click Checkbox');
        }

    });

});

</script>