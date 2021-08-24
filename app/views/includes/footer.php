
 <div class="push"></div>
  </div>
  <footer class="footer">
      hello footer
  </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?v=<?php echo rand(10000000000,99999999999); ?>"></script>
<script type="text/javascript">
$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 400){
    $('.menuAreaFixed').fadeIn();
  	}else{
    $('.menuAreaFixed').fadeOut();
  }
});
</script>
<script src="<?php echo URLROOT; ?>/public/JS/app.js?v=<?php echo rand(10000000000,99999999999); ?>"></script>
</body>
</html>