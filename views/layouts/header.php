<!DOCTYPE html>
<html>
	<head>
		<title>
			<?=$title?>	
		</title>
		<link rel="stylesheet" href="/web/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="/web/css/style.css" type="text/css">
		<script src="/web/js/jquery-3.3.1.min.js"></script>
		<script src="/web/js/bootstrap.min.js"></script>
	</head>
	<body>
		<style>
			.navbar-default{
				background: orange;
			}
			.navbar-default .navbar-brand {
				color: white;
			}
			 .navbar-default .navbar-nav>li>a{
				color: white;
			}
		</style>
		<header>
			<!-- Классы navbar и navbar-default (базовые классы меню) -->
		<nav class="navbar navbar-default">
  <!-- Контейнер (определяет ширину Navbar) -->
  	<div class="container">
    <!-- Заголовок -->
    <div class="navbar-header">
      
      <!-- Бренд или название сайта (отображается в левой части меню) -->
      <a class="navbar-brand" href="/">Brand</a>
    </div>
    <!-- Основная часть меню (может содержать ссылки, формы и другие элементы) -->
    <div class="collapse navbar-collapse" id="navbar-main">
     <ul class="nav navbar-nav">
        <li class="active"><a href="/">Главная</a></li>
        <li><a href="/login/">Войти</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Код доставки">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>  
    </div>

  </div>
</nav>
		</header>
