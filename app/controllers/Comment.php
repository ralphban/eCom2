<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Publication;

class Comment extends Controller {

    public function add($publicationId) {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }
    
        // Handling the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentModel = new \app\models\Comment();
    
            // Use the profile ID from the session. Ensure this is set correctly upon user login.
            if (isset($_SESSION['profile_id'])) {
                $profileId = $_SESSION['profile_id']; // Correctly retrieving the profile ID from session
            } else {
                // Handle case where profile_id is not set in session
                echo "Error: User profile ID is missing.";
                exit;
            }
    
            $commentModel->profile_id = $profileId;
            $commentModel->publication_id = $publicationId;
            $commentModel->comment_text = $_POST['comment_text'];
    
            // Attempt to insert the new comment
            try {
                $commentModel->insert();
                // Redirect back to the publication view or comment view
                header('Location: /Publication/index/' . $publicationId);
                exit;
            } catch (\Exception $e) {
                // Handle insertion error, log error, and/or display error message
                echo "An error occurred while adding the comment.";
                exit;
            }
        } else {
            // Display the form for adding a new comment
            $this->view('Comment/add', ['publicationId' => $publicationId]);
        }
    }

    // Editing an existing comment
    public function edit($commentId) {
        $comment = new PublicationComment();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Fetch the existing comment to ensure the user is the owner
            $existingComment = $comment->getById($commentId);
            if ($existingComment->profile_id != $_SESSION['profile_id']) {
                // Handle unauthorized access attempt
                exit('Unauthorized access.');
            }

            $comment->publication_comment_id = $commentId;
            $comment->comment_text = $_POST['comment_text'];
            $comment->update();
            header('Location: /Publication/index/' . $existingComment->publication_id); // Adjust as needed
            exit;
        }
        // Show edit comment form or handle differently if not POST
    }

    // Deleting an existing comment
    public function delete($commentId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new PublicationComment();
            // Fetch the existing comment to ensure the user is the owner
            $existingComment = $comment->getById($commentId);
            if ($existingComment->profile_id != $_SESSION['profile_id']) {
                // Handle unauthorized access attempt
                exit('Unauthorized access.');
            }

            $comment->publication_comment_id = $commentId;
            $comment->delete();
            header('Location: /Publication/index/' . $existingComment->publication_id); // Adjust as needed
            exit;
        }
        // Handle differently if not POST, perhaps show a confirmation form
    }
}
