<?php
//require_once database connection
require '../GetURL.php';
if (isset($_POST['delete_id'])) {
    $deleteid = $_POST['delete_id'];
    delete($deleteid, 'section');
    delete($deleteid, 'image');
}

function delete($id, $table) {
    try {
        require 'ConnectToDataBase.php';
        $query = "DELETE FROM $table WHERE SectionID =  :SectionID";
        $stmt = $dbhandle->prepare($query);
        $stmt->bindParam(':SectionID', $id);

        if ($stmt->execute()) {
            echo "Section was deleted.";
        } else {
            echo "Unable to delete section.";
        }
    }
//to handle error
    catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
}
