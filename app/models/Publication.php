<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model {
    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    // Insert a new publication
    public function insert() {
        $SQL = 'INSERT INTO publication (profile_id, publication_title, publication_text, publication_status) VALUES (:profile_id, :publication_title, :publication_text, :publication_status)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'profile_id' => $this->profile_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status
        ]);
        $this->publication_id = self::$_conn->lastInsertId();
    }
    
    public function getAllForUser($userId) {
        $SQL = 'SELECT publication.* FROM publication 
                INNER JOIN profile ON publication.profile_id = profile.profile_id 
                WHERE profile.user_id = :user_id 
                ORDER BY publication.date DESC'; // Ensure 'date' is the correct column name in your 'publication' table
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['user_id' => $userId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function getById($publicationId) {
        $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id LIMIT 1';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publicationId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetch();
    }

    public function update() {
        $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, publication_status = :publication_status WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_id' => $this->publication_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status,
        ]);
    }

    public function delete($publicationId) {
        $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute(['publication_id' => $publicationId]);
    }
    
    public function search($query) {
        $SQL = "SELECT * FROM publications WHERE title LIKE :query OR content LIKE :query";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['query' => '%' . $query . '%']);
        return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Publication');
    }
}