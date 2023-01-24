<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body id="iframeHolder">
    
    <script type="text/javascript">
    $(function(){
        $('#button').click(function(){ 
            if(!$('#iframe').length) {
                    $('#iframeHolder').html('<iframe id="iframe" src="index.php" width="100%" height="760px"></iframe>');
            }
        });   
    });
    </script>
     
    <button id="button">Button</button>
   
</body>
</html>