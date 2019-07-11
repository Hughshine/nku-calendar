//自定义组件的点击事件
$(function () {
    "use strict";
    $(document).on('click','.fc-day',function () {
        window.alert('hello');
        var date = $(this).attr('data-date');

        $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=student-event/create&date='+date);

        // $.get('index.php?r=student-event/create&date='+date+' 00-00-01', function(){
        //     $('#modal').modal('show')
        //         .find('#modalContent')
        //         .load('index.php?r=student-event/create&date='+date+' 00-00-01');
        // });
    });

    $('#new-custom-event').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=custom-event/create');
    });

    $('#new-student-event').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=student-event/create');
    });

    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });

});