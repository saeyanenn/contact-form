$(function () {
  const errors = {
    name: false,
    email: false,
    department: false,
    tel: false,
    content: false,
  };
  let errorJudgementArray = [];
  $("#name").on("blur", function (event) {
    const nameLength = event.target.value.length;
    if (nameLength > 20) {
      $("#name-validation").text("お名前は20文字以内で入力してください");
      errors.name = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);
    } else {
      $("#name-validation").text("");
      errors.name = false;
      errorJudgementArray = Object.values(errors);
      if (!errorJudgementArray.includes(true)) {
        $("#submit-button").prop("disabled", false);
      }
    }
  });

  $("#email").on("blur", function (event) {
    if (
      !/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/.test(
        event.target.value
      )
    ) {
      $("#email-validation").text("メールアドレス形式で入力してください");
      errors.email = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);
    } else {
      $("#email-validation").text("");
      errors.email = false;
      errorJudgementArray = Object.values(errors);
      if (!errorJudgementArray.includes(true)) {
        $("#submit-button").prop("disabled", false);
      }
    }
  });

  $("#department").on("blur", function (event) {
    const nameLength = event.target.value.length;
    if (nameLength > 20) {
      $("#department-validation").text(
        "学部学科名は20文字以内で入力してください"
      );
      errors.department = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);
    } else {
      $("#department-validation").text("");
      errors.department = false;
      errorJudgementArray = Object.values(errors);
      if (!errorJudgementArray.includes(true)) {
        $("#submit-button").prop("disabled", false);
      }
    }
  });

  $("#tel").on("blur", function (event) {
    const telValue = event.target.value;
    const telLength = telValue.length;
    if (telValue.indexOf("-") !== -1) {
      $("#tel-validation").text("電話番号にハイフンを含めないでください");
      errors.tel = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);

      return;
    }
    if (telLength !== 10 && telLength !== 11) {
      $("#tel-validation").text(
        "電話番号は10文字または11文字で入力してください"
      );
      errors.tel = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);

      return;
    }
    $("#tel-validation").text("");
    errors.tel = false;
    errorJudgementArray = Object.values(errors);
    if (!errorJudgementArray.includes(true)) {
      $("#submit-button").prop("disabled", false);
    }
  });

  $("#content").on("blur", function (event) {
    const contentLength = event.target.value.length;
    if (contentLength > 1000) {
      $("#content-validation").text(
        "お問い合わせ内容は1000文字以内で入力してください"
      );
      errors.content = true;
      errorJudgementArray = Object.values(errors);
      $("#submit-button").prop("disabled", true);
    } else {
      $("#content-validation").text("");
      errors.content = false;
      errorJudgementArray = Object.values(errors);
      if (!errorJudgementArray.includes(true)) {
        $("#submit-button").prop("disabled", false);
      }
    }
  });
});
