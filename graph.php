<!DOCTYPE html>

<html lang="ru">
  <head>
    <?php require('head.php'); ?>
  </head>

  <body>
    <div class="container main-container">
      <?php require('nav.php'); ?>

      <div class="content-container" id="contentContainer">
        <canvas class="canvas_graph" id="canvasGraph" width="150" height="150"></canvas>
      </div>
    </div>

    <?php require('modals.php'); ?>

    <?php require('scripts.php'); ?>

    <!-- scripts -->
    <script>
      $( document ).ready(function() {     

        // get data for scala graph from GET
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            url = url.toLowerCase(); // This is just to avoid case sensitiveness  
            name = name.replace(/[\[\]]/g, "\\$&").toLowerCase();// This is just to avoid case sensitiveness for query parameter name
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        // calculate canvas size
        var canvasWidth = $("#contentContainer").outerWidth(true),
            windowHeight = $(window).outerHeight(true),
            navbarHeight = $("#navbar").outerHeight(true), 
            canvasHeight = windowHeight - navbarHeight - 50, 
            offsetBeginCoord = 40;
            xBeginCoord = offsetBeginCoord,
            yBeginCoord = canvasHeight - offsetBeginCoord;

        // set canvas props
        var canvasGraphElem = document.getElementById("canvasGraph");        
        canvasGraphElem.width = canvasWidth;
        canvasGraphElem.height = canvasHeight, 
        ctx = canvasGraphElem.getContext('2d');

        var graph_id = getParameterByName("graph_id");        

        $.ajax({
          url: 'js/project/ajax/getGraphData.php',
          type: "post",
          data: {graph_id: graph_id}
        }).done(function(graphObj) {  
          graphObj = JSON.parse(graphObj);

          if(graphObj) {        
            graphObj['id'] = parseInt(graphObj['id'], 10);
            graphObj['x_min'] = parseInt(graphObj['x_min'], 10);
            graphObj['x_max'] = parseInt(graphObj['x_max'], 10);
            graphObj['x_period'] = parseInt(graphObj['x_period'], 10);
            graphObj['y_min'] = parseInt(graphObj['y_min'], 10);
            graphObj['y_max'] = parseInt(graphObj['y_max'], 10);
            graphObj['y_period'] = parseInt(graphObj['y_period'], 10);                    

            // draw coordinate system guides
            ctx.beginPath();
            ctx.moveTo(xBeginCoord, yBeginCoord);
            ctx.lineTo(graphObj['x_max'] + offsetBeginCoord, yBeginCoord);
            ctx.moveTo(xBeginCoord, yBeginCoord);
            ctx.lineTo(xBeginCoord, yBeginCoord - graphObj['y_max']);
            ctx.lineWidth = 1;
            ctx.strokeStyle = '#000';
            ctx.stroke();                  

            // draw coordinate system scales 
            for(var i = graphObj['x_min']; i <= graphObj['x_max']; i = i + graphObj['x_period']) {
              ctx.beginPath();
              ctx.moveTo(i + xBeginCoord, yBeginCoord - 2);
              ctx.lineTo(i + xBeginCoord, yBeginCoord + 2);
              ctx.lineWidth = 1;
              ctx.strokeStyle = '#000';
              ctx.stroke();                
            };   

            for(var i = graphObj['y_min']; i <= graphObj['y_max']; i = i + graphObj['y_period']) {
              ctx.beginPath();
              ctx.moveTo(xBeginCoord - 2, yBeginCoord + i - graphObj['y_max']);
              ctx.lineTo(xBeginCoord + 2, yBeginCoord + i - graphObj['y_max']);
              ctx.lineWidth = 1;
              ctx.strokeStyle = '#000';
              ctx.stroke();               
            }; 

            // draw scale values
            for(var i = graphObj['y_min']; i <= graphObj['y_max']; i = i + graphObj['y_period']) {
              ctx.font = "10px Arial";
              ctx.textAlign = "right";
              ctx.fillText(i, 25, yBeginCoord - i);
            };

            ctx.save();
            ctx.translate(xBeginCoord + 5, yBeginCoord + 10);
            ctx.rotate(-Math.PI/2);
            ctx.font = "10px Arial";
            ctx.textAlign = "right"; 

            for(var i = graphObj['x_min']; i <= graphObj['x_max']; i = i + graphObj['x_period']) {
              ctx.fillText(i, 0, i);
            };   

            ctx.restore();
          };     
      });   

      // draw dots
      $.ajax({
        url: 'js/project/ajax/getDots.php',
        type: "post",
        data: {graph_id: graph_id}
        }).done(function(dotsObj) {
          dotsObj = JSON.parse(dotsObj);
          console.dir(dotsObj);

          for(var key in dotsObj) {
            var xCoordDot = xBeginCoord + parseInt(dotsObj[key]['x_coord'], 10),
                yCoordDot = yBeginCoord - parseInt(dotsObj[key]['y_coord'], 10);

            console.log(xCoordDot + '---' + yCoordDot);
            console.log(parseInt(dotsObj[key]['x_coord'], 10) + '-' + parseInt(dotsObj[key]['y_coord'], 10));

            ctx.fillRect(xCoordDot, yCoordDot, 2, 2);
          };          
        }); 
      });            
    </script>      
  </body>
</html>
