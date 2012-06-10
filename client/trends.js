$(document).ready(function(){
	$('.demo').html('My First JavaScript');	
});

function friendlyDate(utcString) {
  var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
  }();
 
  var H = function (a) {
      var b = new Date();
      var c = new Date(a);
      if (K.ie) {
          c = Date.parse(a.replace(/( \+)/, ' UTC$1'))
      }
      var d = b - c;
      var e = 1000,
          minute = e * 60,
          hour = minute * 60,
          day = hour * 24,
          week = day * 7;
      if (isNaN(d) || d < 0) {
          return ""
      }
      if (d < e * 7) {
          return "right now"
      }
      if (d < minute) {
          return Math.floor(d / e) + "s"
      }
      if (d < minute * 2) {
          return "1m"
      }
      if (d < hour) {
          return Math.floor(d / minute) + "m"
      }
      if (d < hour * 2) {
          return "1h"
      }
      if (d < day) {
          return Math.floor(d / hour) + "h"
      }
      if (d > day && d < day * 2) {
          return "1d"
      }
      if (d < day * 365) {
          return Math.floor(d / day) + "d"
      } else {
          return "over a year ago"
      }
  };
  return H(utcString);
}
