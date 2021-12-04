var timeDisplay = document.getElementById("time");

function refreshTime() {
  var dateString = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
  timeDisplay.innerHTML = dateString;
}

setInterval(refreshTime, 1000);