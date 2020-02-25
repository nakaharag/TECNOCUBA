<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datatable with mysql</title>
<link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
	 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

	
	<div class="container">
      <div class="">
        <h1>Data Table</h1>
        <div class="">
		<table id="employee_grid" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Razão Social</th>
                <th>Tipo</th>
				        <th>Contato</th>
                <th>Telefone</th>
                <th>telefone</th>
                <th>cidade</th>
                <th>estado</th>
                <th>ult. venda</th>
            </tr>
        </thead>
    </table>
    </div>    
      </div>

    </div>

<script type="text/javascript">
$( document ).ready(function() {



$('#employee_grid').DataTable({
				 "bProcessing": true,
         "serverSide": true,
         "initComplete": function (){
            $( document ).on("click", "tr[role='row']", function(){
                 alert($(this).children('td:first-child').text())
            });
         },
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   
});
</script>
