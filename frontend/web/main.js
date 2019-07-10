$(function () {
    "use strict";
    $(document).on('click','.fc-day', function () {
        window.alert('hello');
        var date = $(this).attr('data-date');

        $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=student-event/create&date='+'\'00-00-01\'');

        // $.get('index.php?r=student-event/create&date='+date+' 00-00-01', function(){
        //     $('#modal').modal('show')
        //         .find('#modalContent')
        //         .load('index.php?r=student-event/create&date='+date+' 00-00-01');
        // });
        window.alert('wait');
    });

    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });

});