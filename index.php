<html>
<title>Форма отправляющая данные на почту и в Telegram</title>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function AjaxFormRequest(result_id,formMain,url) {
                jQuery.ajax({
                    url:     url,
                    type:     "POST",
                    dataType: "html",
                    data: jQuery("#"+formMain).serialize(), 
                    success: function(response) {
                    document.getElementById(result_id).innerHTML = response;
                },
                error: function(response) {
                document.getElementById(result_id).innerHTML = "<p>Заявка не отправлена. Пожалуйста повторите.</p>";
                }
             });

             $(':input','#formMain')
 				.not(':button, :submit, :reset, :hidden')
 				.val('')
 				.removeAttr('checked')
 				.removeAttr('selected');
    }
</script>
</head>

<body>
<div class="wrapper">
   <div class="form">
       
    <form method="post" action="" id="formMain" name="formMain">
        <input id="name" type="text" name="name" placeholder="Введите ваше имя" maxlength="30" autocomplete="off" required/>
        <input id="telephone" type="Tel" name="tel" placeholder="Введите ваш телефон" maxlength="30" autocomplete="off" required/>
        <input id="button" type="button" name="button" value="Заказать обратный звонок" onclick="AjaxFormRequest('messegeResult', 'formMain', 'sendnew.php')"/>
    </form>
   </div>
</div>

</body>
</html>