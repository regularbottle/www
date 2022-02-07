"use strict"
let x = setInterval(function showNameAndTime() {
    let currentTime = new Date();
    let currentHours = currentTime.getHours();
    currentHours = ("0" + currentHours).slice(-2);
    let currentMinutes = currentTime.getMinutes();
    currentMinutes = ("0" + currentMinutes).slice(-2);
    let currentSeconds = currentTime.getSeconds();
    currentSeconds = ("0" + currentSeconds).slice(-2);
    document.getElementById("text-change").innerHTML = "Il mio nome è "
                                                                + document.getElementById("text-get").value
                                                                + " e questa è l'ora corrente: "
                                                                + currentHours + ":" + currentMinutes + ":" + currentSeconds;
}, 1000);