<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile</title>
    <title>My Profile</title>
    <link rel="stylesheet" href="pro.css">
</head>
<body>
    <header>
        <h1>My Profile<i class="fa-solid fa-user img"></i>
        </h1>
        
    </header>
    <main>
        <section class="profile">
            <img src="../Model/pro.jpg">
          
           
         
        
              <h2>About me</h2>
              <p>Studis at Daffodil International University-ITM</p>
              <p>Studies at Dhanmondi Ideal College</p>
              <p>Living in Dhaka</p>
              <p>Single</p>
              <!-- <a href="">Facebook</a>
              <a href="">Linkdin</a> -->
            <br>
              
              <p id="demo"></p>
              <button background-color="red" onclick="typeWriter()" class="touch">Touch me</button>
                        
              </section>
    </main>
    <div class="fb">

        <a href="https://www.facebook.com/islamfull.5" class="fblink">Facebook <i class="fa-brands fa-facebook"></i></a></i>
        <br>
        <br>
             <a href="https://www.youtube.com/channel/UClBIz9HlgUBfzYvnj-xX2-w" class="tube">Youtube <i class="fa-brands fa-youtube"></i></a></i><br>
         </div>

    
    <footer>
        <p>Contact : romanoze@gmail.com</p>
    </footer>

    
    
    <script>
    var i = 0;
    
    var txt = 'Im sincere,responsible,dedicate,straight forward person I believe in connectivity because connectivity is producativity.Alwaysi try to encourage every people confidence is my power.Now Im 25I was born in Brahmanbaria.I grew up and also my study from Dhaka.I completed my HSC from Dhanmondi Ideal collage.Afterthat i went china for undergraduate,then,Now Im student of daffodil international university Department of Information technology and management (ITM),i completed 6th semester ,"THANK YOU"';
    
    var speed = 10;
    
    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    
      }
    }
    </script>
</body>
</html>