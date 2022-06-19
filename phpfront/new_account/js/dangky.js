function validate(){
    var bool=true;
    if(!/\D\w$/.test($(".name").val())){
        $(".name").css("border","1px solid red");
        $(".tt_name").text("Họ tên không hợp lệ!");
        bool=false;
    }
    else{
        $(".name").css("border","1px solid #afafaf");
        $(".tt_name").text("");
    }
    if(!/^[a-zA-Z0-9!@#$%^&*?]+$/.test($(".pass").val())){
        $(".pass").css("border","1px solid red");
        $(".tt_pass").text("Mật khẩu không hợp lệ!");
        $(".btx_sigin").attr("type","button");
        bool=false;
    }
    else{
        $(".pass").css("border","1px solid #afafaf");
        $(".tt_pass").text("");
    }
    if(!$(".adress").val()){
        $(".adress").css("border","1px solid red");
        $(".tt_adress").text("Địa chỉ không hợp lệ");
        bool=false;
    }
    else{
        $(".adress").css("border","1px solid #afafaf");
        $(".tt_adress").text("");
    }
    if(!/^0+\d{9}$/.test($(".phone").val())){
        $(".phone").css("border","1px solid red");
        $(".tt_phone").text("Số điện thoại phải không hợp lệ!");
        bool=false;
    }
    else{
        $(".phone").css("border","1px solid #afafaf");
        $(".tt_phone").text("");
    }
    if(!bool){
        $(".btx_sigin").attr("type","button");
    }
    else{
        $(".btx_sigin").attr("type","submit");
    }
}