$(document).ready(function() {
/*	var stuff = '<div class="content-main js-content-main breakable" style="background: white;padding: 10px;width:500px;margin-bottom:10px;border:1px solid #ccc;"><h3 style="margin-bottom:5px;">Trending in your friends</h3><ul style="font-size:12px;"><li><a href="#myModal" data-toggle="modal">Andreessen Horowitz</a></li><li><a href="#">Prince of Persia source code</a></li><li><a href="#">Pakistan plane crash</a></li><li><a href="#">Facebook IPO</a></li><li><a href="#">Pebble watch</a></li></ul><span style="float:right;bottom:0;color:#ccc;font-size:10px;margin-top:-17px"><a href="#" style="color:#ccc">powered by FriendTrend</a></span></div>';
	$('div.content-main').before(stuff);
*/
		
	var ftwidget = '<div class="module trends component"><div class="flex-module trends-inner"><div class="flex-module-header"><h3><span class="js-trend-location">Trending in Timeline</span></h3></div><div class="flex-module-inner"><ul class="trend-items js-trends"></ul></div></div></div>';
	 	
	$('.module.trends.component').after(ftwidget);
	
});