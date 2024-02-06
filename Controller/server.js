 
 const express = require ("express");
 const mysql = require ("mysql");

 const app = express();

 const database = mysql.createConnection({
    host :"localhost",
    user:"root",
    password :"",
    database :"payment"
 
 })

 app.get("/orders",(req,res)=>{

    mysql ="SELECT * FROM orders";
    database.query(mysql,(err,data)=>{
        if(err) return res.json("Error");
        return res.json(data);
 })
})

app.listen(8081,()=>{
    console.log("Successfully Connected");
})
