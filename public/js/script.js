// Ucapan Selamat
function startTimeSalam() {
    var ucapanSalam = "";
    var todaySalam = new Date();
    var hSalam = todaySalam.getHours();
    var mSalam = todaySalam.getMinutes();
    var sSalam = todaySalam.getSeconds();
    mSalam = checkTime(mSalam);
    sSalam = checkTime(sSalam);
    if (hSalam < 4) { ucapanSalam = "Selamat Malam" }
    else {
        if (hSalam < 11) { ucapanSalam = "Selamat Pagi" }
        else {
            if (hSalam < 16) { ucapanSalam = "Selamat Siang" }
            else {
                if (hSalam < 20) { ucapanSalam = "Selamat Sore" }
                else { ucapanSalam = "Selamat Malam"; }
            }
        }
    }
    $(".salam").text(ucapanSalam + ',');
}

function checkTime(i) { 
    if (i < 10) { i = "0" + i; } return i; 
}

startTimeSalam();