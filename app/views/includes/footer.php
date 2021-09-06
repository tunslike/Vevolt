
 <div class="push"></div>
  </div>
  <footer class="footer">

  <div class="registervendor" style="background-color: #e2e2e2;">
    <div class="regcontainer" style="width:80%; display:flex; flex-direction:row;">
        <div style="flex:2;">
            <div class="newsletter">
              <div class="newscol1">
              <h5 class="newstitle">Subscribe to our Newsletter</h5>
              <p class="newsbody">Our best promotions sent to your inbox.</p> 
              </div>
                <div class="newscol2">
                <div class="newsfield">
        <form action="/action_page.php" method="get" id="form1">
            <div class="iconnews"><i class="far fa-envelope"></i></div>
            <input type="text" placeholder="Enter email address" id="lname" name="lname" />
            <!--
            <select name="category" id="">
                <option selected="selected" value="0">Category</option>
                <option value="0">Option 1</option>
                <option value="0">Option 2</option>
            </select>
            -->
            <button type="submit" form="form1" value="Submit">Subscribe</button>
        </form>
        </div>
                </div>

            </div>
        </div>
        <div style="flex:1;">col3</div>
    </div>
  </div>


  <div class="footerbody">
    <div class="footercontent">
      <div class="footercol">
      <img src="<?php echo URLROOT; ?>/public/images/logo.jpg?v=<?php echo rand(10000000000,99999999999); ?>" alt="Logo" width="100px" />
      <p>Vevolt is Number 1. online generator spare parts vendor, providing affordable products and fast payment services to customers</p>
      <ul>
        <li><i class="fas fa-phone-square-alt"></i> +234 903 0093 039</li>
        <li><i class="fas fa-envelope"></i> help@vevolt.ng</li>
      </ul>
      </div>
      <div class="footercol">
        <div class="footercolhdr">
          ABOUT US
        </div>
        <ul>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Our Blog</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">Terms & Conditions</a></li>
      </ul>
      </div>
      <div class="footercol">
      <div class="footercolhdr">
          BUYING ON VEVOLT
        </div>
        <ul>
        <li><a href="#">FAQs</a></li>
        <li><a href="#">Delivery</a></li>
        <li><a href="#">Vevolt Return Policy</a></li>
        <li><a href="#">Bulk Purchase</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
      </div>
      <div class="footercol">
      <div class="footercolhdr">
          FOLLOW US
        </div>
        <div class="footerSocial">
          <ul>
            <li><a href="#"><i style="font-size:35px;" class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i style="font-size:35px;" class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i style="font-size:35px;" class="fab fa-youtube-square"></i></a></li>
            <li><a href="#"><i style="font-size:35px;" class="fab fa-instagram-square"></i></a></li>
          </ul>
        </div>
        <p style="margin-top:20px; font-size:14px; font-weight:500;"><i style="font-size:25px;" class="fas fa-mobile-alt"></i> VEVOLT Mobile App Coming Soon!</p>
      </div>
    </div>
    <div class="footerBottom">
      <div style="width:80%; margin: 0px auto; align-items:center; display: flex;">
      <div style="flex:1;">
      <p>
          2021 © Vevolt NG. All rights reserved.
          </p>
      </div>
      <div style="flex:1;">
      <ul class="paymentypes">
        <li>PAYMENT METHODS: </li>
        <li><i style="font-size:25px;" class="fab fa-cc-visa"></i></li>
        <li><i style="font-size:25px;" class="fab fa-cc-mastercard"></i></li>
      </ul>
    </div>
      </div>
    </div>
  </div>

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