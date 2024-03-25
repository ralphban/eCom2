<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Comment</h2>
        <form action="/Comment/edit/<?= $comment->publication_comment_id; ?>" method="POST">
            <div class="mb-3">
                <label for="commentText" class="form-label">Comment:</label>
                <textarea class="form-control" id="commentText" name="comment_text" rows="3" required><?= htmlspecialchars($comment->comment_text); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
