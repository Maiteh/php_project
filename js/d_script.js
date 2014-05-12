
     


/* google maps */

      function initialize() {
      	var myLatlng =new google.maps.LatLng(51.52003, -0.16254)
        var mapOptions = {
        	scrollwheel: false,
          center: myLatlng,
          zoom: 15

        };
        
      
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'You can find us here !'
  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);


/* scroll spy bootstrap*/



$(document).ready(function(){

$('body').scrollspy({ target: '.d_navbar' })






});





