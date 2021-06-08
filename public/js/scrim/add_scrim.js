$(document).ready(function() {

    $("#time").change(function(){
        loadPlayer($(this).val());      
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

function loadPlayer(idGroup){

    $.ajax({
        
        url:APP_URL + '/scrim/time',
        type:"get",
/*         data: {
            "_token": "{{ csrf_token() }}",
            "idGroup": idGroup
            }, */
        // dataType: 'json',
        success: function(reponse){
            console.log(reponse);
        }
    });

}
    
