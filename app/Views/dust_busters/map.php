<style>
  body{
    color: black;
  }
  </style>


      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
     <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

      <div class="heading">
        <h1>The Map of Saligao</h1>
    </div>
    <div class="mapcontain" id="map"></div>
    <div class="bin-form">
    <form action="">
        <br>
        <label for="sem">Select the the dustbin you want to view</label>

        <select name="itype" id="itype" onchange=moveToLocation()>
          <?php foreach ($bins as $bin): ?>
            <option value="<?= esc($bin['BinId']) ?>">Bin <?= esc($bin['BinId']) ?></option>
          <?php endforeach ?>
        </select>
    </form>
    </div>
    <section id="About Us">
      <div class="footer">
        <div class="title">
            <h3>About Us</h3>
            <p class="abouts">
              Saligao Dust Busters<br>                      
              Phone No: 2288293892<br>
              Saligao, Bardez Goa 403511<br>   
              Email:saligaodustbusters@gamil.com
            </p>
            <p>Dust | Busters</p>
          </ul>
      </div>
    </div>
  </div>
</section>
    

<script>

var map;

function initMap3() {
    let locations = [];
    let binid = [];
    let dates = [];
    
<?php foreach ($bins as $bin): ?>
    binid.push(<?= esc($bin['BinId']) ?>);    
    locations.push({lat: <?=esc($bin['Lat'])?>, lng: <?=esc($bin['Lng'])?>});
    dates.push("<?=esc(date_format(date_create($bin['Date']), "d/m/Y"))?>");
<?php endforeach ?>
    map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: { lat: 15.54617, lng: 73.78902   },
  });
  const infoWindow = new google.maps.InfoWindow({
    content: "",
    disableAutoPan: true,
  });
  
  const markers = locations.map((position, i) => {
    const label = "<div>Bin No: "+binid[i]+"</div><div>Last Collected Date: "+dates[i]+"</div>";
    const marker = new google.maps.Marker({
      position,
      icon: "./images/bin.png",
    });

    // markers can only be keyboard focusable when they have click listeners
    // open info window when marker is clicked
    
    marker.addListener("click", () => {
      infoWindow.setContent(label);
      infoWindow.open(map, marker);
      

    });
    
    return marker;
    
  });

  // Add a marker clusterer to manage the markers.
new markerClusterer.MarkerClusterer({ map, markers });
}



window.initMap = initMap3;

function moveToLocation(){
  
  let lat = 15.54617;
  let lng = 73.78902;

  
  opt_id = document.getElementById("itype").value;

  <?php foreach ($bins as $bin): ?>
    if(opt_id == "<?= esc($bin['BinId']) ?>"){
      lat = <?=esc($bin['Lat'])?>;
      lng = <?=esc($bin['Lng'])?>;
    }

  <?php endforeach ?>

  map.setCenter({
    lat: lat,
    lng: lng
  })
  //console.log(opt);
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmVGrvfx1Gwl1-Bk3ozsgPkWsH7PipCyc&callback=initMap&v=weekly"
defer>
  
</script>

</body>
</html>