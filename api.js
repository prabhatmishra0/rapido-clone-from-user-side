function initGoogle() {
    var location = {
        lat: 26.4634,
        lng: 80.3176
    }
    var options = {
        center: location,
        zoom: 12
    }

    var map;



    // for open your location
    // for checking your browser support navigation 
    if(navigator.geolocation) {

        navigator.geolocation.getCurrentPosition((loc) => {

            location.lat = loc.coords.latitude;
            location.lng = loc.coords.longitude;

            console.log(location.lat);
            console.log(location.lng);

            // write map
            map = new google.maps.Map(document.getElementById("map"), options);
        },
        (err) => {
            console.log("user clicked no lol");
            map = new google.maps.Map(document.getElementById("map"), options);

        }
        )
    }else{
        console.log('geolocation not supported : ( ');
        map = new google.maps.Map(document.getElementById("map"), options);
    }

    
    // for giving suggetion ( input 1 )
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("origin"), 
    {
        componentRestrictions: { 'country': ['in'] },
        fields: ['geometry' , 'name'],
        types: ['establishment']
    });

    // for giving suggetion ( input 1 )
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("destination"), 
    {
        componentRestrictions: { 'country': ['in'] },
        fields: ['geometry' , 'name'],
        types: ['establishment']
    });


    // for adding marker 

    // autocomplete.addListener("place_changed", () => {
    //     const place = autocomplete.getPlace();
    //     new google.maps.Marker({
    //         position: place.geometry.location,
    //         title: place.name,
    //         map: map
    //     })
    // });



    // get a input form input field 

    // document.getElementById('set').onclick = function() {
    //     var a = document.getElementById("origin").value;
    //     var b = document.getElementById("destination").value;

    //     console.log(a);
    //     console.log(b);

    // }



    document.getElementById('set').onclick = function() {
        calcRoute();
    }


    // create a Direction service object  to use the route method and

    var directionsService = new google.maps.DirectionsService();

    // create a DirectionsRender object which we will use to display 

    var directionsDisplay = new google.maps.DirectionsRenderer();

    function calcRoute(){
        
        // create a request
        var request = {
            origin: document.getElementById("origin").value,
            destination: document.getElementById("destination").value,
            travelMode: google.maps.TravelMode.DRIVING, //WALKING , BYCYCLING AND TRANSIT
            unitSystem: google.maps.UnitSystem.IMPERIAL
        }

        // PASS THE REQUEST TO THE ROUTE METHOD
        directionsService.route(request, (result, status)=>{
            if(status == 'OK') {
                // get distance and time
                const output = document.querySelector('#output');
                // output.innerHTML = "<div class='alert-info'> From : " + document.getElementById("origin").value + " .<br /> to : " + document.getElementById("destination").value + ".<br/> Driving Distance :" + result.routes[0].legs[0].distance.text + ". <br/> Duration : " + result.routes[0].legs[0].duration.text + ". </div>";

                console.log(result);
                
                // display route
                directionsDisplay.setDirections(result);
                directionsDisplay.setMap(map);

            }else {
                // delete route from map
                directionsDisplay.setDirections({ routes: []});

                // center map in india
                map.setCenter(location);

                // show error message
                output.innerHTML = "<div class='alert-danger'>danger thing </div>";
            }

        
        });
    }


}