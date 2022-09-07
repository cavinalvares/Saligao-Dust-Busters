<div class="heading">
      <h1>List Of Events</h1>
    </div> 
    <div class="Eventtable">
      <table id="admintable">
          <tr>
            <th>Event Name</th>
            <th>Event Venue</th>
            <th>Organiser Name</th>
            <th>Event Time</th>
            <th>Event Date</th>
            <th>Event Details</th>
            <th>Decision</th>
          </tr>
          <tbody id="tbody">
            <?php foreach($events as $data):?>
          <tr id=<?=esc($data['id'])?>>
            <td><?=esc($data['event_name'])?></td>
            <td><?=esc($data['event_venue'])?></td>
            <td><?=esc($data['organiser_name'])?></td>
            <td><?=esc($data['event_time'])?></td>
            <td><?=esc($data['event_date'])?></td>
            <td><pre><?=esc($data['event_details'])?></pre></td>
           
            <td id="eventdecide">
            <button id=<?=esc($data['id'])?> onclick="accept_event(this.id)" class="aedit">&#10003;</button>
            <button id=<?=esc($data['id'])?> onclick="delete_event(this.id)" class="adelete">&#10005;</button>
            </td>
        </tr>
        <?php endforeach ?>
          </tbody>
      </table>    
    </div>
</body>
<script>

function accept_event(id){
    event.preventDefault();

        $.ajax({
            url: "AdminEvent/Accept",
            type: "POST",
            data: {
                accept_id:id,
              },
            success: function(res){
                location.reload();
            
        }
      });
}

function delete_event(id){
      event.preventDefault();

        $.ajax({
            url: "AdminEvent/Delete",
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