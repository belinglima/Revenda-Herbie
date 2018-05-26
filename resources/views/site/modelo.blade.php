<!DOCTYPE html>
<html lang="en">
<head>
  <title>Revenda Avenida</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<style rel="stylesheet">
    ul.none {list-style-type: none;}
    a:link {color: #FFFFFF;} a:visited {color: #FFFFFF;} a:hover {color: #585858;}
</style>
</header>
<body>

<div class="row align-items-center">
  <div class="col text-left" style="background: #DF0101; height:40px; color: #ffffff;">  
    <p style="margin-left: 50px; margin-top: 10px;"><i class="fas fa-phone-square"></i> (53) 3227 90 90 </p>
  </div>

  <div class="col text-center" style="background: #DF0101; height:40px; color: #ffffff;">  
       <h3 style="margin-top: 5px;">Revenda Avenida</h3>
  </div>

  <div class="col text-right" style="background: #DF0101; height:40px;">
      <p style="margin-right: 50px; margin-top: 10px;">  
        <a href="#"><i class="fab fa-facebook"></i></a>      
        <a href="#"><i class="fab fa-github"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </p>
  </div>

</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/site">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#Modelos">Modelos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#SobreNós">Sobre Nós</a>
      </li>
    </ul>
    <form method="post" class="form-inline my-2 my-lg-0" action="{{route('carros.filtroscom')}}">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="text" name="modelo" id="modelo" placeholder="Buscar veiculos ..">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<br>

  @yield('conteudo')

</body>
</html>
