var mysql = require('mysql');

var conexion = mysql.createConnection({
    host: 'localhost',
    database:'user',
    user:'root',
    password:''
});

conexion.connect(function(error){
    if (error){
        throw error;
    }else{
        console.log('Conexion Exitosa, Buena Crack')
    }

})