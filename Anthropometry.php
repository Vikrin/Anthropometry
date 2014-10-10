<!DOCTYPE html>
<html>
<head>
<title>Anthropometry Statistics</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/2.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/Anthropometry/style.css">


<script type="text/javascript">

	function c(){
	var dimension=document.getElementById('chosedimension').innerText;
		mean=document.getElementById('mean').innerText;
		sd=document.getElementById('sd').innerText;
	document.getElementById('display').innerHTML=dimension;
	document.getElementById('displaymean').innerHTML=mean;
	document.getElementById('displaysd').innerHTML=sd;
	}

/* calculate the Z-value*/
/*Looking for corresponding percentile automatically*/


	function cal(){
	
	var M=document.getElementById('displaymean').innerHTML;
	var SD=document.getElementById('displaysd').innerHTML;
	var d=document.getElementById('measure').value;
	var Z=parseFloat((d-M)/SD).toFixed(2);
	return Z;
	}

	function showpercentile(str) {
  if (str==="") {
    document.getElementById("result").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("result").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getzvalue.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>
<body>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span7">
				<div style="margin-left:200px; margin-top:30px" ng-app="" ng-controller="dimensionsController">
					
					<p id="searching">Looking for Dimension:</p> 


					<p><input style="border:1.5px solid;border-radius:10px; border-color:#87CEEB; width:480px" type="text" ng-model="name"></p>
	

					<table>
					<tr style="background-color:#FFD700">
					<th width="300px">US male body dimension:</th>
					<th width="100px">Mean</th>
					<th width="100px">SD</th>
					</tr>
					<tr ng-repeat="x in dimensions| filter:name|orderBy:'name'" >
					<td width="300px" align="middle" id="chosedimension" onclick="c()" onmouseover="this.style.cursor='hand'">{{(x.name)}}</td>
					<td width="100px" align="middle" id="mean">{{(x.mean)}}</td>
					<td width="100px" align="middle" id="sd">{{(x.sd)}}</td>
					</tr>
					</table>

					</div>
				</div>


				<div class="span5">
				<div style="float:left; margin-top:30px">
				<p style="font-size:15px;font-family: Georgia, serif;">You choose dimension:</p>
				<div id="display">Chosed-dimension</div>
				</br>
				<p style="font-size:15px;font-family: Georgia, serif;">Mean:</p>
				<div id="displaymean">Mean value for your dimension</div>
				</br>
				<p style="font-size:15px;font-family: Georgia, serif;">Standard Deviation:</p>
				<div id="displaysd">SD for your dimension</div>
				</br>
				<p style="font-family: Georgia, serif; font-size:20px">Input your measurement:</p>
				<input style="width:300px" id='measure'>
				<input class="btn btn-success" type='button' value="Check" onclick="showpercentile(cal())">
				</br>
				</br>
				</br>
				<div id="Percentile">The percentile of your measurement is:</div>
				</br>
				<div align="middle" id="result"><img src="/Anthropometry/illusion.jpg"></div>
				</br>
				</br>
				</div> 
				</div>
			</div>
		</div>
	</div>
</div>


<script src="http://localhost/Anthropometry/dimensionsController.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>


</body>
</html>
