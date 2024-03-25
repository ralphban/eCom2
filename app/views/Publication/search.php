<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results</h1>
        <?php if (!empty($publications)): ?>
            <div class="list-group">
                <?php foreach ($publications as $publication): ?>
                    <a href="/Publication/view/<?= $publication->id; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= htmlspecialchars($publication->title); ?></h5>
                            <small>Published Date Here</small>
                        </div>
                        <p class="mb-1"><?= htmlspecialchars(substr($publication->content, 0, 200)) . '...'; ?></p>
                        <small>Read more</small>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No publications found matching your search criteria.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
