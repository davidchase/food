<!DOCTYPE html>
<?php require_once('config.php'); ?>
<html>
<head><title></title>
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a food type:</option>
<option value="fast food">Fast Food</option>
<option value="milk products">Milk Products</option>
<option value="bread">Bread</option>
<option value="cereal">Cereal</option>
</select>
</form>
<br />
<div id="txtHint"><b>Food nutritional info be listed here.</b></div>




</body>
</html>