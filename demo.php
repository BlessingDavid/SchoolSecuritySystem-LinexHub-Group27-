  <script src="http://code.jquery.com/jquery-1.6.js"></script>
  <?php
//echo date('Y-m-d H:i:s');
$time1=strtotime('01:10:00');
$time2=strtotime('02:20:00');

$time_def=($time2-$time1)/60;

echo 'Minutes:'.$time_def;
?>
<style>
body {padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;}
div {margin:15px;}
label {display:block;}
input {border:solid 1px #888;font-size:20px;border-radius:5px;padding:2px;outline:none;}
#modern {box-shadow:0 0 4px green;}
#kbInput {box-shadow:0 0 4px blue;}
#timer {box-shadow:0 0 4px red;}
</style>
<script>
$('#modern').bind('input', function() {
    $(this).next().stop(true, true).fadeIn(0).html('[input event fired!]: ' + $(this).val()).fadeOut(2000);
});

$('#kbInput').keyup(function(e) {
    $(this).next().stop(true, true).fadeIn(0).html('[keyup event fired (keycode: ' + e.keyCode + ', char: ' + String.fromCharCode(e.keyCode) + ')!]: ' + $(this).val()).fadeOut(2000);
});

$('#timer').focus(function() {
    // turn on timer
    startTimer();
}).blur(function() {
    // turn off timer
    endTimer();
});

var lastValue = "",
    $timer = $('#timer'),
    timerCheckCount = 0,
    checkInputChange = function() {
        timerCheckCount += 1;
        if (lastValue !== $timer.val()) {
            $timer.next().stop(true, true).fadeIn(0).html('[timer detected change (timer has fired ' + timerCheckCount + ' times!]: ' + $timer.val()).fadeOut(2000);
            lastValue = $timer.val();
        }
    },
    timer = undefined,
    startTimer = function() {
        timer = setInterval(checkInputChange, 200); // check input field every 200 ms (1/5 sec)
    },
    endTimer = function() {
        clearInterval(timer);
        timerCheckCount = 0;
    };
</script>
<div>
    <!-- input event fires when the input value has changed, nice modern way to check for differences, limitations are that some browsers don't support this event (yet)) -->
    <label for="modern">Input Event</label>
    <input id="modern" />
    <span></span>
</div>

<div>
    <!-- demonstrate keyup event handling on an input field, note limitations (right-click paste) and irrelevent events (some kb input like shift, caps lock, etc cause the event to occur but don't change the input) -->
    <label for="kbInput">KeyUp Event</label>
    <input id="kbInput" />
    <span></span>
</div>

<div>
    <!-- use a timer to detect changes in input, this is certainly more costly than other methods but effective for browsers that don't support the `input` event, also we can turn the timer on/off depending on input focus/blur to try and optimize processing costs -->
    <label for="timer">Timer</label>
    <input id="timer" />
    <span></span>
</div>