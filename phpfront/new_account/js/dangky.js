
function validate(){
    $("#password-field").focus(function (e) { 
        e.preventDefault();
        $("#password-field").css("border","1px solid #ffffff");
    });
    $("#password-field").blur(function (e) { 
        e.preventDefault();
        $("#password-field").css("border","none");
    });
    var bool=true;
    if(!/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/.test($("#password-field").val())){
        $("#password-field").css("border","1px solid red");
        $("#password-field").attr("title","Mật khẩu trên 6 ký tự cần (chữ hoa đầu,số và kí tự đặc biệt)");
        bool=false;
    }
    else{
        bool=true;
    }
    if(!bool){
        $("#btn_register").attr("type","button");
    }
    else{
        $("#btn_register").attr("type","submit");
    }
}