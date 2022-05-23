<?php

$input_array = [
    "name" => [
        "label" => "お名前",
        "type" => "text",
        "placeholder" => "山田太郎",
        "required" => true
    ],
    "email" => [
        "label" => "メールアドレス",
        "type" => "email",
        "placeholder" => "example@example.com",
        "required" => true
    ],
    "department" => [
        "label" => "学部・学科名",
        "type" => "text",
        "placeholder" => "工学部電気電子工学科",
        "required" => false
    ],
    "tel" => [
        "label" => "電話番号",
        "type" => "tel",
        "placeholder" => "09012345678",
        "required" => false
    ],
];

$subject_array = [
    "授業",
    "サークル",
    "アルバイト",
    "就職活動",
    "その他"
];
?>

<form action="./completed.php" method="POST">
    <?php foreach ($input_array as $key => $value) { ?>
        <div class="form-wrapper">
            <label for=<?= $key; ?>><?= $value["label"]; ?></label>
            <?php if ($value["required"]) : ?>
                <span class="required">必須</span>
            <?php endif; ?>
            <div>
                <input id=<?= $key; ?> type=<?= $value["type"]; ?> name=<?= $key; ?> placeholder=<?= "例）&nbsp;" . $value["placeholder"] ?> required="<?= $value["required"]; ?>">
                <span id=<?= $key . "-validation" ?> class="validation-message"></span>
            </div>
        </div>
    <?php } ?>
    <div class="form-wrapper">
        <label for="subject">件名</label>
        <select name="subject" id="subject">
            <?php foreach ($subject_array as $value) { ?>
                <option value=<?= $value; ?>><?= $value; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-wrapper">
        <label for="content">お問い合わせ内容</label>
        <span class="required">必須</span>
        <div>
            <textarea name="content" id="content" cols="30" rows="10" required=true placeholder="＊1000文字以内"></textarea>
            <span id="content-validation" class="validation-message"></span>
            <span id="count-word"></span>
        </div>
    </div>
    <div class="button-wrapper">
        <button type="submit" disabled="true" id="submit-button">
            送信
        </button>
    </div>

</form>