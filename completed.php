<?php
include_once("./database_connect.php");
$name           = $_POST["name"];
$email          = $_POST["email"];
$department     = $_POST["department"];
$tel            = $_POST["tel"];
$subject        = $_POST["subject"];
$content        = $_POST["content"];

$errors = [];

if (mb_strlen($name) > 20) {
    array_push($errors, "お名前は20文字以内で入力してください");
}

$email_pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";
if (!preg_match($email_pattern, $email)) {
    array_push($errors, "メールアドレス形式で入力してください");
}

if (mb_strlen($department) > 20) {
    array_push($errors, "学部学科名は20文字以内で入力してください");
}

if (strpos($tel, '-')) {
    array_push($errors, "電話番号にハイフンを含めないでください");
}

if (!10 <= mb_strlen($tel) <= 11) {
    array_push($errors, "電話番号は10文字または11文字で入力してください");
}

if (mb_strlen($content) > 1000) {
    array_push($errors, "お問い合わせ内容は1000文字以内で入力してください");
}

if (count($errors) > 0) {
    header('Location: http://localhost:8888/index.php');
}

$db_handler = connect_database();

$stmt = $db_handler->prepare("
INSERT INTO
Contact(name, email, department, tel, subject, content, created_at)
VALUES (:name, :email, :department, :tel, :subject, :content, now())
");

$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':department', $department, PDO::PARAM_STR);
$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
$stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
$stmt->bindParam(':content', $content, PDO::PARAM_STR);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once("head.php") ?>

<body>
    <?php include_once("header.php"); ?>
    <main>
        <section>
            <h1 class="completed-message">送信完了しました！</h1>
        </section>
    </main>
</body>

</html>