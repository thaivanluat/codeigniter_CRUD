$(document).on('click', '.edit', function(){
    let id = $(this).siblings('.item-id').val();

    let name = $(this).parent().siblings('.edit-name').text();
    let email =  $(this).parent().siblings('.edit-email').text();
    let phone =  $(this).parent().siblings('.edit-phone').text();
    let address =  $(this).parent().siblings('.edit-address').text();

    $("#editForm input[name=name]").val(name);
    $("#editForm input[name=email]").val(email);
    $("#editForm input[name=phone]").val(phone);
    $("#editForm textarea[name=address]").val(address);
});

$(document).on('click', '.delete', function(){
    let id = $(this).siblings('.item-id').val();
    $('.delete-id').val(id);
});

$(document).on('click', '#deleteMany', function(){
    var values = $("input[name='id[]']:checked")
              .map(function(){return $(this).val();}).get();
    console.log(values);
    $('.multiple-id').val(values);
});