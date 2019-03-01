<?php
$r=$records[0];
echo "
  <div class='modal-dialog' style='width:70%'>
    <div class='modal-content'>
      <div class='modal-header'>
        <div class='row'>
          <div class='col-sm-10'>
            <h4 class='modal-title' id='myModalLabel'><label style='color:orange'>".$r->name."</label></h4>
          </div>
          <div class='col-sm-2'>
            <label align='right'>".$r->date."</label>
          </div>
        </div>
      </div>
      <div class='modal-body'>
        <table class='table'>
          <tr><td colspan='2'><label>Status :</label>".$r->status."</td></tr>
          <tr><td colspan='2'><label>Team Members :</label>
            <table class='table' style='width:80%;float:right;'><tr>";
              foreach ($records1 as $v) 
              {
                echo "<td>".$v->srn."</td>
                <td>".$v->fname." ".$v->lname."</td></tr>";
              }
            echo "</table></td></tr>
          <tr><td colspan='2'><label>Guide :</label>".$r->guide."</td></tr>
          <tr><td colspan='2'><label>Project Area :</label>".$r->project_area."</td></tr>
          <tr>
            <td colspan='2'>
            <label for='comment'>Description :</label>
            <p>".$r->description."</p></td>
          </tr>
          <tr>
            <td colspan='2'>
            <label for='comment'>Remarks :</label>
            <p>".$r->remarks."</p></td>
          </tr>
        </table>
        <div class='modal-footer'>
          <button type='button' class='btn btn-warning' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>";
?>
