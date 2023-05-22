<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.49871, lng: 121.37751 },	
          zoom: 13,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
            {placeId: "ChIJVVqEhB1QbzQR13uNBi976Gc", name: "奇美部落廚房" },
{placeId: "ChIJ2zZKfGBPbzQRHTVYzPbcbPg", name: "涂媽媽肉粽" },
{placeId: "ChIJCeT2qpBObzQRv6NPAimi7fQ", name: "靜廬B&B" },
{placeId: "ChIJVwGH2CpEbzQRcfLVYHBC6_4", name: "掃叭頂景觀民宿" },
{placeId: "ChIJySXluNFFbzQRYhF7ucYBgds", name: "長聖吉林茶園" },
{placeId: "ChIJ49YLin9GbzQRXef1zKBXz2M", name: "海光茶行" },
{placeId: "ChIJ79hpOoNFbzQRa9_3EyfEYa0", name: "吉蒸牧場" },
{placeId: "ChIJ7-TDEFZPbzQRPMiAPRxjEh4", name: "虎爺溫泉" },
{placeId: "ChIJozQ8RvNFbzQR2NVEbFM1Ar8", name: "派出所前麵" },
{placeId: "ChIJcVd6kONFbzQRESqlF9JxFeQ", name: "歸園田居" }];

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