function checkName(){
    var bb=true;
    var namestr=document.getElementById('name').value;
    document.getElementById('nameinfo').innerHTML="";
    if(namestr==""){
        document.getElementById('nameinfo').innerHTML="用户名不能为空";
        document.getElementById('nameinfo').focus();
        bb=false;
    }

    for(var i=0;i<namestr.length;i++){
        var j=namestr.substr(i,1);
        if(isNaN(j)==false){
            document.getElementById("nameinfo").innerHTML="用户名里不能包含数字或空格";
            bb=false;
            break;
        }
    }
    return bb;
}

function checkPassword(){
    var bb=true;
    var passwd=document.getElementById('password').value;
    document.getElementById('passwordinfo').innerHTML="";
    if(passwd==""){
        document.getElementById('passwordinfo').innerHTML="密码不能为空";
        bb=false;
    }
    return bb;
}

function mycheck(){
    var flag=true, flag1=false, flag2=false;
    flag1 = checkName();
    flag2 = checkPassword();
    flag  = flag1 && flag2;
    return flag;
}
