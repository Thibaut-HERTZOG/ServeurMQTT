// Place in : /var/www/php/

<!Doctype html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<p>Prise 1 :</p>
<input type="submit" class="button1" name="Allumer" value="Allumer" />
<input type="submit" class="button1" name="Eteindre" value="Eteindre" />

<div class="result1"></div>

<script type="text/javascript">

$(document).ready(function(){
    $('.button1').click(function(){
        data =  {'action1': $(this).val()};
        $.post('ajax.php', data, function (response) {
//	$( ".result1" ).html(response);
        });
    });
});

</script>

<p>Prise 2 :</p>
<input type="submit" class="button2" name="Allumer" value="Allumer" />
<input type="submit" class="button2" name="Eteindre" value="Eteindre" />

<div class="result2"></div>

<script type="text/javascript">

$(document).ready(function(){
    $('.button2').click(function(){
        data =  {'action2': $(this).val()};
        $.post('ajax.php', data, function (response) {
//        $( ".result2" ).html(response);
        });
    });
});


</script>


<p>Les deux prises :</p>
<input type="submit" class="button3" name="Allumer" value="Allumer" />
<input type="submit" class="button3" name="Eteindre" value="Eteindre" />

<script type="text/javascript">

$(document).ready(function(){
    $('.button3').click(function(){
        data1 =  {'action1' : $(this).val()};
	$.post('ajax.php', data1, function (response1) {
//        $( ".result1" ).html(response1);
        });
	data2 = {'action2' : $(this).val()};
	$.post('ajax.php', data2, function (response2) {
//        $( ".result2" ).html(response2);
        });
    });
});


</script>

<script type="text/javascript">

$(document).ready(function() {
	setInterval(myFunction, 250);
function myFunction(){
		$.post('refresh1.php', function(response){
		console.log(response);
		if(response == "ok") {
			valeur1 = "Prise : On";
			$(".result1").html(valeur1);
		}
		else if(response == "not") {
              	valeur2 = "Prise : Off";
	                $(".result1").html(valeur2);
		};
	});
	}

});
</script>

</body>
</html>
