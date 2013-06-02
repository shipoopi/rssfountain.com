<!DOCTYPE html>
  <head>
    <?php $this->load->view('templates/html_head')?>     
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
	    Subscriptions
	  </div>
	</div>
	<div id="content">
	  <div class="feed_item">
	    <div class="feed_item_header">
	      <div class="star">*</div>
	      <div class="feed_title"><!--only show if in folder-->
		Epoch Times
	      </div>
	      <div class="title">
		Infamous Ship Turned Into Reef In Florida
	      </div>
	      <div class="snippet">
		EW YORK (AP) — A ship infamous for running aground in New York with a cargo full of immigrants has been turned into a reef in Palm Beach County, Fla.
	      </div>
	      <div class="date_time">
		8:34 AM
	      </div>
	      <div class="linkout">
		<a target="_blank" href="http://asdf.com">&gt;</a>
	      </div>
	    </div>
	    <div class="feed_item_content" style="display:none">
	      <h3 class="title">Infamous Ship Turned Into Reef In Florida</h3>
	      <div class="byline">From <a>Epoch Times</a>
	    </div>
	  </div>

	  Content Area
	</div>
      </div><!--/after-header-->
    </div>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
