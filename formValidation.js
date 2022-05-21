$(function () {
    let error_exit = false;
    $("#name").on("blur", function(event){
        const nameLength = event.target.value.length;
        if(nameLength > 20){
            $("#name-validation").text("お名前は20文字以内で入力してください");
            error_exit = true;
        }
        else{
            $("#name-validation").text("");
            error_exit = false;
        }
    });
    
    $("#email").on("blur", function(event){
        if(!/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/.test(event.target.value)){
            $("#email-validation").text("メールアドレス形式で入力してください");
            error_exit = true;
        }
        else{
            $("#email-validation").text("");
            error_exit = false;
        }
    });

    $("#department").on("blur", function(event){
        const nameLength = event.target.value.length;
        if(nameLength > 20){
            $("#department-validation").text("学部学科名は20文字以内で入力してください");
            error_exit = true;
        }
        else {
            $("#department-validation").text("");   
            error_exit = false;
        }
    });

    $("#tel").on("blur", function(event){
        const telValue = event.target.value;
        const telLength = telValue.length;
        if(telValue.indexOf('-') !== -1){
            $("#tel-validation").text("電話番号にハイフンを含めないでください");
            error_exit = true;
            return;
        }
        if(telLength !== 10 || telLength !== 11){
            $("#tel-validation").text("電話番号は10文字または11文字で入力してください");
            error_exit = true;
            return;
        }
        $("#tel-validation").text("");
        error_exit = false;
    });
    
    $("#content").on("blur", function(event){
        const contentLength = event.target.value.length;
        if(contentLength > 1000){
            $("#content-validation").text("お問い合わせ内容は1000文字以内で入力してください");
            error_exit = true;
        }
        else{
            $("#content-validation").text("");
            error_exit = false;
        }
        
    })
    if(error_exit){
        $("#submit-button").prop("disabled", true);
    }else{
        $("#submit-button").prop("disabled", false);
    }
});