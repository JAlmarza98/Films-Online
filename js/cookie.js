comporbar();

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }

    return decodeURI(dc.substring(begin + prefix.length, end));
} 

function comporbar() {
    var Usuario = getCookie("Usuario");
    var Id = getCookie("Id");
    var Tiempo = getCookie("Tiempo");

    if (Usuario == null && Id == null && Tiempo == null) {
            window.location.href = "../index.php";
    }
}