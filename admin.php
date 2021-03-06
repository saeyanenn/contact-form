<?php
include_once('./functions.php');
$user = 'sae';
$pass = '428122';

if (isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER["PHP_AUTH_USER"] == $user && $_SERVER["PHP_AUTH_PW"] == $pass)) {
} else {
    header("WWW-Authenticate: Basic realm=\"basic\"");
    header("HTTP/1.0 401 Unauthorized - basic");
    exit();
}
include_once("./database_connect.php");
try {
    $db_handler = connect_database();
    $stamatent = $db_handler->prepare('SELECT * FROM Contact');
    $stamatent->execute();
    $result = $stamatent->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo 'DB接続エラー！: ' . $th->getMessage();
    exit();
}

?>



<!DOCTYPE html>
<html lang="ja">
<?php include_once("head.php") ?>

<body>
    <?php
    $header_text = "お問い合わせ一覧";
    include_once("header.php");
    ?>
    <main>
        <div class="content-data-box">
            <?php foreach ($result as $value) {
                $created_at = new DateTime($value["created_at"]);
                $formatted_created_at =  $created_at->format('Y/m/d');
            ?>

                <a href="./contact_detail.php?id=<?= $value["id"]; ?>" class="contact-data">
                    <time><?= $formatted_created_at; ?></time>
                    <small class=<?= addStyleBySubject($value["subject"]) ?>><?= $value["subject"]; ?></small>
                    <span class='inform_sender'><?= $value["name"]; ?>さんからお問合せがありました！</span>
                    </br>
                </a>

            <?php }; ?>
        </div>
    </main>
</body>

</html>