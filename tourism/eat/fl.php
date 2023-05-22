<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.76078, lng: 121.43836 },
          zoom: 12,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
            { placeId: "ChIJ2Vb6pM2vaDQRS0aZZOo3s1c", name: "蜂之鄉 - 鳳林蜜蜂生態教育館" },
            { placeId: "ChIJ6bZ7KUOyaDQRc-fmJfUIO00", name: "鍾家臘肉客家美食館" },
            { placeId: "ChIJiQz9AMCvaDQRoySAN6m8XkQ", name: "大方花園小木屋民宿" },
            { placeId: 'ChIJiQz9AMCvaDQRoySAN6m8XkQ', name: "芳草古樹" },
            { placeId: 'ChIJqVWq-FjwaDQRb8fIc1HiUUs', name: "月廬" },   
            { placeId: 'ChIJXbG5XkKyaDQRJ_hQgT2cfWI', name: "林田山豬腳" },   
            { placeId: 'ChIJ4xH0GwOuaDQR87ZVXyPmbIY', name: "明新冰菓室" },   
            { placeId: 'ChIJE1rCJOGvaDQRCtSSrYWVc8s', name: "青葉小館" }];

        // mark
        places.forEach((place) => {
          const request = {
            placeId: place.placeId,
            fields: ["name", "formatted_address", "geometry", "rating"],
          };
          const infowindow = new google.maps.InfoWindow();

          service.getDetails(request, (placeResult, status) => {
            if (
              status === google.maps.places.PlacesServiceStatus.OK &&
              placeResult &&
              placeResult.geometry &&
              placeResult.geometry.location
            ) {
              const marker = new google.maps.Marker({
                map,
                position: placeResult.geometry.location,
              });

              google.maps.event.addListener(marker, "click", () => {
                const content = document.createElement("div");
                const nameElement = document.createElement("h2");
                nameElement.classList.add("name");

                nameElement.textContent = place.name;
                content.appendChild(nameElement);

                const placeIdElement = document.createElement("p");
                placeIdElement.textContent = placeResult.place_id;
                content.appendChild(placeIdElement);

                const placeAddressElement = document.createElement("p");
                placeAddressElement.textContent = placeResult.formatted_address;
                placeAddressElement.classList.add("address");
                content.appendChild(placeAddressElement);

                const ratingElement = document.createElement("p");
                ratingElement.textContent = "Rating: " + placeResult.rating;
                content.appendChild(ratingElement);

                const mapLinkElement = document.createElement("a");
                const searchQuery = encodeURIComponent(placeResult.name);
                mapLinkElement.href = `https://www.google.com/maps/search/?api=1&query=${searchQuery}`;
                mapLinkElement.target = "_blank";
                mapLinkElement.textContent = "View on Google Maps";
                content.appendChild(mapLinkElement);

                infowindow.setContent(content);
                infowindow.open(map, marker);
              });
            }
          });
        });
      }

      window.initMap = initMap;
    </script>
    <style>
        #map {
            height: 400px;
            width: 60%;
            margin: auto;
        }

        .address {
            color: #868B8E; /* details address color */
        }

        .name {
            color: #B9B7BD;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=API_KEY_HERE&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>
  </body>
</html>