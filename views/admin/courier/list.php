<?php require_once(ROOT.'/views/layouts/header_admin.php');?>
<div class="col-sm-7">
	<h3>Курьеры</h3>
	<table class="table table-striped">
 			<thead>
 				<tr>
 					<td>ID</td>
 					<td>Имя</td>
 					<td>Фамилия</td>
 					<td>Отчество</td>
 					<td></td>
 				</tr>
 			</thead>
 			<tbody>
 			<?php foreach($couriersList as $value):?>
 				<tr>
 					<td><?=$value['id']?></td>
 					<td><?=$value['fname']?></td>
 					<td><?=$value['lname']?></td>
 					<td><?=$value['patr']?></td>
 					<td><a href="/admin/deleteCourier/<?=$value['id']?>/"><span class="glyphicon glyphicon-remove" style="color:red"></span></a></td>
 				</tr>
 			<?php endforeach;?>
 			</tbody>
		</table>
</div>
</div>
</div>
<?php require_once(ROOT.'/views/layouts/footer_admin.php');?>