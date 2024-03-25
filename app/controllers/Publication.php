<?php
namespace app\controllers;

class Publication extends \app\core\Controller {

    // Show all publications for the logged-in user or public publications for guests
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }
    
        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getAllForUser($_SESSION['user_id']);
        $this->view('Publication/index', ['publications' => $publications]); // Correct way to pass data to view
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                header('location:/User/login');
                exit;
            }

            $publication = new \app\models\Publication();
            $publication->profile_id = $this->getProfileId($_SESSION['user_id']);
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->publication_status = $_POST['publication_status']; // Expect 'public' or 'private'

            $publication->insert();
            header('location:/Home/index'); // Redirect to Home/index after creation
            exit;
        } else {
            $this->view('Publication/create');
        }
    }

    // Show form to edit an existing publication
    public function edit($publicationId) {
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }

        $publicationModel = new \app\models\Publication();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming the form data is validated
            $publicationModel->publication_id = $publicationId;
            $publicationModel->profile_id = $this->getProfileId($_SESSION['user_id']); // Ensure you have this method correctly implemented
            $publicationModel->publication_title = $_POST['publication_title'];
            $publicationModel->publication_text = $_POST['publication_text'];
            $publicationModel->publication_status = $_POST['publication_status'];
            $publicationModel->update();

            header('location:/Publication/index');
            exit;
        } else {
            $publication = $publicationModel->getById($publicationId);
            if ($publication) {
                $this->view('Publication/edit', ['publication' => $publication]);
            } else {
                echo "Publication not found.";
                exit;
            }
        }
    }

    public function delete($publicationId) {
    if (!isset($_SESSION['user_id'])) {
        header('location:/User/login');
        exit;
    }

    $publicationModel = new \app\models\Publication();
    if ($publicationModel->delete($publicationId)) {
        header('location:/Publication/index');
        exit;
    } else {
        // Log the error or display a more descriptive message
        echo "An error occurred during deletion.";
        exit;
    }
}

    // Utility function to get profile_id from user_id
    private function getProfileId($userId) {
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($userId);
        return $profile ? $profile->profile_id : null;
    }

    // Toggle publication status between public and private
    public function toggleVisibility($publicationId) {
        $publication = new \app\models\Publication();
        $currentStatus = $publication->getStatus($publicationId);

        $newStatus = ($currentStatus == 'public') ? 'private' : 'public';
        if ($publication->updateStatus($publicationId, $newStatus)) {
            header('location:/Publication/index');
        } else {
            echo "An error occurred.";
        }
        exit;
    }

    public function search() {
        // Adjusted from $_GET['query'] to $_GET['search']
        $searchQuery = $_GET['search'] ?? '';
    
        $searchQuery = filter_var($searchQuery, FILTER_SANITIZE_STRING);
    
        if (!empty($searchQuery)) {
            $publications = (new \app\models\Publication())->search($searchQuery);
            $this->view('Publication/searchResults', ['publications' => $publications, 'searchQuery' => $searchQuery]);
        } else {
            // Handle empty search query (e.g., redirect or show a message)
        }
    }
}
