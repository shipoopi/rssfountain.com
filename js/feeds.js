var online = 1;
if(typeof(google)=='undefined'){
    online = 0;
}else{
    google.load("feeds", "1");
}
(function(exports){
    exports.initialized = 0;
    var onInitalized = [];
    exports.getFeed = function(feedUrl, callback){
	console.log(exports.initialized);
	if(!exports.initialized){
	    onInitalized.push(function(){feeds.fetchFeed(feedUrl, callback)});
	}else{
	    exports.fetchFeed(feedUrl, callback);
	}
    };

    //should only be run if intialized
    exports.fetchFeed = function(feedUrl, callback){

	if(!online){
	    var test = [];
	    for(var i = 0; i<10; i++){
		var n = {
		    id:feedUrl+i,
		    title:'title '+i,
		    byline:'byline'+i,
		    contentSnippit:'snippit'+i,
		    content:'content'+i,
		    link:'http://google.com'+i,
		}
		test.push(n);
	    }
	    
	    return callback(test, null);
	}
	var feed = new google.feeds.Feed(feedUrl);
	feed.load(function(result) {
            if (!result.error) {
		callback(result.feed.entries, null);
            }else{
		callback(null, result.error);
	    }
	});	
    }
    function initialize() {
	exports.initialized = 1;
	for(var i = 0; i < onInitalized.length; i++){
	    onInitalized[i]();
	}
    }

    if(online){
	google.setOnLoadCallback(initialize);
    }else{
	initialize();
    }

})(typeof exports === 'undefined'? this['feeds']={}: exports);


