<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
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
    <div class='container mt-5'>
        <h1>Delete Profile</h1>
        <p class="mb-4">Do you want to proceed with deletion of your profile?</p>
        <div class="mb-3">
            <strong>First Name:</strong> <?= htmlspecialchars($data->first_name) ?>
        </div>
        <div class="mb-3">
            <strong>Last Name:</strong> <?= htmlspecialchars($data->last_name) ?>
        </div>
        <form method="post" action=''>
            <button type="submit" class="btn btn-danger" name="action" value="Delete">Delete</button>
            <a href='/Profile/index' class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
