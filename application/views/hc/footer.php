	  <!-- Bootstrap core JavaScript
	  ================================================== -->
	  <!-- Placed at the end of the document so the pages load faster -->
	  
	<script src="<?=base_url()?>js/bootstrap.min.js"></script>	  
	 
        <script>
        $( document ).on( "mousemove", function( event ) {
        
        //$( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY );
        
        if (event.pageY < 50) {
                //$('.navbar').fadeIn();
            } else {
                //$('.navbar').fadeOut();
            }
        
        });
        </script>
	</body>
</html>