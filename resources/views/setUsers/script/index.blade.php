<script>
$("#customSwitch1").change(function() {

    let checked = $(this)[0].checked;

    if (checked === true) {
        $('.manage-users').removeAttr("disabled", "false");
        $("#customSwitch1").prop("checked", true);
        $('.manage-users').prop("checked", true);

    } else {
        $('.manage-users').prop("checked", false);
        $("#customSwitch1").prop("checked", false);
        $('.manage-users').attr("disabled", "true");

    }

});


$("#customSwitch7").change(function() {

    let checked = $(this)[0].checked;

    if (checked === true) {
        $('.manage-account').removeAttr("disabled", "false");
        $("#customSwitch7").prop("checked", true);
        $('.manage-account').prop("checked", true);

    } else {
        $('.manage-account').prop("checked", false);
        $("#customSwitch7").prop("checked", false);
        $('.manage-account').attr("disabled", "true");

    }

});

$("#customSwitch11").change(function() {

    let checked = $(this)[0].checked;

    if (checked === true) {
        $('.settings').removeAttr("disabled", "false");
        $("#customSwitch11").prop("checked", true);
        $('.settings').prop("checked", true);

    } else {
        $('.settings').prop("checked", false);
        $("#customSwitch11").prop("checked", false);
        $('.settings').attr("disabled", "true");

    }

});


$("#submitCkik").click(function() {
  let rolename  =  jQuery('#rolename').val();
  let scripting = jQuery('#scripting').val();
  let switch1 =   jQuery('#customSwitch1')[0].checked;
  let switch2 =   jQuery('#customSwitch2')[0].checked;
  let switch3 =   jQuery('#customSwitch3')[0].checked;
  let switch4 =   jQuery('#customSwitch4')[0].checked;
  let switch5 =   jQuery('#customSwitch5')[0].checked;
  let switch6 =   jQuery('#customSwitch6')[0].checked;
  let switch7 =   jQuery('#customSwitch7')[0].checked;
  let switch8 =   jQuery('#customSwitch8')[0].checked;
  let switch9 =   jQuery('#customSwitch9')[0].checked;
  let switch10 =   jQuery('#customSwitch10')[0].checked;
  let switch11 =   jQuery('#customSwitch11')[0].checked;
  let switch12 =   jQuery('#customSwitch12')[0].checked;
  let switch13 =   jQuery('#customSwitch13')[0].checked;
  let switch14 =   jQuery('#customSwitch14')[0].checked;
  let switch15 =   jQuery('#customSwitch15')[0].checked;
  let switch16 =   jQuery('#customSwitch16')[0].checked;
    if (rolename !== ""  ) {

        if (scripting !== "" ) {

            jQuery.ajax({
            url: "{{ url('setUp-switch') }}",
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                rolename,
                scripting,
                switch1,
                switch2,
                switch3,
                switch4,
                switch5,
                switch6,
                switch7,
                switch8,
                switch9,
                switch10,
                switch11,
                switch12,
                switch13,
                switch14,
                switch15,
                switch16,
            },
            success: function(data) {
                valid = data.message;
                console.log(valid);
               // $('#massageData').html(valid);
                //  location.replace("{{ url('customer') }}");
            },
        });
            
        }else {
            $("#scripting").css("solid");
             $("#scripting").css("border-color", "#FF0000");
        }
      
    }else{
        $("#rolename").css("solid");
        $("#rolename").css("border-color", "#FF0000");
       
    }

});
</script>