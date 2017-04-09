function findQuests() {
    var x = document.getElementById("locationForm");
    var location = x.elements[0].value;
    /*Send location to search on backend*/
    var y = document.getElementById('pageTitle');
    y.innerHTML = 'location';
    return location;
}
