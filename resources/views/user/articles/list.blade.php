<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walk Together - Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        .hero-section {
            background: linear-gradient(to right, #e07102, #e3dd1d);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.25rem;
        }

        .article-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .article-card .card-header {
            background-color: #f8f9fa;
            font-size: 1.25rem;
            font-weight: 600;
            padding: 15px;
            border-bottom: 2px solid #ddd;
            text-align: center;
        }

        .article-card .card-body {
            padding: 30px 20px;
            background: #f9f9f9;
            position: relative;
            z-index: 1;
        }

        .article-card .card-text {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        .article-card .card-footer {
            background-color: #fff;
            text-align: center;
            padding: 10px;
            border-top: 2px solid #ddd;
        }

        .card-title a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        .card-title a:hover {
            color: #007bff;
        }

        .cta-btn {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1.2rem;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .cta-btn:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Smooth background transition for hover effect */
        .card:hover .card-body {
            background: #eef2f7;
        }

        /* Custom Grid Layout */
        .row .col-md-4 {
            transition: transform 0.3s ease-in-out;
        }

        .row .col-md-4:hover {
            transform: scale(1.05);
        }

        .like-btn {
            cursor: pointer;
            padding: 8px 15px;
            font-size: 1rem;
            background-color: #f0f0f0;
            border: none;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .like-btn:hover {
            background-color: #007bff;
            color: white;
        }

        .like-count {
            font-size: 1.1rem;
            margin-left: 10px;
        }

        /* Filter Dropdown */
        .filter-dropdown {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .filter-dropdown select {
            padding: 8px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to Walk Together</h1>
            <p>Explore the latest articles and resources to grow and connect with your community.</p>
            <a href="#articles" class="cta-btn">Browse Articles</a>
        </div>
    </section>

    <!-- Articles List Section -->
    <div id="articles" class="container mt-5">
        <div class="filter-dropdown">
            <select id="sortArticles" class="form-select" onchange="sortArticles()">
                <option value="newest">Sort by Newest</option>
                <option value="oldest">Sort by Oldest</option>
            </select>
        </div>
        <h2 class="mb-4 text-center">Latest Articles</h2>
        <div class="row" id="articleList">
            <!-- Loop through the articles -->
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card article-card">
                        <div class="card-header">
                            <a href="/articles/{{ $article->id }}" class="card-title">{{ $article->title }}</a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {!! Str::limit($article->content, 150) !!}
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="like-btn" onclick="likeArticle({{ $article->id }})">
                                ❤️ Like
                            </button>
                            <span class="like-count" id="like-count-{{ $article->id }}">{{ $article->likes_count }}</span>
                            <a href="/articles/{{ $article->id }}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Walk Together. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function sortArticles() {
            let sortBy = document.getElementById('sortArticles').value;
            // Make an AJAX request to fetch sorted articles based on the sort option
            window.location.href = `?sort=${sortBy}`;
        }

        function likeArticle(articleId) {
            fetch(`/articles/${articleId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                body: JSON.stringify({
                    article_id: articleId
                })
            })
            .then(response => response.json())
            .then(data => {
                const likeCountElement = document.getElementById(`like-count-${articleId}`);
                likeCountElement.textContent = data.likes_count;
            })
            .catch(error => {
                console.error('Error liking article:', error);
            });
        }
    </script>
</body>

</html>
