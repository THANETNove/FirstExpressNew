<script>
$('.click-cha').click(function() {
    let idView = [];
    let checked = $(this)[0].checked;
    if (checked === true) {



        idView.push($(this).val());

    }

    let id = idView[0];
    dd(id);
    if (id != undefined) {
        //console.log('tt',id);
        
        let urlPDF = `<a  class="text-red"  id="clickNew" href="{{url('list-createPDF/${id}')}}"   target="_blank" >ดูตัวอย่างใบเเจ้งหนี้</a>`;
       let  url = `<a  class="text-red"  id="clickNew" href="{{url('charge/${id}')}}"   target="_blank" >ดูตัวอย่างใบเเจ้งหนี้</a>`
        document.getElementById("clickNew").innerHTML = url;
    }else{
        document.getElementById("clickNew").innerHTML = '<a  class="text-red"  id="clickNew"    >ดูตัวอย่างใบเเจ้งหนี้</a>';
    }

});
</script>