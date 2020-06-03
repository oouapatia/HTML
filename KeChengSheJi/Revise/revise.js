
function checkName(){
    var bb=true;
    var namestr=document.getElementById('name').value;
    document.getElementById('nameinfo').innerHTML="";
    if(namestr==""){
        document.getElementById('nameinfo').innerHTML="用户名不能为空";
        document.getElementById('nameinfo').focus();
        bb=false;
    }
    return bb;
}
function checkPassword(){
    var bb=true;
    var password=document.getElementById('password').value;
    document.getElementById('passwordinfo').innerHTML="";
    if(password==""){
        document.getElementById('passwordinfo').innerHTML="密码不能为空";
        bb=false;
    }
    return bb;
}
function checkNewpassword(){
    var bb=true;
    var newpassword=document.getElementById('newpassword').value;
    document.getElementById('newpasswordinfo').innerHTML="";
    if(newpassword==""){
        document.getElementById('newpasswordinfo').innerHTML="密码不能为空";
        bb=false;
    }

    else if(newpassword.length<6){
            document.getElementById("newpasswordinfo").innerHTML="密码不能小于6个字符";
            bb=false;
        }
    if(newpassword.length>20){
        document.getElementById("newpasswordinfo").innerHTML="密码不能大于20个字符";
        bb=false;
    }
    return bb;
}
function checkRepassword(){
    var bb=true;
    var repassword=document.getElementById('repassword').value;
    var newpassword=document.getElementById('newpassword').value;
    document.getElementById('repasswordinfo').innerHTML="";
    if(repassword==""){
        document.getElementById('repasswordinfo').innerHTML="密码未确认";
        bb=false;
    }
    else if(repassword!=newpassword){
            document.getElementById('repasswordinfo').innerHTML="密码不一致";
            bb=false;
    }
    return bb;
}

function mycheck(){
    var flag=true,flag1=false,flag2=false,flag3=false,flag4=false;
    flag1 = checkName();
    flag2 = checkPassword();
    flag3 = checkNewpassword();
    flag4 = checkRepassword();
    flag  = flag1 && flag2 && flag3 && flag4;
    return flag;
}

