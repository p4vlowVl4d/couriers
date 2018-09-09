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
			
			.list-group-item a{
				color: grey;

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
      <a class="navbar-brand" href="/admin/">Админпанель</a>
    </div>
    

  </div>
</nav>
		</header>
		<div class="container">
<div class="row">
	<div class="col-sm-3">
		<h3>Меню</h3>
		<ul class="list-group">
			<li class="list-group-item"><a href="/admin/">Расписание поездок</a></li>
			<li class="list-group-item"><a href="/admin/couriers-list/">Список курьеров</a></li>
			<li class="list-group-item"><a href="/admin/courier-create/">Добавить курьера</a></li>
			<li class="list-group-item"><a href="/admin/delivery-create/">Добавить поездку</a></li>
		</ul>
	</div>
	