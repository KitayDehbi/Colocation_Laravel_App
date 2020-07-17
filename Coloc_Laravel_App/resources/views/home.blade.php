@extends('template')

@section('content')

 
    
    <div style="height: 500px; width : 1200px; margin-left: 150px; margin-top: 70px;" id="map"></div>
        <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>-->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script>
    
    var mymap = L.map('map').setView([33.9065678, -5.5424542], 10.0);
    L.tileLayer('https://api.maptiler.com/maps/streets/256/{z}/{x}/{y}.png?key=MV2ZSRipnieOJ0TT6WRA', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    }).addTo(mymap);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
			"address" : 'Lahdim square Meknes Morroco'
		}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
                var marker = L.marker(results[0].geometry.location.lat(),results[0].geometry.location.lng()).addTo(mymap);
			} else {
				alert("Please enter correct place name");
			}
		});
    
    
    
</script>

@endsection
