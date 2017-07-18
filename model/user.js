var sqlite3=require('sqlite3').verbose();

function init(){
    return new sqlite3.Database("../sorteio.sqlite");
    
}

module.exports.login=function(login,password){
    db=init();
    var sucess=false;
    db.get('select login from user where login=? and password=?',login,password,function(err,row){
        sucess=row.login==login
    })
    db.close();
    return sucess
}