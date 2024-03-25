<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Home/index">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/Profile/index">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/User/logout">Logout</a>
                    </li>
                </ul>
                <form class="d-flex" action="/Publication/search" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search by title or content..." aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
<div class="container mt-5">
    <h2>Edit Publication</h2>
    <form action="/Publication/edit/<?= $publication->publication_id; ?>" method="POST">
        <div class="mb-3">
            <label for="publicationTitle" class="form-label">Title:</label>
            <input type="text" class="form-control" id="publicationTitle" name="publication_title" required value="<?= htmlspecialchars($publication->publication_title); ?>">
        </div>
        <div class="mb-3">
            <label for="publicationText" class="form-label">Text:</label>
            <textarea class="form-control" id="publicationText" name="publication_text" rows="4" required><?= htmlspecialchars($publication->publication_text); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="publicationStatus" class="form-label">Status:</label>
            <select class="form-select" id="publicationStatus" name="publication_status">
                <option value="public" <?= $publication->publication_status === 'public' ? 'selected' : ''; ?>>Public</option>
                <option value="private" <?= $publication->publication_status === 'private' ? 'selected' : ''; ?>>Private</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
