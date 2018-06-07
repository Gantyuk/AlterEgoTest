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
                up();
                $('#erorrs').html("<div class=\"alert alert-warning\" role=\"alert\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                $('#erorrs').html("<div class=\"alert alert-success\" role=\"alert\">" + mesage.mesage + "</div>");
                up();
                window.setTimeout(function () {
                    window.location.replace("/");
                }, 1500);
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
                up();
                $('#erorrs').html("<div class=\"alert alert-warning\" role=\"alert\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                up();
                $('#erorrs').html("<div class=\"alert alert-success\" role=\"alert\">" + mesage.mesage + "</div>");
                window.setTimeout(function () {
                    window.location.replace("/");
                }, 1500);
            }
        }
    });
}
var t;

function up() {
    var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
    if (top > 0) {
        window.scrollBy(0, -100);
        t = setTimeout('up()', 50);
    } else clearTimeout(t);
    return false;
}

var sendfunc = function (e) {
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
                up();
                $('#erorrs').html("<div class=\"alert alert-warning\" role=\"alert\">" + mesage.errors + "</div>");
            } else if (mesage.mesage) {
                up();
                $('#erorrs').html("<div class=\"alert alert-success\" role=\"alert\">" + mesage.mesage + "</div>");
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
    $('#login').bind('submit', loginfunc);
    $('#send').bind('submit', sendfunc);
    $('#chech').change(function () {
        if (this.checked == true) {
            $('#pass').show();
        } else {
            $('#pass').removeAttr("style").hide();
        }

    });
});