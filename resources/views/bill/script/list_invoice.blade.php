<script>
$('.allClick').click(function() {

    $('.click').click();




});
var idjson = [];

function clickInvoice() {

    $('.click').each(function() {
        let checked = $(this)[0].checked;
        if (checked === true) {



            idjson.push($(this).val());

        }


    });

    jQuery.ajax({
        url: "{{ url('/update-status') }}",
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





$('.click').click(function() {
    let idView = [];
    let checked = $(this)[0].checked;
    if (checked === true) {



        idView.push($(this).val());

    }

    let id = idView[0];
    if (id != undefined) {
        //console.log('tt',id);

        let url = `<a  class="text-red"  id="clickNew" href="{{url('list-createPDF/${id}')}}"   target="_blank" >ดูตัวอย่างใบเเจ้งหนี้</a>`;
       
        document.getElementById("clickNew").innerHTML = url;
    }else{
        document.getElementById("clickNew").innerHTML = '<a  class="text-red"  id="clickNew"    >ดูตัวอย่างใบเเจ้งหนี้</a>';
    }

});
/*
        if (idView.length > 0 && idView.length < 2) {
            console.log("id",idView);
        }else {
            //console.log("id,kss",idView);
            $("#errorClick").html('กดเลือกได้ที่ละ 1 บิล');
        }*/






</script>