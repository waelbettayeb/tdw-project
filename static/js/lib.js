$('#carousel').carousel({
    interval: 2000
});
function updateMaps(query){
    var link = "https://maps.google.com/maps?q=" + encodeURIComponent(query.trim()) + "&t=k&z=13&ie=UTF8&iwloc=&output=embed";
    var iframe = document.getElementById("gmap_canvas");
    iframe.src = link;
    iframe.contentWindow.location.reload();
}
$(document).ready(function() {
    updateMaps("Mostagenem Algerie");
});