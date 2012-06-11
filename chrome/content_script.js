(function() {
  var ftwidget = '<div class="module trends component"><div class="flex-module trends-inner"><div class="flex-module-header"><h3><span class="js-trend-location">Trending in Timeline</span></h3></div><div class="flex-module-inner"><ul class="timeline-trends trend-items js-trends"></ul></div></div></div>';
  var trends = {
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
        "photo": "https://si0.twimg.com/profile_images/360825080/iconS_normal.gif://si0.twimg.com/profile_images/1796380463/Day9_Twitter_normal.jpg",
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
  }
      
  function loadModule() {
    setTimeout(function(){ 
      var module = $('div.module.trends.component');
      if(module.length < 1){
        loadModule();
        return;
      }
      else {
        /* WRITE ALL CODE IN THIS ELSE BLOCK */

        module.after(ftwidget); // Create widget

        // Build list of trends
        var list = '';
        for (trend in trends) {
          list += '<li class="js-trend-item"><a href="#">'+trend+'</a></li>';
        }
        module = $('ul.timeline-trends')
        module.html(list);
        module.on('click', 'a', function(e) {
          console.log($(this).html());
        });
      }
    }, 200);
  }

  loadModule();
})();
