<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Publication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Are you sure you want to delete this publication?</h2>
    <form action="/Publication/delete/<?= $publication->publication_id; ?>" method="POST">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="/Publication/index" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
 