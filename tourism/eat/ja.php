<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.98117, lng: 121.58811 },
          zoom: 13,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
            {placeId: "ChIJq8X1zXqfaDQRs72LkCCSuDc", name: "大寬有限公司" },
{placeId: "ChIJ-XuwdGafaDQRn8_EtumeKWg", name: "蒂樂義式奶酪小鋪" },
{placeId: "ChIJ9RAV96GfaDQRnpQpF2PMclw", name: "廟后碗粿" },
{placeId: "ChIJT8plyQifaDQRChfIWXwq4b0", name: "湘壽司屋" },
{placeId: "ChIJ4UIrkoSfaDQR1u7OPyVK8qM", name: "九九美式簡餐咖啡廳" },
{placeId: "ChIJU5rUqqOfaDQR2P0UgYtDRuw", name: "Good Day義大利麵坊" },
{placeId: "ChIJDVdmqZ6faDQRCIO0LUx_cUg", name: "銘師父餐廳" },
{placeId: "ChIJOy08wnGfaDQR0hhP8k88Whs", name: "阿姑的店" },
{placeId: "ChIJk8MNATmfaDQRiDoLjbTy5rY", name: "向陽山茶鋪" },
{placeId: "ChIJD6qxruWhaDQRpsk8QEl3Xzg", name: "櫻の田野養生館" },
{placeId: "ChIJMeQoHGefaDQR-2IC-ICV0hc", name: "吉農冰城" },
{placeId: "ChIJhdrObYOfaDQRJU7YHSNFUhg", name: "宜味食館" },
{placeId: "ChIJhxuLyYOfaDQRud2j5Uqipj0", name: "春田壽司屋" },
{placeId: "ChIJ-bD4D9ihaDQR6SPp_wCEI3s", name: "吉野精棧-Loft風格民宿" },
{placeId: "ChIJbeSWCWafaDQRNI5b9rCBu0M", name: "同方向點心舖(慶修院對面巷子裡)" },
{placeId: "ChIJVQS6QqKfaDQRw1GvwfydDz8", name: "馬卡龍民宿" },
{placeId: "ChIJx9KgDWafaDQR-C-3AZHCGaM", name: "惦惦咖啡 LAB tiamtiam" }];

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