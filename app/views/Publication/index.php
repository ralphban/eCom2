<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 0;
        }
        .status-public {
            color: #28a745;
        }
        .status-private {
            color: #dc3545;
        }
        .action-buttons a {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
    </style>
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
    <h2 class="mb-4">Publications</h2>
    <?php if (!empty($publications)): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($publications as $publication): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title"><?= htmlspecialchars($publication->publication_title); ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= nl2br(htmlspecialchars($publication->publication_text)); ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small>Published on: <?= htmlspecialchars($publication->date); ?></small>
                            <span class="badge <?= $publication->publication_status === 'public' ? 'bg-success' : 'bg-danger'; ?>">
                                <?= ucfirst($publication->publication_status); ?>
                            </span>
                            <div class="action-buttons">
                                <a href="/Comment/add/<?= $publication->publication_id; ?>" class="btn btn-sm btn-outline-primary">Add Comment</a>
                                <a href="/Publication/edit/<?= $publication->publication_id; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="/Publication/delete/<?= $publication->publication_id; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No publications found.</p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
