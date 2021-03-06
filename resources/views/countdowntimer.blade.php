<style>
body{
  text-align: center;
  background: #fff;
font-family: sans-serif;
font-weight: 100;
}

h1{
color: #396;
font-weight: 100;
font-size: 40px;
margin: 40px 0px 20px;
}

#clockdiv{
  font-family: sans-serif;
  color: #fff;
  display: inline-block;
  font-weight: 100;
  text-align: center;
  font-size: 40px;
}

#clockdiv > div{
  padding: 10px;
  border-radius: 3px;
  background: #F9A3A3;
  display: inline-block;
}

#clockdiv div > span{
  padding: 15px;
  border-radius: 3px;
  background: #EE3737;
  display: inline-block;
}

.smalltext{
  padding-top: 5px;
  font-size: 16px;
}
</style>
<div>
<h2 class="text-theme-colored mt-0">VIP Registration Begins in:</h2>
  <div id="clockdiv">
    <div class="col-xs-3">
      <span class="days col-xs-12"></span>
      <div class="smalltext">Days</div>
    </div>
    <div class="col-xs-3">
      <span class="hours col-xs-12"></span>
      <div class="smalltext">Hours</div>
    </div>
    <div class="col-xs-3">
      <span class="minutes col-xs-12"></span>
      <div class="smalltext">Minutes</div>
    </div>
    <div class="col-xs-3">
      <span class="seconds col-xs-12"></span>
      <div class="smalltext">Seconds</div>
    </div>
</div>
</div>
<script>
function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
              clearInterval(timeinterval);
            }
      }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var countdown = (new Date('05 02 2017')) - (new Date());

var deadline = new Date(Date.parse(new Date()) + countdown);
initializeClock('clockdiv', deadline);
</script>
