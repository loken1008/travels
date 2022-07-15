@extends('frontend.main')
@section('title', '404|Page Not Found')
  <style>

.wrapper {
  display: grid;
  grid-template-columns: 1fr;
  justify-content: center;
  align-items: center;
  height: 100vh;
  overflow-x: hidden;
}
.wrapper .container {
  margin: 0 auto;
  transition: all 0.4s ease;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.wrapper .container .scene {
  position: absolute;
  width: 100vw;
  height: 100vh;
  vertical-align: middle;
}
.wrapper .container .one,
.wrapper .container .two,
.wrapper .container .three,
.wrapper .container .circle,
.wrapper .container .p404 {
  width: 60%;
  height: 60%;
  top: 40% !important;
  left: 20% !important;
  min-width: 400px;
  min-height: 400px;
}
.wrapper .container .one .content,
.wrapper .container .two .content,
.wrapper .container .three .content,
.wrapper .container .circle .content,
.wrapper .container .p404 .content {
  width: 600px;
  height: 600px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: content 0.8s cubic-bezier(1, 0.06, 0.25, 1) backwards;
}
@keyframes content {
  0% {
    width: 0;
  }
}
.wrapper .container .one .content .piece,
.wrapper .container .two .content .piece,
.wrapper .container .three .content .piece,
.wrapper .container .circle .content .piece,
.wrapper .container .p404 .content .piece {
  width: 200px;
  height: 80px;
  display: flex;
  position: absolute;
  border-radius: 80px;
  z-index: 1;
  animation: pieceLeft 8s cubic-bezier(1, 0.06, 0.25, 1) infinite both;
}
@keyframes pieceLeft {
  50% {
    left: 80%;
    width: 10%;
  }
}
@keyframes pieceRight {
  50% {
    right: 80%;
    width: 10%;
  }
}
@media screen and (max-width: 799px) {
  .wrapper .container .one,
.wrapper .container .two,
.wrapper .container .three,
.wrapper .container .circle,
.wrapper .container .p404 {
    width: 90%;
    height: 90%;
    top: 5% !important;
    left: 5% !important;
    min-width: 280px;
    min-height: 280px;
  }
}
@media screen and (max-height: 660px) {
  .wrapper .container .one,
.wrapper .container .two,
.wrapper .container .three,
.wrapper .container .circle,
.wrapper .container .p404 {
    min-width: 280px;
    min-height: 280px;
    width: 60%;
    height: 60%;
    top: 20% !important;
    left: 20% !important;
  }
}
.wrapper .container .text {
  width: 60%;
  height: 40%;
  min-width: 400px;
  min-height: 500px;
  position: absolute;
  margin: 40px 0;
  animation: text 0.6s 1.8s ease backwards;
}
@keyframes text {
  0% {
    opacity: 0;
    transform: translateY(40px);
  }
}
@media screen and (max-width: 799px) {
  .wrapper .container .text {
    min-height: 400px;
    height: 80%;
  }
}
.wrapper .container .text article {
  width: 400px;
  position: absolute;
  bottom: 0;
  z-index: 4;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}
@media screen and (max-width: 799px) {
  .wrapper .container .text article {
    width: 100%;
  }
}
.wrapper .container .text article p {
  color: black;
  font-size: 18px;
  letter-spacing: 0.6px;
  margin-bottom: 40px;
  text-shadow: 6px 6px 10px #32243e;
}
.wrapper .container .text article button {
  height: 40px;
  padding: 0 30px;
  border-radius: 50px;
  cursor: pointer;
  box-shadow: 0px 15px 20px rgba(54, 24, 79, 0.5);
  z-index: 3;
  color: #695681;
  background-color: white;
  text-transform: uppercase;
  font-weight: 600;
  font-size: 12px;
  transition: all 0.3s ease;
}
.wrapper .container .text article button:hover {
  box-shadow: 0px 10px 10px -10px rgba(54, 24, 79, 0.5);
  transform: translateY(5px);
  background: #fb8a8a;
  color:black;
}
.wrapper .container .p404 {
  font-size:95px;
  font-weight: 700;
  letter-spacing: 4px;
  color: #044a93;
  display: flex !important;
  justify-content: center;
  align-items: center;
  position: absolute;
  z-index: 2;
  animation: anime404 0.6s cubic-bezier(0.3, 0.8, 1, 1.05) both;
  animation-delay: 1.2s;
}
@media screen and (max-width: 799px) {
  .wrapper .container .p404 {
    font-size: 100px;
  }
}


    </style>

 
@section('content')
     <section class="wrapper">
 
         <div class="container">
 
             <div id="scene" class="scene" data-hover-only="false">
 
                 <p class="p404" data-depth="0.50">404</p>
                 <p class="p404" data-depth="0.10">404</p>
 
             </div>
 
             <div class="text">
                 <article>
                     <p>Oops! Search Page Not Found. <br>Go back to the homepage !</p>
                     <a href="{{url('/')}}"> <button>Back To Homepage</button></a>
                 </article>
             </div>
 
         </div>
     </section>
<script>
        // Parallax Code
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);

</script>
@endsection