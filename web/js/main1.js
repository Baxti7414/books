

$('.add_tocart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax([
        url: '/cart/add',
        data: {id: id},
    type: 'GET',
        success: function (res) {

    },
    error: function(){
        alert('ERROR!');
        console.log(res);
    }
    ]);
});