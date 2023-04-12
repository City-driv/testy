<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Merci</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Nunito", sans-serif;
    }
    
    .result {
      background: #ffffff47
    }
    
    .container1 {
      min-height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }
    
    .card1 {
      max-width: 440px;
      min-height: 250px;
      background: rgba( 255, 255, 255, 0.15 );
      box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
      backdrop-filter: blur( 18px );
      -webkit-backdrop-filter: blur( 18px );
      border: 1px solid rgba( 255, 255, 255, 0.18 );
      border-radius: 1rem;
      padding: 1.5rem;
      z-index: 10;
      color: black;
    }
    
    .title1 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    
    .subtitle {
      font-size: 1rem;
      margin-bottom: 2rem;
    }
    
    .btn {
      background: none;
      border: none;
      text-align: center;
      font-size: 1rem;
      color: whitesmoke;
      background-color: #fa709a;
      padding: 0.8rem 1.8rem;
      border-radius: 2rem;
      cursor: pointer;
    }
    .btn:hover{
      color: rgb(0, 0, 0);
      background-color: #5c9df1;
    }
    
    .blob {
      position: absolute;
      width: 500px;
      height: 500px;
      background: linear-gradient(
        180deg,
        rgba(47, 184, 255,0.42) 31.77%,
        #5c9df1 100%
      );
      mix-blend-mode: color-dodge;
      -webkit-animation: move 25s infinite alternate;
              animation: move 25s infinite alternate;
      transition: 1s cubic-bezier(0.07, 0.8, 0.16, 1);
    }
    
    .blob:hover {
      width: 520px;
      height: 520px;
      -webkit-filter: blur(30px);
              filter: blur(30px);
      box-shadow:
        inset 0 0 0 5px rgba(255,255,255, 0.6),
        inset 100px 100px 0 0px #fa709a,
        inset 200px 200px 0 0px #784ba8,
        inset 300px 300px 0 0px #2b86c5;
    }
    
    @-webkit-keyframes move {
      from {
        transform: translate(-100px, -50px) rotate(-90deg);
        border-radius: 24% 76% 35% 65% / 27% 36% 64% 73%;
      }
    
      to {
        transform: translate(500px, 100px) rotate(-10deg);
        border-radius: 76% 24% 33% 67% / 68% 55% 45% 32%;
      }
    }
    
    @keyframes move {
      from {
        transform: translate(-100px, -50px) rotate(-90deg);
        border-radius: 24% 76% 35% 65% / 27% 36% 64% 73%;
      }
    
      to {
        transform: translate(500px, 100px) rotate(-10deg);
        border-radius: 76% 24% 33% 67% / 68% 55% 45% 32%;
      }
    }
    </style>    
</head>
<body>
  
  <div class="result">
    <div class="container1">
      <div class="card1">
        <h1 class="title1">Nous vous remercions de votre participation.</h1>
        <p class="subtitle">{{$msg}}</p>
        🥳
        <form>
          <button class="btn" type="submit" onclick="Fermer()">Merci et à bientôt</button>
        </form>
      </div>
      <div class="blob"></div>
    </div>
  </div>  

  <script>
      function Fermer(){
        window.close();
      }
  </script>  
  
</body>
</html>