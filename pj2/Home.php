<?php
include("db_config.php");
include("header.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
  if(isset($_GET['sharepath'])){
    echo '
<script>
$( document ).ready(function() {
window.frames["iframeContainer"].location.replace("'.$_GET['sharepath'].'");
});
</script>';
  }
?>
<html>  
  <head>
    <link rel="stylesheet" type="text/css" href="style123.css">
  </head>
  <body>
    <div class="frame-container">
      <iframe id="iframeContainer" name="iframeContainer" src="display.php" width="100%" height="100%" frameborder="0" onload="resizeIframe(this)" scrolling="no"></iframe>
    </div>



  </body>

</html>

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
  
</script>