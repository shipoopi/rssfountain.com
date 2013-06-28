var readEntries = {};

$(document).ready(function(){
    var templates = {};
    function grabTemplates(){
	$('.template').each(function(){
	    templates[$(this).attr('id')] = $(this).clone({deepWithDataAndEvents:true}).removeAttr('id');
	    $(this).remove();
	});
    }
    grabTemplates();

    function resizeContent(){
	var lr = $('#left_rail').width();
	$('.feed_item_header').width($(window).width() - lr - 50);
    };

    function urlEncode(text){
	return text;
    }

    function markRead(id){
	readEntries[id] = 1;
	$.getJSON('actions/markRead/?id='+urlEncode(id), function markReadSuccess(data){
	    console.log(data);
	});
		  
    }

    function loadFeed(feedUrl){
	$('#content').empty();
	feeds.getFeed(feedUrl, function(entries){
	    console.log(entries);
	    for(var i = 0; i<entries.length; i++){
		var entry = entries[i];
		var el = templates['feed_item_template'].clone();
		console.log(entry);
		el.attr('id', entry.id);
		el.find('.title').text(entry.title);
		el.find('.byline').text(entry.author);
		el.find('.snippet').html(entry.contentSnippet);
		el.find('.feed_item_content_body').html(entry.content);
		el.find('.feed_item_link').attr('href', entry.link);
		el.find('.feed_item_header').click(function(){
		    $(this).parent().find('.feed_item_content').toggle();
		    markRead(entry.id);
		});
		$('#content').append(el);
	    }
	});
    }

    $('#subscriptions li').click(function(){
	var feedUrl = $(this).attr('data-feed');
	loadFeed(feedUrl);
    });
    resizeContent();
    $(window).resize(function(){
	resizeContent();
    });

});