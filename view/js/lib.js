$('#carousel').carousel({
    interval: 2000
});
function updateMaps(query){
    var link = "https://maps.google.com/maps?q=" + encodeURIComponent(query.trim()) + "&t=k&z=13&ie=UTF8&iwloc=&output=embed";
    $('#gmap_canvas').attr("src", link);
}
$(document).ready(function() {
    updateMaps("Mostagenem Algerie");
});
