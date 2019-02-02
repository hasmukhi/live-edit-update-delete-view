<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>


<head>
	<title></title>
</head>
<body>
	<div id="disp_data"></div>
	<script type="text/javascript">
		disp_data();
		function disp_data()
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("Get","update.php?status=disp",false);
			xmlhttp.send(null);
			document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
		}

		function edit(a)
		{
			first_nameid="first_name"+a;
			txtfirst_nameid="txtfirst_nameupdate"+a;
			var first_name=document.getElementById(first_nameid).innerHTML;
			document.getElementById(first_nameid).innerHTML="<input type='text' value='"+first_name+"' id='"+txtfirst_nameid+"' required='required'>";

			last_nameid="last_name"+a;
			txtlast_nameid="txtlast_nameupdate"+a;
			var last_name=document.getElementById(last_nameid).innerHTML;
			document.getElementById(last_nameid).innerHTML="<input type='text' value='"+last_name+"' id='"+txtlast_nameid+"' required='required'>";

			ageid="age"+a;
			txtageid="txtageupdate"+a;
			var age=document.getElementById(ageid).innerHTML;
			document.getElementById(ageid).innerHTML="<input type='text' value='"+age+"' id='"+txtageid+"'>";

			updateid="update"+a;
			document.getElementById(a).style.visibility="hidden";
			document.getElementById(updateid).style.visibility="visible";

		}
		function update(b)
		{
			var first_nameid="txtfirst_name"+b;
			var first_name=document.getElementById(first_nameid).value;
			// // console.log (first_name);
			// alert(first_name);
			var last_nameid="txtlast_name"+b;
			var last_name=document.getElementById(last_nameid).value;
			//alert(last_name);
			var ageid="txtage"+b;
			var age=document.getElementById(ageid).value;

			update_value(b,first_name,last_name,age);
			// updateid=b;
			// alert(updateid);
			var str = b;
			str = str.replace("update", "");
			//alert(str);
			document.getElementById(str).style.visibility="visible";
			document.getElementById(b).style.visibility="hidden";
			// alert(first_name);
			document.getElementById("first_name"+str).innerHTML=first_name;
			// alert(document.getElementById("first_name"+b).innerHTML);
			document.getElementById("last_name"+str).innerHTML=last_name;
			document.getElementById("age"+str).innerHTML=age;
		}

		function update_value(id,first_name,last_name,age)
		{
			var id = id;
			id = id.replace("update", "");
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","update.php?id="+id+"&first_name="+first_name+"&last_name="+last_name+"&age="+age+"&status=update",false);
			xmlhttp.send(null);
		}
		function delete1(id)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","update.php?id="+id+"&status=delete",false);
			xmlhttp.send(null);
			disp_data();
		}
	</script>

	   	<script>
		$(document).ready(function() {
    	$('#example1').DataTable();
	} );
</script>
</body>
</html>