$(document).ready(function() {

	var foo = {
	  "#mlg": [
	    {
	      "username": "StarCraft",
	      "name": "StarCraft",
	      "text": "Can you believe it? Sase takes down Stephano and is one step closer to meeting MKP in the #MLG Spring Championship LB Final. #SC2",
	      "photo": "https://si0.twimg.com/profile_images/360825080/iconS_normal.gif",
	      "timestamp": "Sun Jun 10 21:06:12 +0000 2012",
	      "id": 211927268539379700,
	      "retweet_by": null
	    },
	    {
	      "username": "day9tv",
	      "name": "Sean Plott",
	      "text": "Mad props to SaSe.  Thus far at MLG he's beaten beastyqt, desrow, ostojiy, mystik, sleep, socke, heart, violet, rain, grubby, leenock & polt",
	      "photo": "https://si0.twimg.com/profile_images/1796380463/Day9_Twitter_normal.jpg",
	      "timestamp": "Sun Jun 10 21:06:12 +0000 2012",
	      "id": 211923341479653380,
	      "retweet_by": null
	    },
	    {
	      "username": "MrBitterTV",
	      "name": "Ben Nichol",
	      "text": "Casting Sase vs Alicia with Husky on the Blue Stream. After that, I think I'm done! Can't wait to kick back and watch the finals. #MLG",
	      "photo": "https://si0.twimg.com/profile_images/1581590309/bitter3_normal.jpg",
	      "timestamp": "Sun Jun 10 21:24:38 +0000 2012", 
	      "id": 211931906156146700,
	      "retweet_by": {
	        "name": "Husky",
	        "username": "HuskyStarcraft"
	      }
	    },
	    {
	      "username": "HuskyStarcraft",
	      "name": "Husky",
	      "text": "From what I can tell sase has chat turned off, he's not being BM :P",
	      "photo": "https://si0.twimg.com/profile_images/1881061387/husky_no_text_01_200x200_normal.jpg",
	      "timestamp": "Sun Jun 10 21:06:12 +0000 2012",
	      "id": 211925442926624770,
	      "retweet_by": null
	    },
	    {
	      "username": "StarCraft",
	      "name": "StarCraft",
	      "text": "Watching @MLG Anaheim Championship Sunday from a #BarCraft? Tweet us your favorite pics or find a BarCraft near you. http://t.co/H8l0Icev",
	      "photo": "https://si0.twimg.com/profile_images/360825080/iconS_normal.gif",
	      "timestamp": "Sun Jun 10 20:28:23 +0000 2012",
	      "id": 211917751357407230,
	      "retweet_by": null
	    },
	    {
	      "username": "StarCraft",
	      "name": "StarCraft",
	      "text": "We're tied up in the battle of the foreigners, Sase vs Stephano, on #MLG SC2 Red. Tune in now to see who will advance! http://t.co/mbPLnDHR",
	      "photo": "https://si0.twimg.com/profile_images/360825080/iconS_normal.gif",
	      "timestamp": "Sun Jun 10 20:50:37 +0000 2012",
	      "id": 211917751357407230,
	      "retweet_by": null
	    }
	  ],
	  "facebook": [
	    {
	      "username": "mashable",
	      "name": "Pete Cashmore",
	      "text": "Facebook Client Pica for iPad Returns with Lots of New Features http://t.co/11p3lql1 via @appadvice",
	      "photo": "https://si0.twimg.com/profile_images/2015016150/petecashmoreavatar_normal.png",
	      "timestamp": "Sun Jun 10 21:30:33 +0000 2012",
	      "id": 211933395649953800,
	      "retweet_by": null
	    },
	    {
	      "username": "barrylibert",
	      "name": "Barry Libery",
	      "text": "Facebook Growth Shows Signs of Leveling Off after reaching nearly 1 billion customers.  It is clear that trees don't grow to the sky!",
	      "photo": "https://si0.twimg.com/profile_images/1127610035/BL_photoALT_normal.jpg",
	      "timestamp": "Sun Jun 10 20:54:36 +0000 2012",
	      "id": 211924346057396220,
	      "retweet_by": null
	    },
	    {
	      "username": "KLatif",
	      "name": "Khalid Latif",
	      "text": "Help us reach 7000 on @KLatif facebook page by liking it and inviting your friends to like it! http://t.co/lXFwhIrr",
	      "photo": "https://si0.twimg.com/profile_images/1600235421/tzleft.khalidlatif.cnn_normal.jpg",
	      "timestamp": "Sun Jun 10 20:50:07 +0000 2012",
	      "id": 211923218402000900,
	      "retweet_by": null
	    }
	  ]
	};
	
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
		
	var ftwidget = '<div class="friendTrend module trends component"><div class="flex-module trends-inner"><div class="flex-module-header"><h3><span class="js-trend-location">Trending in Timeline</span></h3></div><div class="flex-module-inner"><ul id="ftwidget" class="trend-items js-trends"></ul></div></div></div>';
	
	var testModal = '<div class="hide" id="myModal" style="position: fixed;top: 50%;left: 50%;z-index: 1050;width: 560px;margin: -250px 0px 0px -280px;overflow: auto;background-color:white;border: 1px solidrgba(0, 0, 0, 0.296875);border-image: initial;border-radius: ;-webkit-box-shadow:rgba(0, 0, 0, 0.296875) 0px 3px 7px;box-shadow:rgba(0, 0, 0, 0.296875) 0px 3px 7px;-webkit-background-clip: padding-box;background-clip: padding-box;"><div class="modal-header"><button type="button" style="float: right;width: 15px;height: 20px;background: url(https://si0.twimg.com/a/1339639284/t1/img/twitter_web_sprite_icons.png) no-repeat 0 -510px;cursor: pointer;" class="close" data-dismiss="modal"></button><h3 id="resultsWinTitle"></h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">Close</a></div></div>';
	
  (function loadWidget() {
    setTimeout(function() {
      var module = $('div.module.trends.component')
      if (module.length < 1) {
        loadWidget();
        return;
      }
      else {
        /* WRITE ALL CODE HERE */
        module.after(testModal, ftwidget);

        //This is the screen name of the user currently signed in to Twitter
        var username = $('div.account-group.js-mini-current-user:first').data('screenName');
        
        var i = 1;
        var ul = $("#ftwidget");
            
        $('div.dashboard').on('click', 'a.friendTrendLink', function(e){
          e.preventDefault();
        });

		for (trend in foo) {
			$(ul).append('<li class="js-trend-item "><a class="friendTrendLink" data-toggle="modal" href="#myModal">' + trend + '</a></li>');
			i++;
		};
		
		$('#myModal').hide();
		
		$('a.friendTrendLink').on('click', function() {
			var trend = $(this).text();
			$('#resultsWinTitle').html('Results for <strong>' + trend + '</strong>');
			
			var tweetsOfTrend = foo[trend];
			
			$('div.modal-body').empty();
	      	for (var i = 0; i < tweetsOfTrend.length; i++) {
	        	var tweet = tweetsOfTrend[i];
				$('div.modal-body').append('<div class="simple-tweet tweet"><div class="content" style="margin-left:40px"><div class="stream-item-header"><small class="time" style="float:right;"><a href="/'+ tweet.username +'/status/' + tweet.id + '" class="tweet-timestamp js-permalink"><span class="_timestamp">' + friendlyDate(tweet.timestamp) + '</span></a></small><a href="/' + tweet.username + '"><img class="avatar" style="width:32px;height:32px;margin-right:10px;" src="' + tweet.photo + '"><strong class="fullname">' + tweet.name + '</strong><span class="username" style="margin-left:5px;"><s>@</s><b>' + tweet.username + '</b></span></a></div><p class="js-tweet-text">' + tweet.text + '</p><div class="stream-item-footer"><a class="details" href="/'+ tweet.username +'/status/' + tweet.id + '"><b><span style="color:#999;">Details</span></b></a></div></div></div>');
			};
		});
	
		/* for (trend in foo) {
			for (var j=0; j<foo[trend].length; j++) {
				$('div.modal-body').append('<div class="simple-tweet tweet"><div class="content" style="margin-left:40px"><div class="stream-item-header"><small class="time" style="float:right;"><a href="/'+ foo[trend][j].username +'/status/' + foo[trend][j].id + '" class="tweet-timestamp js-permalink"><span class="_timestamp">' + friendlyDate(foo[trend][j].timestamp) + '</span></a></small><a href="/' + foo[trend][j].username + '"><img class="avatar" style="width:32px;height:32px;margin-right:10px;" src="' + foo[trend][j].photo + '"><strong class="fullname">' + foo[trend][j].name + '</strong><span class="username" style="margin-left:5px;"><s>@</s><b>' + foo[trend][j].username + '</b></span></a></div><p class="js-tweet-text">' + foo[trend][j].text + '</p><div class="stream-item-footer"><a class="details" href="/'+ foo[trend][j].username +'/status/' + foo[trend][j].id + '"><b><span style="color:#999;">Details</span></b></a></div></div></div>');
			}
		} */
		
      }	
      
    }, 2500);
  })();
	
});
