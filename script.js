var sendForm = function (e) {
    e.preventDefault();
    var t = $(this);
    var data = t.serialize();
    $.ajax({
        url: t.attr('action'),
        type: 'POST',
        data: data,
        dataType: 'html',
        success: function (response) {
            var mass = JSON.parse(response);
            console.log(mass.response[0]);

        }
    });
}
var sendRegister = function (e) {
    e.preventDefault();
    var t = $(this);
    var data = t.serialize();
    $.ajax({
        url: t.attr('action'),
        type: 'POST',
        data: data,
        dataType: 'html',
        success: function (response) {
            var mesage = JSON.parse(response);
            if (mesage.errors) {
                $('#erorrs').html("<div  style=\"color: red\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                $('#erorrs').html("<div  style=\"color: green\">" + mesage.mesage + "</div>");
                window.setTimeout(function () {
                    window.location.replace("/login");
                }, 2000);
            }
        }
    });
}
var loginfunc = function (e) {
    e.preventDefault();
    var t = $(this);
    var data = t.serialize();
    $.ajax({
        url: t.attr('action'),
        type: 'POST',
        data: data,
        dataType: 'html',
        success: function (response) {
            var mesage = JSON.parse(response);
            if (mesage.errors) {
                $('#erorrs').html("<div  style=\"color: red\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                $('#erorrs').html("<div  style=\"color: green\">" + mesage.mesage + "</div>");
                window.setTimeout(function () {
                    window.location.replace("/");
                }, 2000);
            }
        }
    });
}
var sendfunc=function (e) {
    e.preventDefault();
    var t = $(this);
    var data = t.serialize();
    $.ajax({
        url: t.attr('action'),
        type: 'POST',
        data: data,
        dataType: 'html',
        success: function (response) {
            var mesage = JSON.parse(response);
            if (mesage.errors) {
                $('#erorrs').html("<div  style=\"color: red\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                $('#erorrs').html("<div  style=\"color: green\">" + mesage.mesage + "</div>");
                window.setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        }
    });
}

$(document).ready(function () {
    $('#apiform').bind('submit', sendForm);
    $('#signup').bind('submit', sendRegister);
    $('#login').bind('submit',loginfunc);
    $('#send').bind('submit',sendfunc);
});