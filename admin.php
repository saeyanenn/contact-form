<?php
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
function addStyleBySubject($subject)
{
    switch ($subject) {
        case '授業':
            $subject_color = "class";
            break;
        case 'サークル':
            $subject_color = "circle";
            break;
        case 'アルバイト':
            $subject_color = "parttime-job";
            break;
        case '就職活動':
            $subject_color = "job-hunting";
            break;
        case 'その他':
            $subject_color = "other";
            break;
        default:
            $subject_color = "default";
            break;
    }
    return $subject_color;
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

        <?php foreach ($result as $value) {
            $created_at = new DateTime($value["created_at"]);
            $formatted_created_at =  $created_at->format('Y/m/d');
        ?>
            <a href="./contact_detail.php?id=<?= $value["id"]; ?>" class="contact-data">
                <time><?= $formatted_created_at; ?></time>
                <small class=<?= addStyleBySubject($subject) ?>><?= $subject; ?></small>
                <span><?= $value["name"]; ?>さんからお問合せがありました！</span>
            </a>
            </div>
        <?php }; ?>
    </main>
</body>

</html>