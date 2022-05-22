<?php
$contact_id = $_GET["id"];
include_once("./database_connect.php");
try {
    $db_handler = connect_database();
    $stamatent = $db_handler->prepare('SELECT * FROM Contact WHERE id = :id');
    $stamatent->bindParam(':id', $contact_id, PDO::PARAM_STR);
    $stamatent->execute();
    $result = $stamatent->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo 'DB接続エラー！: ' . $th->getMessage();
    exit();
}

$contact_data = $result[0];
$name = $contact_data["name"];
$email = $contact_data["email"];
$department = $contact_data["department"];
$subject = $contact_data["subject"];
$tel = $contact_data["tel"];
$content = $contact_data["content"];

?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once("head.php") ?>

<body>
    <?php
    $header_text = $name . "さんからのお問い合わせ";
    include_once("header.php");
    ?>
    <main>
        <?php

        ?>
    </main>
</body>

</html>