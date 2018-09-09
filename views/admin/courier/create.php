<?php require_once(ROOT.'/views/layouts/header_admin.php');?>

		<div class="col-sm-7">
			<h3>&nbsp;&nbsp;Добавить курьера</h3>
			<br>
      <div class="message-error"></div>
			<div class="message"></div>
			<form class="form-group col-sm-6" id="create-courier" action="javascript:void(null)" method="POST" onsubmit="sendCourierData()">
				<div class="form-group">
    				<label for="inputEmail">Имя:</label>
    				<input type="text" class="form-control" name="first_name" id="i1">
  				</div>
  				<div class="form-group">
    				<label for="inputEmail">Фамилия:</label>
    				<input type="text" class="form-control" name="last_name" id="i2">
  				</div>
				<div class="form-group">
    				<label for="inputEmail">Отчество:</label>
    				<input type="text" class="form-control" name="patronymic" id="i3">
  				</div>
  				<div class="form-group">
    				<label for="inputEmail">Адрес email:</label>
    				<input type="text" class="form-control" name="email" id="i4">
  				</div>
  				<div class="form-group">
    				<label for="inputEmail">Пароль:</label>
    				<input type="text" class="form-control" name="password" id="i5">
  				</div>
  				<button type="submit" class="btn btn-warning">Отправить</button>
			</form>
		</div>
	</div>
	
</div>
<?php require_once(ROOT.'/views/layouts/footer_admin.php');?>