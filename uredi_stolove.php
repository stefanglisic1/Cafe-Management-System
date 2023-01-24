
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPage</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
    <style>
        

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
       var positions = JSON.parse(localStorage.positions || "{}");
$(function () {
    var d = $("[id=draggable]").attr("id", function (i) {
        return "draggable_" + i
    })
    $.each(positions, function (id, pos) {
        $("#" + id).css(pos)
    })

    d.draggable({
        containment: "#containment-wrapper",
        scroll:false,
        stop: function (event, ui) {
            positions[this.id] = ui.position
            localStorage.positions = JSON.stringify(positions)
        }
    });
});
    </script>
      <link rel="stylesheet" href="uredi_stolove.css">
</head>

<body>
    <?php include "header.html" ?>
   <button class="sacuvaj" onclick="location.href='adminpage.php';">Sačuvaj</button>
    <div id="draggable" class="ui-widget-content">
        <p>STO 1.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 2.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 3.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 4.</p>
        <button  class="btn">Nesto</button>
    </div>

    <div id="draggable" class="ui-widget-content">
        <p>STO 5.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 6.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 7.</p>
        <button  class="btn">Nesto</button>
    </div>
    <div id="draggable" class="ui-widget-content">
        <p>STO 8.</p>
        <button  class="btn">Nesto</button>
    </div>
    

</body>

</html>