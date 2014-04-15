<script>
/*var num = 50; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.navbar').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top');
    }
});*/
</script>

<!-- nav -->
<div class="row">

<nav class="navbar navbar-inverse">

  <?php ck_nav(); ?>

</nav>

</div>
<!-- /nav -->
<script type="text/javascript"> //initiating jQuery 
jQuery(function($) { $(document).ready( function() {
	 //enabling stickUp on the '#navbar' ID
$('.navbar-inverse').stickUp({marginTop: 'auto'}); }); });
 </script>