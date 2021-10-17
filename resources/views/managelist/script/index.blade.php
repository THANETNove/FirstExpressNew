<script>

function contactTab() {

    $("#pills-contact-tab").trigger('click');

}

function profileTab() {

$("#pills-profile-tab").trigger('click');

}

function contactTabEdit(x) {
    let id = x;


    jQuery.ajax({
            url: "{{ url('manage-edit') }}",
            method: 'post',
            data: {
                "_token": "{{csrf_token() }}",
                id,
  
            },
            success: function(data) {
                id = data.message.id;
                name = data.message.conditionName;
                begin = data.message.begin;
                end = data.message.end;
                area = data.message.area;
                transport = data.message.scheduledTransport;

                document.getElementById("eName").value = name;
                document.getElementById("eBegin").value = begin;
                document.getElementById("eEnd").value = end;
                document.getElementById("eArea").value = area;
                document.getElementById("eTransport").value = transport;
                document.getElementById("eId").value = id;

      
            },
        });
         

$("#pills-contactEdit-tab").trigger('click');


}
</script>