<div class="heading">
      <h1>List Of Suggestion/Compaints</h1>
    </div> 
    <div class="filter">
    <label class="filterlabel">Filter By Complain/Suggestion</label>
    <select name="cstype" id="cstype">
              <option value="All">All</option>
              <option value="Complain">Complain</option>
              <option value="Suggestion">Suggestion</option>

    </select>
    <!--
    <label class="filterlabel">Sort By Latest/Oldest</label>
    <select name="lotype" id="lotype">
              <option value="Latest">Latest</option>
              <option value="Oldest">Oldest</option>

    </select>
-->
    </div>
    <div class="Eventtable">
      <table id="admintable">
          <tr>
            <th>Username</th>
            <th>Type</th>
            <th>Details</th>
            <th>Image</th>
            <th>Delete</th>
          </tr>
          <tbody id="tbody">
            <?php foreach($all_sug_comp as $data):?>
          <tr id=<?=esc($data['id'])?>>
            <td><?=esc($data['Username'])?></td>
            <td><?=esc($data['type'])?></td>
            <td><pre><?=esc($data['details'])?></pre></td>
            <?php if(esc($data['image_name']) == ""){?>
                <td>No Image</td>
            <?php }
            else{?>
            <td><img height="200px"  weight="200px" src="<?=esc($data['image_name'])?>"></td>
            <?php }?>
            <td>
            <button id=<?=esc($data['id'])?> onclick="get_id(this.id)" class="adelete">&#10005;</button>
            </td>
        </tr>
        <?php endforeach ?>
          </tbody>
      </table>    
    </div>
</body>
<script>

$(document).ready(function(){
  $("#cstype").on("change", function() {
    var value = $(this).val();
    if(value === "All"){
      value = "i";
      console.log(value);
    }
    $("#tbody tr").filter(function() {
      $(this).toggle($(this).text().indexOf(value) > -1);
    });
  });
});

function get_id(id){
      event.preventDefault();

        $.ajax({
            url: "AdminForm/Delete",
            type: "POST",
            data: {
                delete_id:id,
              },
            success: function(res){
                location.reload();
            
        }
      });
    }
    </script>
</html>