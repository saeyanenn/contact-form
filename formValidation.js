$(function () {
    $("#name").on("blur", function(event){
        const nameLength = event.target.value.length;
        if(nameLength > 20){
            $("#name-validation").text("お名前は20文字以内で入力してください")
        }
    });
    
    $("#email").on("blur", function(event){
        if(!/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/.test(event.target.value)){
            $("#email-validation").text("メールアドレス形式で入力してください")
        }
    });

    $("#department").on("blur", function(event){
        const nameLength = event.target.value.length;
        if(nameLength > 20){
            $("#department-validation").text("学部学科名は20文字以内で入力してください")
        }
    });

    $("#tel").on("blur", function(event){
        const telValue = event.target.value;
        const telLength = telValue.length;
        if(telValue.indexOf('-') !== -1){
            $("#tel-validation").text("電話番号にハイフンを含めないでください");
            return;
        }
        if(telLength !== 12 || telLength !== 13){
            $("#tel-validation").text("電話番号は12文字または13文字で入力してください")
        }
    });
    
    $("#content").on("blur", function(event){
        const contentLength = event.target.value.length;
        console.log(contentLength);
        if(contentLength > 1000){
            $("#content-validation").text("お問い合わせ内容は1000文字以内で入力してください")
        }
    })
});