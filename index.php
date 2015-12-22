<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBMcLCm4a0-aa5-I54HJ23lCQSM4cNvBRw&sensor=true">
    </script>
    <!-- 
    ROADMAP displays the normal, default 2D tiles of Google Maps.
    SATELLITE displays photographic tiles.
    HYBRID displays a mix of photographic tiles and a tile layer for prominent features (roads, city names).
    TERRAIN displays physical relief tiles for displaying elevation and water features (mountains, rivers, etc.).
    
     -->
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(27, 17),
          zoom: 6,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        ///////////////Added by gouda. //////////////
        
        var html = "<table>" +
                 "<tr><td>Organization Name:</td> <td><input type='text' id='name'/> </td> </tr>" +
                 "<tr><td> Address:</td> <td><input type='text' id='address'/></td> </tr>" +
                 "<tr><td>Category:</td> <td><select id='type'>" +
                 "<option value='Software' SELECTED>Software</option>" +
                 "<option value='Construction'>Construction</option>" +
                 "<option value='Health'>Health</option>" +
                 "<option value='Industry'>Industry</option>" +
                 "</select> </td></tr>" +
                 "<tr><td></td><td><input type='button' value='Save & Close' onclick='saveData()'/></td></tr>";
	    infowindow = new google.maps.InfoWindow({
	     content: html
	    });
        
	    google.maps.event.addListener(map, "click", function(event) {
	        marker = new google.maps.Marker({
	          position: event.latLng,
	          map: map
	        });
	        google.maps.event.addListener(marker, "click", function() {
	          infowindow.open(map, marker);
	        });
	    });
		//////////////////////////////////////////////
        
      }
    </script>
    
<script type="text/javascript">
   
    function saveData() {
      var name = escape(document.getElementById("name").value);
      var address = escape(document.getElementById("address").value);
      var type = document.getElementById("type").value;
      var latlng = marker.getPosition();
 
      var url = "phpsqlinfo_addrow.php?name=" + name + "&address=" + address +
                "&type=" + type + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
      downloadUrl(url, function(data, responseCode) {
        if (responseCode == 200 && data.length <= 1) {
          infowindow.close();
          document.getElementById("message").innerHTML = "Location added.";
        }
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
</script>
    
  </head>
  <body onload="initialize()">
    <div id="map_canvas" style="width:100%; height:100%"></div>
  </body>
</html>