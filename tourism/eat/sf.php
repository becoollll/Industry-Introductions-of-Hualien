<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.867581, lng: 121.553622 },
          zoom: 11,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
            {placeId: "ChIJo5ifqUKgaDQRpFmwTG8ZGEQ", name: "望海巴耐餐廳/咖啡" },
{placeId: "ChIJqxQnFTOnaDQRw7iV2WfpDPI", name: "海角工作室" },
{placeId: "ChIJjWKoI5aoaDQRTgyuIofv2cs", name: "吉籟獵人學校" },
{placeId: "ChIJTWGRPMagaDQRmYxpbTstAes", name: "嘟邁風味餐" },
{placeId: "ChIJ14pxmMigaDQRFXvzYWY2Rf0", name: "Umi屋銤海鮮料理" },
{placeId: "ChIJ_TiVxcigaDQRDwIlNzvwFfc", name: "海風味小吃" },
{placeId: "ChIJ-ysDlxKjaDQRaAW7qk1IxBY", name: "莫內花園" },
{placeId: "ChIJpVQA4bujaDQRkn_8DVsnVOE", name: "鯉魚潭小吃店" },
{placeId: "ChIJdQVTsMulaDQRrMR9qv5SLTQ", name: "怡園渡假村" },
{placeId: "ChIJ_wv0_76jaDQRrJ8jKq1yCgs", name: "樹屋風味餐廳" },
{placeId: "ChIJeeatxUGkaDQR-tk_i0qlkEI", name: "豐春冰菓店" },
{placeId: "ChIJMRIKfTOnaDQR0-HhTUjrbwM", name: "055海鮮專賣店" },
{placeId: "ChIJVR1eE7mlaDQRjf7AICt0PL4", name: "微風星情民宿" },
{placeId: "ChIJoedrLMylaDQR4SWbhFrAZxE", name: "禾園悅舍民宿" },
{placeId: "ChIJJ3XVcoyjaDQR7wp_kGIDKpc", name: "藍海觀景餐廳" }];

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