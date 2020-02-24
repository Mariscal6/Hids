$( document ).ready(function() {
    var pathname = window.location.pathname.split("/").pop();
    var index = pathname.replace(".php", "");
    var element = '#' + index;
    $(element).attr("class", "nav-item active");
});