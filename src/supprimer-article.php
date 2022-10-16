<?php include('bdd.php');

if(isset($_POST['delete'])){
    $getid = $_POST['id'];

    $sql = "DELETE FROM articles WHERE id='$getid'";

    if ($con->query($sql) === TRUE) {
        echo "Article delete";
        echo '<script LANGUAGE="JavaScript">
                document.location.href = "index.php"
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>
