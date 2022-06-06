
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $('#btnUpdateUser').click(function(e) {
        e.preventDefault();
        let input = {
            'name': $("#name").val(),
            'dob' : $('#dob').val(),
            'old-password': $("#old-password").val(),
            'password': $("#password").val(),
            'password_confirmation': $("#password_confirmation").val(),
        }
        $.ajax({
            type: "POST",
            url: "/account",
            data: input,
            dataType: "JSON",
            success: function(response) {
                alert(response.message);
            }
        }); 
    }); 
});

function toast({type = '', message = ""}){
    const main = $('#toast');
    console.log(main);
    main.class
}
toast("","");