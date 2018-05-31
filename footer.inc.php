<!--footer loading-->
<footer class="col-xs-12 col-md-12 bg-4">
    <!--logo_div-->
    <a data-ajax="false" href="http://www.kelymail.com"><div class="col-sm-3 logo_but">
        </div></a>
    <!--logo_div-->

    <!--for news and co-->
    <div class="col-sm-3 news_co" style="font-size:16px;">
        <b>NEWS</b><p></p>
        <p><a href="<?php echo BASE_URL ?>index.php" data-ajax="false" style="color:#FFF !important;">Local</a></p>
        <p><a href="<?php echo BASE_URL ?>international" data-ajax="false" style="color:#FFF !important;">International</a></p>
    </div>

    <!--for about us and co-->
    <div class="col-sm-3 about_co" style="font-size:16px;">
        <b>ABOUT US</b><p></p>
        <p><a href="<?php echo BASE_URL ?>about" data-ajax="false" style="color:#FFF !important;">About</a></p>
        <p><a href="<?php echo BASE_URL ?>contact" data-ajax="false" style="color:#FFF !important;">Contact Us</a></p>
    </div>

    <!--for terms and co-->
    <div class="col-sm-3 terms_co">
        <b><a href="<?php echo BASE_URL ?>terms" data-ajax="false" style="color:#FFF !important;">Terms and conditions</a></b><p></p>
        <p><b><a href="<?php echo BASE_URL ?>privacy" data-ajax="false" style="color:#FFF !important;">Privacy policy</a></b></p>
    </div>

    <!--for copy and co-->
    <div class="col-xs-12 col-md-12 copy_co" style="font-size:14px;">
        <b>kelymail.com &copy; 2016 - <?php $year = date('Y'); echo "   $year"; ?>. All rights reserved.</b>
    </div>

    <div class="col-md-12 top_co" style="font-size:14px;">
        <b><a href="#top" data-ajax="false">Back to top of page</a></b>
    </div>

</footer>
<!--footer loaded-->

<!--back to the top shape-->
<a href="#" data-ajax="false" class="back-to-top" style="display: inline;">

    <i class="fa fa-arrow-circle-up"></i>

</a>

</div>
</div>

<script>
    $('.back-to-top').css({"display": "none"});
    jQuery(document).ready(function() {

        var offset = 250;

        var duration = 300;

        jQuery(window).scroll(function() {

            if (jQuery(this).scrollTop() > offset) {

                jQuery('.back-to-top').fadeIn(duration);

            } else {

                jQuery('.back-to-top').fadeOut(duration);

            }

        });


        jQuery('.back-to-top').click(function(event) {

            event.preventDefault();

            jQuery('html, body').animate({scrollTop: 0}, duration);

            return false;

        })

    });

</script>

</body>
</html>
