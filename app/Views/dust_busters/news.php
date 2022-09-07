<style>
    body{
        background-color: rgb(144, 88, 134);
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
<div class="container">
<?php $count = 0?>
<?php foreach ($all_news as $news): ?>
    <?php if($count%2 == 0) {
        echo "<div class='row'>";
    } ?>
    <div class="card col">
        <img src=<?=esc($news['img_name'])?> class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?=esc($news["Title"])?></h5>
            <p class="card-text"><?=esc($news["Description"])?></p>
        </div>
    </div>
    <?php if(($count+1)%2 == 0) {
        echo "</div>";
    } ?>
    <?php $count += 1?>
        
<?php endforeach ?>
<!--

<div class="cards col">
    <img src="./images/c5.jpg" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">Card tilte</h5>
        <p class="card-text">Some quick News on the go</p>
    </div>
</div>
</div>
<div class="row">
<div class="cards col">
    <img src="./images/c5.jpg" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">Card tilte</h5>
        <p class="card-text">Some quick News on the go</p>
    </div>
</div>
</div>
-->
</div>