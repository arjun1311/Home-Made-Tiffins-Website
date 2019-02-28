
<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
	
	text-align:center;
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

.modal-body {
	padding: 2px 16px;
	color: #555;
}
.modal-body p{
	font-size:18px;
	color: #555;
}
</style>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
		<h2>Sorry!</h2>
      <p>The Lines are Closed</p>
    </div>
  </div>
</div>

<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
		<h2>Sorry!</h2>
      <p>Location out of Service</p>
    </div>
  </div>
</div>


<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
		<h2>Sorry!</h2>
      <p>Please Enter your location with area For e.g. Janipur, Jammu</p>
    </div>
  </div>
</div>


<div id="myModal3" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
		<h2>Sorry!</h2>
		<p>Please Login to Order</p>
    </div>
  </div>
</div>