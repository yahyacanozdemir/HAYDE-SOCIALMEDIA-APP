function confirm_friend(id) {
    document.getElementById("ignore-friend-buton" + id).style.display = "none";
    document.getElementById("confirm-friend-buton" + id).innerHTML = "Arkadaşlık İsteği Onaylandı";
};

function ignore_friend(id) {
    document.getElementById("a-friend-request-div" + id).style.display = "none";
};