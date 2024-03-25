<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Your Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						Create Your Profile
					</div>
					<div class="card-body">
						<form method='post' action=''>
							<div class="mb-3">
								<label for="firstName" class="form-label">First Name</label>
								<input type="text" class="form-control" id="firstName" name="first_name" placeholder="Jon" required>
							</div>
							<div class="mb-3">
								<label for="lastName" class="form-label">Last Name</label>
								<input type="text" class="form-control" id="lastName" name="last_name" placeholder="Doe" required>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Record my profile</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
