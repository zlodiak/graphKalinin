<!-- Modal add graph-->
<div class="modal fade" id="addGraph" tabindex="-1" role="dialog" aria-labelledby="addGraphLabel">
  <div class="modal-dialog" role="document">     
    <div class="modal-content">
      <form class="" id="addGraphForm" method="get" action="js/project/ajax/addGraph.php" onSubmit="return false;">
        <fieldset>         
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addGraphLabel">Добавить график</h4>
          </div>

          <div class="modal-body">
            <p>
              <label for="title">Название</label>
              <input class="form-control" id="title" name="title" type="text">
            </p>
            <p>
              <label for="y_max">y_max</label>
              <input class="form-control" id="y_max" name="y_max" type="number" rangelength="[1,3]" value="100">
            </p>
            <p>
              <label for="y_min">y_min</label>
              <input class="form-control" id="y_min" name="y_min" type="number" rangelength="[1,3]" value="0">
            </p>
            <p>
              <label for="y_period">y_period</label>
              <input class="form-control" id="y_period" name="y_period" type="number" rangelength="[1,3]" value="10">
            </p>
            <p>
              <label for="x_max">x_max</label>
              <input class="form-control" id="x_max" name="x_max" type="number" rangelength="[1,3]" value="100">
            </p>
            <p>
              <label for="x_min">x_min</label>
              <input class="form-control" id="x_min" name="x_min" type="number" rangelength="[1,3]" value="0">
            </p>
            <p>
              <label for="x_period">x_period</label>
              <input class="form-control" id="x_period" name="x_period" type="number" rangelength="[1,3]" value="10">
            </p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary submit" value="Submit">Добавить</button>
          </div>
        </fieldset>
      </form>          
    </div>
  </div>
</div>  

<!-- Modal add dot-->
<div class="modal fade" id="addDot" tabindex="-1" role="dialog" aria-labelledby="addDotLabel">
  <div class="modal-dialog" role="document">     
    <div class="modal-content">
      <form class="" id="addDotForm" method="get" action="js/project/ajax/addDot.php" onSubmit="">
        <fieldset>         
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addDotLabel">Добавить точку</h4>
          </div>

          <div class="modal-body">
            <p>
              <label for="xCoord">Координата X</label>
              <input class="form-control" id="xCoord" name="x_coord" type="number" rangelength="[1,4]" value="">
            </p>
            <p>
              <label for="yCoord">Координата Y</label>
              <input class="form-control" id="yCoord" name="y_coord" type="number" rangelength="[1,4]" value="">
            </p>

            <p>
              <label for="description" class="description">Описание</label>
              <textarea class="form-control" id="description"></textarea>
            </p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary submit" value="Submit">Добавить</button>
          </div>
        </fieldset>
      </form>          
    </div>
  </div>
</div>  