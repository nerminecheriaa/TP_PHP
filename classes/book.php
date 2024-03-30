
<?php

class Book {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function addBook($name, $author, $price, $imagePath) {
        // Basic verifications
        if (empty($name) || empty($author) || empty($price) || !is_numeric($price) || empty($imagePath)) {
            // One of the required fields is empty or price isn't a number
            return false; 
        }

        // Check if the book already exists
        $existingBook = $this->getBookByNameAndAuthor($name, $author);
        if ($existingBook) {
            // Book already exists
            return false;
        }
        $sql = "INSERT INTO `books` (`title`, `author`, `price`, `image`) VALUES (:name, :author, :price, :imagePath)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':author' => $author,
            ':price' => $price,
            ':imagePath' => $imagePath
        ]);
        return true;
    }

    public function deleteBook($book_id) {
        // Check if the book exists
        $existingBook = $this->getBookById($book_id);
        if (!$existingBook) {
            // Book doesn't exist, handle error or notify user
            return false;
        }

        $sql = "DELETE FROM `books` WHERE `isbn` = :book_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':book_id' => $book_id]);
    }

    // Function to get book by name and author for verification
    private function getBookByNameAndAuthor($name, $author) {
        $sql = "SELECT * FROM `books` WHERE `title` = :name AND `author` = :author";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':name' => $name, ':author' => $author]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to get book by ID for verification
    private function getBookById($book_id) {
        $sql = "SELECT * FROM `books` WHERE `isbn` = :book_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':book_id' => $book_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Function to get all the books helping to display the content of the data base 
    public function getAllBooks() {
        $sql = "SELECT * FROM `books`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>