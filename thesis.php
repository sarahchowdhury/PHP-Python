
<!DOCTYPE html>
<html>
<head>
	<script>

	var file_name_standerd;	
	var file_name_sample;
	var stander;
	var sample;
	function loadFileAsText(){
	  var fileToLoad = document.getElementById("answerFlie").files[0];
      file_name_sample=fileToLoad;
	  var fileReader = new FileReader();
	  fileReader.onload = function(fileLoadedEvent){
	      var textFromFileLoaded = fileLoadedEvent.target.result;
	      var array=textFromFileLoaded.split(no+".");
          
	      document.getElementById("sampleans").value = array[1].split("$")[0];
	  };

	  fileReader.readAsText(fileToLoad, "UTF-8");
    }
    function loadfileinphp(){
    	var fileToLoad=document.getElementById("standerques&ans").files[0];
    	file_name_standerd=fileToLoad;
         var fileReader = new FileReader();
	     fileReader.onload = function(fileLoadedEvent){
	      var textFromFileLoaded = fileLoadedEvent.target.result;
	      var array = textFromFileLoaded.split("qus:"); 
	      for(var i=1;i<array.length;i++){
	      	 document.getElementById("dropdownques").innerHTML+="<option id='option_no"+i+"' onclick='loadques(this)'>Question "+i+"</option>";
	      	 document.getElementById("option_no"+i).value=i;

	      	
	      }
	     

	     };

	    fileReader.readAsText(fileToLoad, "UTF-8");
	   
    }
    function loadques(x){
        var no=x.value;
    	var fileReader = new FileReader();
	     fileReader.onload = function(fileLoadedEvent){
	      var textFromFileLoaded = fileLoadedEvent.target.result;
	    
	     var array=textFromFileLoaded.split(no);
	     for(var i=0;i<array.length;i++){
	     	var array1=array[1].split("ans:");
	     	var ques=array1[0];
	     	document.getElementById("standqus").value=ques.split("qus:")[1];
	     	document.getElementById("standans").value=array1[1].split("$")[0];
	     	stander=array1[1].split("$")[0];


	     }
	      
	     };

	    fileReader.readAsText(file_name_standerd, "UTF-8");
	    var fileReader = new FileReader();
	     fileReader.onload = function(fileLoadedEvent){
	      var textFromFileLoaded = fileLoadedEvent.target.result;
	      var array=textFromFileLoaded.split(no+".");
          
	      document.getElementById("sampleans").value = array[1].split("$")[0];
	      sample=array[1].split("$")[0];
	  };

	  fileReader.readAsText(file_name_sample, "UTF-8");
       	
		
    }
    window.onload=function(){
    	document.getElementById("standerques&ans").value="";
    	document.getElementById("standqus").value="";
    	document.getElementById("standans").value="";
    	document.getElementById("answerFlie").value="";
    	document.getElementById("sampleans").value="";
    	document.getElementById("dropdownques").innerHTML="<option>Select Question</option>"
    
    }
   function Word2Vec(){
   	            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("Jaccard").innerHTML = xmlhttp.responseText;
                                
                          }
                   };  
                xmlhttp.open("GET","thesis1.php?standerd="+stander+"&sample="+sample,true);
                xmlhttp.send(null);
   }

</script>


	<title></title>
	
</head>
<body>

<div style="border: 1px solid; background-color: #F0FFFF; height: 1000px; padding: 30px; width: 70%;" id="">
	<div style="border: 1px solid; float: right;background-color: #FFFFFF; width: 35%; height: 200px; margin-top: 160px; padding: 10px;" id="cpm" class="cmp">
		<table class="paleBlueRows" style="width:100%" id="table">
		  <thead>
		  	<tr>
		    <th>Name</th>
		    <th>%</th> 
		  </tr>
		  </thead>
		  <tr>
		    <td>Jaccard</td>
		    <td id="Jaccard">X</td>
		  </tr>
		  <tr>
		    <td>Cosine</td>
		    <td>Y</td>
		  </tr>
		  <tr>
		    <td>Manhattan</td>
		    <td>Z</td>
		  </tr>
		  <tr>
		    <td>Euclidean</td>
		    <td>Z</td>
		  </tr>
		  <tr>
		    <td>Minkowski</td>
		    <td>Z</td>
		  </tr>
		</table>
    </div>

			<input class="choosefile" type="file" style="margin-bottom: 10px;" name="" id="standerques&ans" onchange="loadfileinphp()"><br>
			<select class="choosefile" id="dropdownques"  style=" margin-bottom: 10px;">
					<option value="Q1">Select Question</option>
			</select>
			<input class="choosefile"  type="textarea" style="width: 380px; " name="" id="standqus">
			<h3>Standard answer</h3>
			<textarea style="height: 200px; width: 600px" name="" id="standans"></textarea></br>
			<h3>Sample answer</h3>
			<input  type="file" class="choosefile" name="" id="answerFlie" onchange="loadFileAsText()"></br></br>
			<textarea style="height: 200px; width: 600px" name="" id="sampleans"></textarea></br></br>
			<button  class="myButton" onclick="Word2Vec()">Word2Vec</button>
			<button class="tfidf" style="margin-left: 100px;" onclick="tfidf()">Tf-idf</button>

  
</div>


</body>
</html>






<style>

	.myButton {
		-moz-box-shadow: 0px -1px 0px 0px #f0f7fa;
		-webkit-box-shadow: 0px -1px 0px 0px #f0f7fa;
		box-shadow: 0px -1px 0px 0px #f0f7fa;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
		background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
		background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
		background-color:#33bdef;
		-moz-border-radius:5px;
		-webkit-border-radius:5px;
		border-radius:5px;
		border:3px solid #057fd0;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:11px 31px;
		text-decoration:none;
		text-shadow:0px -1px 0px #5b6178;
	}
	.myButton:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
		background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
		background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
		background-color:#019ad2;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}

	.tfidf {
		-moz-box-shadow: 3px 4px 0px 0px #16ab92;
		-webkit-box-shadow: 3px 4px 0px 0px #16ab92;
		box-shadow: 3px 4px 0px 0px #16ab92;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #23ebb2), color-stop(1, #20b098));
		background:-moz-linear-gradient(top, #23ebb2 5%, #20b098 100%);
		background:-webkit-linear-gradient(top, #23ebb2 5%, #20b098 100%);
		background:-o-linear-gradient(top, #23ebb2 5%, #20b098 100%);
		background:-ms-linear-gradient(top, #23ebb2 5%, #20b098 100%);
		background:linear-gradient(to bottom, #23ebb2 5%, #20b098 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#23ebb2', endColorstr='#20b098',GradientType=0);
		background-color:#23ebb2;
		-moz-border-radius:5px;
		-webkit-border-radius:5px;
		border-radius:5px;
		border:1px solid #337bc4;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:10px 44px;
		text-decoration:none;
		text-shadow:0px 1px 0px #528ecc;
	}
	.tfidf:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #20b098), color-stop(1, #23ebb2));
		background:-moz-linear-gradient(top, #20b098 5%, #23ebb2 100%);
		background:-webkit-linear-gradient(top, #20b098 5%, #23ebb2 100%);
		background:-o-linear-gradient(top, #20b098 5%, #23ebb2 100%);
		background:-ms-linear-gradient(top, #20b098 5%, #23ebb2 100%);
		background:linear-gradient(to bottom, #20b098 5%, #23ebb2 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#20b098', endColorstr='#23ebb2',GradientType=0);
		background-color:#20b098;
	}
	.tfidf:active {
		position:relative;
		top:1px;
	}

	        

	#standans , #sampleans{
		border: 3px solid #73AD21;
	}
	     
	    

	    h3 { color: #006400; 
	    	font-family: 'Raleway',sans-serif;
	    	font-size: 30px;
	    	font-weight: 800;
	    	line-height: 36px;
	    	margin: 0 0 24px;
	     }
	        



	     .choosefile {
		-moz-box-shadow:inset 0px 39px 0px -24px #ffffff;
		-webkit-box-shadow:inset 0px 39px 0px -24px #ffffff;
		box-shadow:inset 0px 39px 0px -24px #ffffff;
		background-color:#ffffff;
		-moz-border-radius:4px;
		-webkit-border-radius:4px;
		border-radius:4px;
		border:1px solid #007500;
		display:inline-block;
		cursor:pointer;
		color:#208a42;
		font-family:Arial;
		font-size:18px;
		padding:6px 15px;
		text-decoration:none;
		text-shadow:0px 1px 0px #2f6627;
	}
	.choosefile:hover {
		background-color:#ffffff;
	}


	table.paleBlueRows {
	  font-family: Arial, Helvetica, sans-serif;
	  border: 4px solid #F0FFFF;
	  background-color: #BFEEE0;
	  width: 350px;
	  height: 200px;
	  text-align: center;
	  border-collapse: collapse;
	}
	table.paleBlueRows td, table.paleBlueRows th {
	  border: 3px solid #FFFFFF;
	  padding: 3px 9px;
	}
	table.paleBlueRows tbody td {
	  font-size: 19px;
	}
	table.paleBlueRows tr:nth-child(even) {
	  background: #D0E4F5;
	}
	table.paleBlueRows thead {
	  background: #0B6FA4;
	  border-bottom: 5px solid #FFFFFF;
	}
	table.paleBlueRows thead th {
	  font-size: 17px;
	  font-weight: bold;
	  color: #FFFFFF;
	  text-align: center;
	  border-left: 2px solid #FFFFFF;
	}
	table.paleBlueRows thead th:first-child {
	  border-left: none;
	}

	table.paleBlueRows tfoot td {
	  font-size: 14px;
	}
           
</style>