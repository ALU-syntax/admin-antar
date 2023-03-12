<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <!-- gmaps Examples section start -->
            <section id="gmaps-basic-maps">
                <!-- Basic Map -->
                <div class="row">
                    <div class="col-lg-3 side-left d-flex align-items-stretch">
                        <div id="mobileshow" class="col-12 stretch-card">
                            <div class="card">
                                <div class="card-body overview">
                                    <h4>Pickup Customer</h4>
                                    <div class="posts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tracking Driver</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="map" style="height: 800px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 side-left d-flex align-items-stretch">
                        <div id="mobileshow" class="col-12 stretch-card">
                            <div class="card">
                                <div class="card-body overview">
                                    <h4>Tujuan Ke</h4>
                                    <div class="posts2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- end of maps tracking -->
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>

<!-- END: Content-->
<script src="https://maps.googleapis.com/maps/api/js?key=<?= google_maps_api ?>&callback=initMap" async defer></script>
<script>
    initMap();
    var gmarkers = [];
    var map;

    function initMap() {
        $.ajax({
            url: "<?= base_url(); ?>api/pelanggan/alldriver/ok",
            type: "GET",
            success: function(data) {
                var data_parse = data.data;
                if (data_parse.length != 0) {
                    for (var i = 0; i < data_parse.length; i++) {
                        var lat = data_parse[i].latitude;
                        var lng = data_parse[i].longitude;
                        var online = data_parse[i].status;
                        var nama_driver = data_parse[i].nama_driver;
                        var uluru = {
                            lat: parseFloat(lat),
                            lng: parseFloat(lng)
                        };
                        if (i == 0) {
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 15,
                                center: uluru
                            });
                        }
                        if (online == "1")
                            var image = '<?= base_url(); ?>images/icon/active.png';
                        else if (online == "2")
                            var image = '<?= base_url(); ?>images/icon/bekerja.png';
                        else if (online == "3")
                            var image = '<?= base_url(); ?>images/icon/bekerja.png';
                        else if (online == "4")
                            var image = '<?= base_url(); ?>images/icon/nonactive.png';
                        else if (online == "5")
                            var image = '<?= base_url(); ?>images/icon/nonactive.png';
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            icon: image,
                            title: nama_driver
                        });
                        var styles = [  {
  "featureType": "administrative",
  "elementType": "geometry.fill",
  "stylers": [
    {
      "color": "#d6e2e6"
    }
  ]
},
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#cfd4d5"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#7492a8"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "lightness": 25
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#dde2e3"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#cfd4d5"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#dde2e3"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#7492a8"
      }
    ]
  },
  {
    "featureType": "landscape.natural.terrain",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#dde2e3"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.icon",
    "stylers": [
      {
        "saturation": -100
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#588ca4"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a9de83"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#bae6a1"
      }
    ]
  },
  {
    "featureType": "poi.sports_complex",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#c6e8b3"
      }
    ]
  },
  {
    "featureType": "poi.sports_complex",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#bae6a1"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "saturation": -45
      },
      {
        "lightness": 10
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#41626b"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#c1d1d6"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#a6b5bb"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#9fb6bd"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.icon",
    "stylers": [
      {
        "saturation": -70
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b4cbd4"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#588ca4"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#008cb5"
      }
    ]
  },
  {
    "featureType": "transit.station.airport",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "saturation": -100
      },
      {
        "lightness": -5
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a6cbe3"
      }
    ]
  }
];

                        /*this sets the style*/
                        map.setOptions({
                            styles: styles
                        });
                        var infoWindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', function() {
                            var markerContent = "<h4>" + this.title + "</h4>";
                            infoWindow.setContent(markerContent);
                            infoWindow.open(map, this);
                        });
                        // Push your newly created marker into the array:
                        gmarkers.push(marker);
                    }
                } else {
                    var uluru = {
                        lat: parseFloat("11.111111"),
                        lng: parseFloat("-1.133344")
                    };
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: uluru
                    });
                }
                addYourLocationButton(map, marker);
            }
        });
    }

    function addYourLocationButton(map, marker) {
        var controlDiv = document.createElement('div');

        var firstChild = document.createElement('button');
        firstChild.style.backgroundColor = '#fff';
        firstChild.style.border = 'none';
        firstChild.style.outline = 'none';
        firstChild.style.width = '40px';
        firstChild.style.height = '40px';
        firstChild.style.borderRadius = '2px';
        firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
        firstChild.style.cursor = 'pointer';
        firstChild.style.marginRight = '10px';
        firstChild.style.padding = '0px';
        firstChild.title = 'Your Location';
        controlDiv.appendChild(firstChild);

        var secondChild = document.createElement('div');
        secondChild.style.margin = '10px';
        secondChild.style.width = '18px';
        secondChild.style.height = '18px';
        secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
        secondChild.style.backgroundSize = '180px 18px';
        secondChild.style.backgroundPosition = '0px 0px';
        secondChild.style.backgroundRepeat = 'no-repeat';
        secondChild.id = 'you_location_img';
        firstChild.appendChild(secondChild);

        google.maps.event.addListener(map, 'dragend', function() {
            $('#you_location_img').css('background-position', '0px 0px');
        });

        firstChild.addEventListener('click', function() {
            var imgX = '0';
            var animationInterval = setInterval(function() {
                if (imgX == '-18') imgX = '0';
                else imgX = '-18';
                $('#you_location_img').css('background-position', imgX + 'px 0px');
            }, 500);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    marker.setPosition(latlng);
                    map.setCenter(latlng);
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '-144px 0px');
                });
            } else {
                clearInterval(animationInterval);
                $('#you_location_img').css('background-position', '0px 0px');
            }
        });

        controlDiv.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
    }

    function removeMarkers() {
        for (i = 0; i < gmarkers.length; i++) {
            gmarkers[i].setMap(null);
        }
    }

    function getVehicleAll2() {
        $.ajax({
            url: "<?= base_url(); ?>api/pelanggan/alldriver/ok",
            type: "GET",
            success: function(response) {
                var data_parse = response.data;
                removeMarkers();
                for (var i = 0; i < data_parse.length; i++) {
                    var lat = data_parse[i].latitude;
                    var lng = data_parse[i].longitude;
                    var online = data_parse[i].status;
                    var nama_driver = data_parse[i].nama_driver;
                    var uluru = {
                        lat: parseFloat(lat),
                        lng: parseFloat(lng)
                    };
                    if (online == "1")
                        var image = '<?= base_url(); ?>images/icon/active.png';
                    else if (online == "2")
                        var image = '<?= base_url(); ?>images/icon/bekerja.png';
                    else if (online == "3")
                        var image = '<?= base_url(); ?>images/icon/bekerja.png';
                    else if (online == "4")
                        var image = '<?= base_url(); ?>images/icon/nonactive.png';
                    else if (online == "5")
                        var image = '<?= base_url(); ?>images/icon/nonactive.png';
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        icon: image,
                        title: nama_driver
                    });


                    var infoWindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', function() {
                        var markerContent = "<h4>" + this.title + "</h4>";
                        infoWindow.setContent(markerContent);
                        infoWindow.open(map, this);
                    });
                    // Push your newly created marker into the array:
                    gmarkers.push(marker);
                }
            }
        });
    }

    function foo() {
        var day = new Date().getDay();
        var hours = new Date().getHours();

        // alert('day: ' + day + '  Hours : ' + hours );
        getVehicleAll2();

        if (day === 0 && hours > 12 && hours < 13) {}
        // Do what you want here:
    }

    setInterval(foo, 4000);
</script>

<script>
    gettransaksi();

    function gettransaksi() {
        $.ajax({
            url: "<?= base_url(); ?>api/pelanggan/alltransactionpickup",
            type: 'get',
            success: function(response) {
                $(".number-of-posts").html(response.data);
                posts = response.data;
                posts_html = '';
                for (var i = 0; i < posts.length; i++) {
                    id_transaksi = posts[i].id_transaksi;
                    alamat_asal = posts[i].alamat_asal;
                    alamat_tujuan = posts[i].alamat_tujuan;
                    order_fitur = posts[i].order_fitur;
                    icon_fitur = posts[i].icon;
                    nama_driver = posts[i].nama_driver;
                    nama_pelanggan = posts[i].fullnama;
                    posts_html += '<div class="row"><div class="col-12"><div class="wrapper border-bottom py-2"><div class="d-flex"><div class="badge badge-primary" style="max-height: 50px;"><img class="img-sm rounded-circle" src="<?= base_url(); ?>images/fitur/' + icon_fitur + '" alt=""></div><div class="wrapper ml-4"><div class="d-flex"><h4 class="mb-0">' + nama_driver + ' - ' + nama_pelanggan + '</h4><div class="rating ml-auto d-flex align-items-center"><h4 class="mb-0">$15</h4></div></div><marquee class="text-muted mb-0">' + alamat_asal + '</marquee><div class="d-flex"><div class="rating ml-auto d-flex align-items-center"><a href="<?= base_url() ?>/dashboard/detail/' + id_transaksi + '"><p class="mb-0">Detail</p></a></div></div></div></div></div></div></div>';

                }
                $(".posts").html(posts_html);
            }
        });
    }

    function foo() {
        var day = new Date().getDay();
        var hours = new Date().getHours();

        // alert('day: ' + day + '  Hours : ' + hours );
        gettransaksi();

        if (day === 0 && hours > 12 && hours < 13) {}
        // Do what you want here:
    }

    setInterval(foo, 4000);
</script>

<script>
    gettransaksi1();

    function gettransaksi1() {
        $.ajax({
            url: "<?= base_url(); ?>api/pelanggan/alltransactiondestination",
            type: 'get',
            success: function(response) {
                $(".number-of-posts").html(response.data);
                posts = response.data;
                posts_html = '';
                for (var i = 0; i < posts.length; i++) {
                    id_transaksi = posts[i].id_transaksi;
                    alamat_asal = posts[i].alamat_asal;
                    alamat_tujuan = posts[i].alamat_tujuan;
                    order_fitur = posts[i].order_fitur;
                    icon_fitur = posts[i].icon;
                    nama_driver = posts[i].nama_driver;
                    nama_pelanggan = posts[i].fullnama;
                    posts_html += '<div class="row"><div class="col-12"><div class="wrapper border-bottom py-2"><div class="d-flex"><div class="badge badge-primary" style="max-height: 50px;"><img class="img-sm rounded-circle" src="<?= base_url(); ?>images/fitur/' + icon_fitur + '" alt=""></div><div class="wrapper ml-4"><div class="d-flex"><h4 class="mb-0">' + nama_driver + ' - ' + nama_pelanggan + '</h4><div class="rating ml-auto d-flex align-items-center"><h4 class="mb-0">$15</h4></div></div><marquee class="text-muted mb-0">' + alamat_tujuan + '</marquee><div class="d-flex"><div class="rating ml-auto d-flex align-items-center"><a href="<?= base_url() ?>/dashboard/detail/' + id_transaksi + '"><p class="mb-0">Detail</p></a></div></div></div></div></div></div></div>';

                }
                $(".posts2").html(posts_html);
            }
        });
    }

    function foo() {
        var day = new Date().getDay();
        var hours = new Date().getHours();

        // alert('day: ' + day + '  Hours : ' + hours );
        gettransaksi1();

        if (day === 0 && hours > 12 && hours < 13) {}
        // Do what you want here:
    }

    setInterval(foo, 4000);
</script>