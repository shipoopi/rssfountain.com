<!DOCTYPE html>
  <head>
    <?php $this->load->view('templates/html_head')?>     
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.js"><script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <div id="body">
      <div id="header">
	<div id="header_logo">
	  RSS Fountain
	</div>
	<div id="header_buttons">
	  <div id="subscription_buttons">
	    Refresh, (All Items, New Items) Selector, Mark All Read, Feed/Folder Settings (Sort by newest, oldest, Unsubscribe, Rename, Label)
	  </div>
	  <div id="settings_buttons">
	    Settigns, Search, Prev, Next
	  </div>
	</div>
      </div>
      <div id="after_header">
	<div id="left_rail">
	  <div id="subscribe">
	    Subscribe Button
	  </div>
	  <div id="subscriptions">
	    <ul>
	      <li data-feed="http://www.codeofhonor.com/blog/feed">Code Of Honor</li>
	    </ul>
	  </div>
	</div>
	<div id="content">
	  <div class="feed_item template" id="feed_item_template">
	    <div class="feed_item_header">
	      <span class="star">*</span>
	      <span class="feed_title"><!--only show if in folder-->
	      </span>
	      <span class="title">
		Title
	      </span>
	      <span class="snippet">
	      </span>
	      <span class="date_time">
	      </span>
	      <span class="linkout">
		<a class="feed_item_link" target="_blank" href="http://asdf.com">&gt;</a>
	      </span>
	    </div>
	    <div class="feed_item_content" style="display:none">
	      <h3 class="title">Infamous Ship Turned Into Reef In Florida</h3>
	      <div class="byline">From <a>Epoch Times</a></div>
	      <div class="feed_item_content_body"></div>
		
	    </div>
	  </div>
	</div>
      </div><!--/after-header-->
    </div>
    <script src="js/less.js"></script>
<!--
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
-->

    <script type="text/javascript" src="js/feeds.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>
