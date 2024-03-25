<?php
namespace app\models;

use PDO;

class Comment extends \app\core\Model {
    public $publication_comment_id;
    public $profile_id;
    public $publication_id;
    public $comment_text;
    public $timestamp;

    // Insert a new comment
    public function insert() {
        $SQL = 'INSERT INTO publication_comment (profile_id, publication_id, comment_text) VALUES (:profile_id, :publication_id, :comment_text)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'profile_id' => $this->profile_id,
            'publication_id' => $this->publication_id,
            'comment_text' => $this->comment_text
        ]);
        $this->publication_comment_id = self::$_conn->lastInsertId();
    }

    // Get all comments for a specific publication
    public function getAllForPublication($publication_id) {
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id ORDER BY timestamp ASC';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Comment');
        return $STMT->fetchAll();
    }

    // Update a comment
    public function update() {
        $SQL = 'UPDATE publication_comment SET comment_text = :comment_text WHERE publication_comment_id = :publication_comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'comment_text' => $this->comment_text,
            'publication_comment_id' => $this->publication_comment_id
        ]);
    }

    // Delete a comment
    public function delete() {
        $SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_comment_id' => $this->publication_comment_id]);
    }
}
