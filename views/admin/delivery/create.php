<?php require_once(ROOT.'/views/layouts/header_admin.php');?>

<div class="container">
	<div class="col-sm-9">
		
	
	<h3>&nbsp;&nbsp;Добавить поездку</h3>
	<br>
	<div class="message-error"></div>
	<div class="message"></div>
	<br>
	<form class="form-group col-sm-4" id="create-delivery" action="javascript:void(null)" method="POST" onsubmit="sendDeliveryData()">
		<div class="form-group">
    		<label for="inputEmail">Курьер:</label>
    		<br>
    		<select name="courier" class="form-control">
                   <option value="null" selected="selected">Не выбран</option>
                   <?php foreach($couriers as $courier):?>
                   		<option value="<?=$courier['id']?>"><?=$courier['first_name']?>&nbsp;<?=$courier['last_name']?></option>
               	   <?php endforeach;?>
            </select>
  		</div>
		<div class="form-group">
    		<label for="inputEmail">Регион:</label>
    		<select name="region" class="form-control">
    			<option value="null">Не выбран</option>
    			<?php foreach($regions as $region):?>
    			<option value="<?=$region['code']?>"><?=$region['code']?>&nbsp;<?=$region['name']?></option>
    			<?php endforeach;?>
    		</select>
  		</div>
  		<div class="form-group">
    		<label for="inputEmail">Дата выезда:</label>
    		<input type="datetime-local" class="form-control" name="date">
  		</div>
  		<button type="submit" class="btn btn-warning">Отправить</button>
	</form>
	</div>
</div>
</div>
</div>
<?php require_once(ROOT.'/views/layouts/footer_admin.php');?>