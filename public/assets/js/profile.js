var x = document.getElementById("takeLocationInput");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.value = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.value = "Enleminiz: " + position.coords.latitude +
        " & Boylamınız: " + position.coords.longitude;
}

//photos area 
$(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

    $(".zoom").hover(function() {

        $(this).addClass('transition');
    }, function() {

        $(this).removeClass('transition');
    });
});


let showcommentlink = document.getElementById('showcomments');
//Flip Animasyonu
showcommentlink.onclick = function() {

    var x = document.getElementById("comments-area");
    text = x.innerHTML;
    //currentdisplay = document.getElementById("commentsArea").style.display
    //alert(text)
    if (x) {
        if (text.includes("comment-content")) {
            document.getElementById("comments-area").style.display = "block";
        }
    } else {
        document.getElementById("comments-rea").style.display = "none";
    }
};



let likepostlink = document.getElementById('likepost');
//Flip Animasyonu
likepostlink.onclick = function() {

    var x = document.getElementById("likepost");
    text = x.innerHTML;

    if (x) {
        if (text == "<i class=\"fa fa-gittip\" aria-hidden=\"true\"></i> Beğen")
            document.getElementById("likepost").innerHTML = "<i class=\"fa fa-heart\" aria-hidden=\"true\"></i> Beğenildi"
        else {
            document.getElementById("likepost").innerHTML = "<i class=\"fa fa-gittip\" aria-hidden=\"true\"></i> Beğen"
        }
    } else {

    }
};