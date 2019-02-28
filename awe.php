
<style type="text/css">
   .search{
	   width:100%;
	   padding:10px 10px;
   }
   .search input[type=text]{
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	border-radius:5px;
	font-size:15px;
	outline:none;
}
.loc{
	position: absolute;
    top:200px;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
}
@media only screen and (min-width: 300px) {
	.search input[type=text]{
		width: 80%;
	}
	.loc{
		top:100px;
	}
}
@media only screen and (min-width: 768px) {
	.search input[type=text]{
		width: 40%;
	}
	.loc{
		top:200px;
	}
}

</style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&libraries=places">
	</script>

<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>


	<div class="search">
	
      <input id="searchTextField" type="text" size="50" placeholder="Enter your Order Pickup Area. For e.g. Janipur, Jammu" name="location" autocomplete="on" class="loc">
	  
   </div>
