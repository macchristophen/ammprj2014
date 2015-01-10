
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
 $(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut()
         .next('img').fadeIn()
         .end().appendTo('.fadein');}, 
      3000);
});
</script>
 
<div class="fadein">
<img src="image/gallery/001.png" />
<img src="image/gallery/002.png" />
<img src="image/gallery/003.png" /> 
</div>  

