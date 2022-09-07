

    <div class="heading">
      <h1>List Of Future Events in the village</h1>
    </div>  
    <div class="Eventtable">
      <table id="table">
          <tr>
              <th>Event Name</th>
              <th>Event Venue</th>
              <th>Orgnaizer Name</th>
              <th>Event Date</th>
              <th>Event Timing</th>
              <th>Brief Event Details</th>
          </tr>
          
      <?php foreach ($events as $event): ?>
          <tr>
            <td><?= esc($event['event_name']) ?></td>
            <td><?= esc($event['event_venue']) ?></td>
            <td><?= esc($event['organiser_name']) ?></td>
            <td><?= esc(date_format(date_create($event['event_date']), "d/m/Y")) ?></td>
            <td><?= esc($event['event_time']) ?></td>
            <td><?= esc($event['event_details']) ?></td>
        </tr>
        
<?php endforeach ?>
      </table>    
    </div>

    <section id="About Us">
      <div class="footer">
        <div class="title">
            <h3>About Us</h3>
            <p class="abouts">
              Saligao Dust Busters<br>                      
              Phone No: 2288293892<br>
              Saligao, Bardez Goa 403511<br>   
              Email:saligaodustbusters@gamil.com
            </p>
            <p>Dust | Busters</p>
          </ul>
      </div>
    </div>
  </div>
</section>

    
  </body>
</html>
