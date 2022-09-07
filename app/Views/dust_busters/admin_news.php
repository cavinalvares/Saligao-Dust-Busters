
<div id="contain" class="container">
<a id="addnews" class="btn" href="AddNews">+ Add News</a>
<?php $count = 0?>
<?php foreach ($all_news as $news): ?>
    <?php if($count%2 == 0) {
        echo "<div class='row'>";
    } ?>
    <div class="card col" id=<?=esc($news['NewsId'])?>>
        <img src=<?=esc($news['img_name'])?> class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?=esc($news["Title"])?></h5>
            <p class="card-text"><?=esc($news["Description"])?></p>
            <button id=<?=esc($news['NewsId'])?> onclick="edit_news(this.id)"class="aedit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">&#x1F589;</button>
            <button id=<?=esc($news['NewsId'])?> onclick="get_id(this.id)" class="adelete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" >&#10005;</button>
        </div>
    </div>
    <?php if(($count+1)%2 == 0) {
        echo "</div>";
    } ?>
    <?php $count += 1?>
<?php endforeach ?>
<?php
  if($count%2 != 0)
    echo " <div class='card col' id='dummy'></div>";
?>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete News??</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you Really Want To Delete It?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="delete_news()" data-bs-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
</body>
<script>
    var delete_id = -1;

    function get_id(id){
      event.preventDefault();

      delete_id = id;
    }

    function delete_news(){
        $.ajax({
            url: "AdminNews/Delete",
            type: "POST",
            data: {
                delete_id:delete_id,
              },
            success: function(res){
                location.reload();
            
        }
      });
    }

    function edit_news(id){
        var form = document.createElement("form");
        input = document.createElement("input");

        form.action = "NewsEdit";
        form.method = "post"

        input.type = "hidden";
        input.name = "id";
        input.value = id;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit()

    }
    </script>
    <style>
    body{
        background-color: rgb(144, 88, 134);
    }

    .modal-header{
      flex-direction: unset;
    }

    .modal-footer{
      justify-content: flex-end;
      flex-direction: unset;
      align-items: unset;
    }
    
@media(max-width: 768px){
    .container, .row, .col{
        display: block;
    }

    .card-img-top{
      height: 300px;
    }

    .cards{
      width: 90%;
      height: 450px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      
    }
}
</style>
</html>
<!--✄-->