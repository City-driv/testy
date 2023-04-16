<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Merci</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  <div class="result1">
    <div class="container1">
      <div class="card1">
        <h1 class="title1">Nous vous remercions de votre participation.</h1>
        <p class="subtitle1">{{$msg}}</p>
        🥳
          {{-- <button class="btn1" id="bt" onclick="setTimeout('window.close()', 500)">Merci et à bientôt</button> --}}
        
      </div>
      <div class="blob"></div>
    </div>
  </div>  
</body>
</html>