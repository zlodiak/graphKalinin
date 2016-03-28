<!DOCTYPE html>

<html lang="ru">
  <head>
    <?php require('head.php'); ?>
  </head>

  <body>
    <div class="container main-container">
      <?php require('nav.php'); ?>

      <div class="content-container" id="contentContainer">
        <div class="list-group graphs" id="graphsList">
          <button type="button" class="btn btn-default btn-add pull-right" aria-label="Left Align" data-toggle="modal" data-target="#addGraph">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>                                        
        </div>
      </div>
    </div>

    <?php require('modals.php'); ?>

    <?php require('scripts.php'); ?>

    <!-- jq validate -->
    <script src="js/validate/jquery.validate.js"></script>
    <script>
      $("#addGraphForm").validate({
        rules: {
          title: "required",
          y_max: "required",
          y_min: "required",
          y_period: "required",
          x_max: "required",
          x_min: "required",
          x_period: "required"
        },
        messages: {
          title: "Введите название",
          y_max: "Введите максимальное значение по вертикальной оси",
          y_min: "Введите минимальное значение по вертикальной оси",
          y_period: "Введите значение периода по вертикальной оси",
          x_max: "Введите максимальное значение по горизонтальной оси",
          x_min: "Введите минимальное значение по горизонтальной оси",
          x_period: "Введите значение периода по горизонтальной оси"
        }
      });

    $('#addGraphForm').submit(function(e){
      e.preventDefault();

      if($(this).valid()) {
        $.ajax({
          url: 'js/project/ajax/addGraph.php',
          type: 'POST',
          data: $('#addGraphForm').serialize(),
          success: function(json) { 
            if(json == '"success"') {
              window.location.reload(true)
              //console.log('sss');
            } else {
              //console.log('fff');
            };
          }       
        });        
      } else {
        return false;
      };
    });    
    </script>

    <!-- scripts -->
    <script>
      $( document ).ready(function() {
        $.ajax({
          url: 'js/project/ajax/getGraphsList.php',
          type: 'POST',
          success: function(json) { 
            json = JSON.parse(json);
            // console.dir(json);

            if(json.length > 0) {
              json.forEach(function(item, i, arr) {
                var graphId = item[0], 
                    graphTitle = item[1];
                $('#graphsList').prepend('<a class="list-group-item" href="graph.php?graph_id=' + graphId + '">' + graphTitle + '</a>');
              });
            };
          }       
        }); 
      });         
    </script>    
  </body>
</html>
