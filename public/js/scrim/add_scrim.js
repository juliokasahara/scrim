$(document).ready(function() {

    $("#grupo").change(function(){
        loadPlayer($(this).val());      
    });

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    //     }
    // });

});

function loadPlayer(idGroup){

    var idScrim = $("[name='idScrim']").val();

    $.ajax({
        
        url:APP_URL + '/scrim/time/' + idGroup + '/' + idScrim,
        type:"get",
        dataType: 'json',
        success: function(data){
            // $(".result_player").text( data );

            if(data.success == true) {
              //user_jobs div defined on page
              $('#result_player').html(data.html);
            } else {
            //   $('#result_player').html(data.html + '{{ $user->username }}');
            }
        }
    });

}
    
