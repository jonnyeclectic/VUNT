<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="infoMessage"><?php echo $message;?></div>
<?php echo 'You have voted for '.$candidate.' in the '.$election.' election.<br>';?>
<?php echo 'Your confirmation number for this vote is '.$confirmation.'.<br>'?>
<?php echo 'Thank you for using VUNT!<br>'?>
<p><div class="fb-share-button" data-href="https://localhost/VUNT/index.php/home" data-layout="button"></div></p>
<?php echo anchor('election/vote/'.$election_id, 'Return to Election<br>')?>
<?php echo anchor('home', 'Return to Home<br>')?>