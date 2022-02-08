setInterval(function showTime() {
    let currentTime = new Date();
    let currentHours = currentTime.getHours();
    currentHours = ("0" + currentHours).slice(-2);
    let currentMinutes = currentTime.getMinutes();
    currentMinutes = ("0" + currentMinutes).slice(-2);
    let currentSeconds = currentTime.getSeconds();
    currentSeconds = ("0" + currentSeconds).slice(-2);
    document.getElementById("current-Time").innerHTML = "L'ora corrente è "
        + currentHours + ":" + currentMinutes + ":" + currentSeconds;
}, 1000);