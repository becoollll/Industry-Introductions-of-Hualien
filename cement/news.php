<html>
<head>
    <title>相關新聞、文章</title>
    <link rel="stylesheet" type="text/css" href="../CSS/cement/news.css">
</head>

<body>
    <!-- 引入header -->
    <?php include("../header/header.php"); ?>
    <ul class="breadcrumb">
			<li>Home</li>
			<li>水泥業</li>
			<li>相關新聞、文章</li>
		</ul>	
    <div id="news-list" class="container"></div>
    <script>
        fetch('https://newsapi.org/v2/everything?q=花蓮水泥&sortBy=publishedAt&apiKey=3d6df53d194f4017944177c522ea5137') // 替換為你的API端點
            .then(response => response.json())
            .then(data => {
                // 處理API回應的資料
                const newsList = document.getElementById('news-list');
                data.articles.forEach(article => {
                    const title = article.title;
                    const url = article.url
                    // 使用正規表達式判斷新聞標題是否包含中文
                    const containsChinese = /[\u4e00-\u9fa5]/.test(title);
                    if (containsChinese) {
                        const articleElement = document.createElement('div');
                        articleElement.innerHTML = `<h2><a href="${url}">${title}</a></h2><p style="margin-bottom:3%;">${article.description}</p>`;
                        newsList.appendChild(articleElement);
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>
    <footer>
        <p class="footer-text">使用&ensp;<a href="https://newsapi.org/">News API</a></p>
    </footer>
    <!-- 引入footer -->
    <?php include("../footer/footer.php"); ?>
</body>
</html>
