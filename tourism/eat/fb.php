<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.60039, lng: 121.52248 },
          zoom: 10,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
            { placeId: "ChIJizE_PWCraDQRPBhbJvKiwIM", name: "噶瑪蘭海產店" },
            { placeId: "ChIJUWp_MexQbzQRJYtjF6MtPmk", name: "口福海鮮餐廳" },
            { placeId: "ChIJxxEgBK1TbzQRKMO2r4z8XjA", name: "拙而奇藝術空間" },
            { placeId: 'ChIJNTJacKysaDQRR6mz_3u7Zf8', name: "東興野菜牛肉麵" },
            { placeId: 'ChIJuRTtpnFTbzQRnf4Zmf5dYso', name: "阿卿海鮮店" },   
            { placeId: 'ChIJIbZBDYWraDQRn9E9YVvUMlA', name: "頭目海產店" },   
            { placeId: 'ChIJbZrtpnFTbzQRY6jTRrIVOVY', name: "悟饕飯包" },   
            { placeId: 'ChIJu_wWKmKraDQR9-WISQolidQ', name: "lala Ban新社香蕉絲工坊" },   
            { placeId: 'ChIJ411mF3FTbzQR6e8Nwx7D7Sw', name: "菊荷美食屋" },   
            { placeId: 'ChIJKz7LznFTbzQRWAnhe3GVnZ4', name: "百合工作室" },   
            { placeId: 'ChIJFSix15BQbzQRXMtmsbwXLgA', name: "項鍊海岸工作室" },   
            { placeId: 'ChIJKz-iGVtQbzQRnSo0pWYr-io', name: "陶甕百合春天" }];


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