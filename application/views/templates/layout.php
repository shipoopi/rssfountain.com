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
	  <div id="feed_item">
	    <div id="feed_item_header">
	      <div id="star">*</div>
	      
	    </div>
	    <div id="feed_item_content" style="display:none">
	      
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
