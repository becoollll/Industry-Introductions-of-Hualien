<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Place Details</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 23.99206, lng: 121.60325 },
          zoom: 12,
        });
        const service = new google.maps.places.PlacesService(map);

        // ID & names
        const places = [
{placeId: "ChIJZYwz3LWfaDQRWZSBDIl2EBU", name: "華聯遊覽-明利旅行社" },
{placeId: "ChIJ12qobrKfaDQRBryBMTM2Il8", name: "蜂之鄉-中央門市" },
{placeId: "ChIJA1fScLafaDQR7wfkKbKrwME", name: "蜂之鄉-花蓮站前店" },
{placeId: "ChIJRxN8nuqfaDQRiA3EGHItTB8", name: "蜂之鄉-花蓮中華店" },
{placeId: "ChIJxZYNiJafaDQRrm9pXueldxM", name: "豐興餅舖" },
{placeId: "ChIJ6w9iFcGfaDQRwGXgyR2PiUM", name: "胖叔叔烘焙屋" },
{placeId: "ChIJR8-FEbCfaDQRTe76kG3kc8g", name: "臺富便當" },
{placeId: "ChIJ90r5P7GfaDQRpr2aCNvoFZQ", name: "常春藤素食餐廳" },
{placeId: "ChIJY7hSX9GfaDQR7pfCM7cdi8Y", name: "府前食坊" },
{placeId: "ChIJFybtBL6faDQRsAZlQincMYg", name: "花蓮皇辣醬‧謝教練辣椒醬" },
{placeId: "ChIJUcmcTbSfaDQRAcKokgOLw38", name: "美崙紅茶" },
{placeId: "ChIJ-4pVBYEgZjQRCob1GtCaffY", name: "Biolove百艾重乳酪蛋糕" },
{placeId: "ChIJoUphS5ifaDQR8Xux11Pa9XM", name: "提拉米蘇精緻蛋糕" },
{placeId: "ChIJ7xSJ6cGfaDQRNlY9d2N8cMs", name: "曾記麻糬股份有限公司" },
{placeId: "ChIJ-fUtFpSfaDQR9R80MGJI4pE", name: "花蓮那魯灣旅店" },
{placeId: "ChIJ6w9iFcGfaDQRwGXgyR2PiUM", name: "麵包叔叔烘焙屋三民店" },
{placeId: "ChIJhbOuTbSfaDQR6JJ-UdNoKZU", name: "喜品家乳酪蛋糕" },
{placeId: "ChIJUcmcTbSfaDQR8ZmVX2oS-eM", name: "花蓮縣餅-菩提餅舖" },
{placeId: "ChIJb6Gur7ifaDQRYr0OjJFoenY", name: "鶴岡紅茶舖" },
{placeId: "ChIJ3-har5SfaDQR9hXfkZmltEM", name: "魚豐日式小吃" },
{placeId: "ChIJa5Yn1cGfaDQRx17TDBZ5rOg", name: "惠比須餅舖-百年花蓮薯創始店" },
{placeId: "ChIJrX5SeZwgZjQR8qg2ClWkGqc", name: "洋基牧場" },
{placeId: "ChIJbdsTAZafaDQRuHp0f2i5-zA", name: "紐約客牛排館" },
{placeId: "ChIJwbp4u2A9aTQRxbM-RsY6BOU", name: "吉野食堂" },
{placeId: "ChIJ946OiLGfaDQRdOmEBMvTi_s", name: "李記廣東粥" },
{placeId: "ChIJFYmlucGfaDQRLdMuqxc6mJA", name: "公正包子" },
{placeId: "ChIJxZXm_OmfaDQRxEkso4HZi14", name: "陳記狀元粥" },
{placeId: "ChIJsUKgr8CfaDQR-A_KezwH7sw", name: "液香扁食" },
{placeId: "ChIJ6eFUOcCfaDQRkEzpQWN4qJ8", name: "一品香扁食" },
{placeId: "ChIJ0WUwsMCfaDQRUv6USZWMO2k", name: "花蓮香扁食" },
{placeId: "ChIJA_pDd5qfaDQRGTj7HS0kMqs", name: "田村壽司" },
{placeId: "ChIJQcfXBZafaDQRfANB2I0bMnk", name: "賴桑壽司屋" },
{placeId: "ChIJ1dTt78afaDQRQLxHm5bDkkE", name: "邊城茶舖" },
{placeId: "ChIJbTYfatqfaDQR3d7Y9ElDdag", name: "伊江滇緬料理" },
{placeId: "ChIJZ8hjS8efaDQRZVmIcnuffFw", name: "暹羅泰食" },
{placeId: "ChIJXax5QNGfaDQRYtRtZalG-lQ", name: "Country Mother's" },
{placeId: "ChIJwax8bNSfaDQR3WAZvY6Y22I", name: "牛奶與蜜義大利麵" },
{placeId: "ChIJwVIwa7-faDQRvbvzowI6CNw", name: "夏日時光Summer Time" },
{placeId: "ChIJ6wLgWdSfaDQRIIHXfcYZFKY", name: "托斯卡義式廚房" },
{placeId: "ChIJ65x-WMCfaDQRulQntw-fnHw", name: "竹陽海鮮餐廳" },
{placeId: "ChIJmaVu3NqfaDQReBf86Df6YrA", name: "多桑" },
{placeId: "ChIJqQaZmL-faDQRpWoqk_NbFI8", name: "石庭客家小館" },
{placeId: "ChIJr04-k5afaDQRrHQI41v1PQY", name: "闔家歡南北餚餐館" },
{placeId: "ChIJddG1I76faDQRCFcFQhCvQ6U", name: "老邵餐館" },
{placeId: "ChIJq0yXbSueaDQRkZcZvhlW-Kk", name: "麥根香飲食店" },
{placeId: "ChIJ_3GYF8CfaDQRSKeZ12dMCq8", name: "起司蛋糕創意的人" },
{placeId: "ChIJqxJVyNCfaDQR7H1TvbFRSHU", name: "中一豆花" },
{placeId: "ChIJWdop27-faDQRgRYwRZM6o0w", name: "蔡記豆花" },
{placeId: "ChIJ7WT84cmfaDQRAcrDMksPvGI", name: "一心泡泡冰" },
{placeId: "ChIJ9bYcneqfaDQR3kAUxnvi_jw", name: "五霸焦糖包心粉圓" },
{placeId: "ChIJVVVVVZSfaDQRN9z5f2OzasM", name: "芋園屋" },
{placeId: "ChIJ19ntKOufaDQRUZqk5ZIIYxk", name: "廟口紅茶" },
{placeId: "ChIJIWDet8GfaDQR0aa9IXwGJPY", name: "周家蒸餃" },
{placeId: "ChIJ6aOCxMafaDQRU0mHJzoOCvg", name: "一碗小麵食館" },
{placeId: "ChIJw9KgE8CfaDQRjrrCaokwKZs", name: "芝麻開門日式洋食堂" },
{placeId: "ChIJ58xVPP6faDQRdoXCoCFG-iw", name: "自強夜市" },
{placeId: "ChIJzXEOMNGfaDQR3iK2CUQc2hw", name: "煙波大飯店花蓮館" },
{placeId: "ChIJB2M4gcCfaDQRzvPGGogt4-E", name: "椿山日本料理" },
{placeId: "ChIJ7T3mCpOfaDQRU9_jhVdvzm4", name: "花蓮Joe香腸" },
{placeId: "ChIJ7T3mCpOfaDQRU9_jhVdvzm4", name: "淳香美食(花蓮Joe香腸)" },
{placeId: "ChIJsU1rOeifaDQR56W01brD6xc", name: "秘密海咖啡" },
{placeId: "ChIJO75UKOufaDQRd-jSXXH2UbQ", name: "kkk" },
{placeId: "ChIJze4VKeqfaDQRWY9gtkEBHpQ", name: "陽光電城咖啡館" },
{placeId: "ChIJEyEhcyOeaDQRYq94XxmDqrY", name: "大溪地咖啡、義式料理" },
{placeId: "ChIJMym_8IYgZjQRZ8P0e8KtgBU", name: "花蓮港1-1倉庫美術館/維納斯藝廊" },
{placeId: "ChIJkz4nV7CfaDQRdVd_a2eR3iQ", name: "郭榮市手工煙燻火腿" },
{placeId: "ChIJ2UZ9CrafaDQRQ5Am1v5htJ4", name: "春秋大飯店" },
{placeId: "ChIJL0sOIcCfaDQR7Ilp79ybVDA", name: "他口墨西哥餐廳Dos Tacos Mexican Restaurant" },
{placeId: "ChIJRfnyAtSfaDQRgYdFRtKL-NU", name: "佟芫食坊" },
{placeId: "ChIJIUkXAZefaDQRlRwKMfznRCY", name: "力麗哲園花蓮館" },
{placeId: "ChIJyT43AQWfaDQRsURhe0sYrrQ", name: "旅人的家" },
{placeId: "ChIJn-ffNoEgZjQRfvK_PvhfnRE", name: "福容大飯店 花蓮" },
{placeId: "ChIJv2qMmY8gZjQR5IuO2o18SGg", name: "向日廣場" },
{placeId: "ChIJwax8bNSfaDQR3WAZvY6Y22I", name: "流奶與蜜-來自美國加州連鎖餐飲" },
{placeId: "ChIJs7hOEcCfaDQRgv2Y6xnS6es", name: "包餡雞蛋糕" },
{placeId: "ChIJA2dKiLGfaDQR1Wvp9LBmgWI", name: "元珍茶(鮮果汁.咖啡.茶飲)花蓮中山店" },
{placeId: "ChIJx21J-cGfaDQR51eQOumjkVA", name: "良友精緻飯店" },
{placeId: "ChIJIZpf-MGfaDQR6-_zhb3Qwp8", name: "凱悅精緻生活館花蓮民宿" },
{placeId: "ChIJhd7K_pSfaDQR5WQiGnwR-7M", name: "花蓮民宿歐洲之星" },
{placeId: "ChIJM4FGVBOfaDQRrjWlHznFgtc", name: "美可小吃" },
{placeId: "ChIJ75oUCq-faDQRxX9fcOoeFYc", name: "查理食藝私房料理" },
{placeId: "ChIJCehrC7-faDQRYhmEK6j8dv8", name: "咖多喜咖哩" },
{placeId: "ChIJo6ksgrOfaDQR6aRIR6GIs-Y", name: "瑪琪朵民宿" },
{placeId: "ChIJM13ySpKfaDQRqFDUq29p8F0", name: "幸福旅人民宿" },
{placeId: "ChIJuYW3zsafaDQR-BhwReHrOiA", name: "林記～明禮路葱油餅" },
{placeId: "ChIJkfDyFJGfaDQR_knP_6cw3Hw", name: "半個鍋-花蓮中正店" }];

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