<?php require_once(ROOT.'/views/layouts/header_admin.php');?>

	<style>
		.del_code{
			text-transform: uppercase;
		}
	</style>
	<div class="col-sm-7">
		<h4>Сортировать:</h4>
		<form action="javascript:void(null)" method="post" class="form-inline" id="sort-dev-list" onsubmit="sortDelivList()">
			<div class="form-group">
				<label for="date-in">C:</label>
				<input type="date" name="date-in" id="date-in" class="form-control">
				
			</div>
			<div class="form-group">
				<label for="date-to">По:</label>
				<input type="date" name="date-to" id="date-to" class="form-control">
				</label>
				
			</div>
			<p></p>
			<br/>
			<div class="form-group">
				<label for="search">Найти по коду доставки:</label>
				
				<input type="text" class="form-control" name="d_code" id="search">
			
			</div>
			<p></p>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="найти">
			</div>
			
		</form>
		<br>
		<table class="table table-striped">
 			<thead>
 				<tr>
 					<td>Код доставки</td>
 					<td>Регион</td>
 					<td>Курьер</td>
 					<td>Статус</td> 				
 				</tr>
 			</thead>
 			<tbody id="result-set">
 				<?php foreach($timetable as $value):?>
 				<tr>
 					<td><a href="/admin/delivery-view/<?=$value['d_code']?>" class="del_code"><?=$value['d_code']?></a></td>
 					<td><?=$value['name']?>&nbsp;</td>
 					<td><?=$value['fname']?>&nbsp;<?=$value['lname']?></td>
 					<td>
 						<?php if($value['end_date'] != '0000-00-00'):?>
 							<p>Завершена</p>
 						<?php else:?>
 							<p>В процессе</p>
 						<?php endif;?>
 					</td>
 				</tr>
 				<?php endforeach;?>
 			</tbody>
		</table>
		<div>
			<p class="name"></p>
			<p class="code"></p>
		</div>
	</div>
	</div>
	
</div>

<?php require_once(ROOT.'/views/layouts/footer_admin.php');?>