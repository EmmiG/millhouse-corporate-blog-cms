<?php 
    session_start(); 
    require 'partials/head.php';
    require 'partials/fetch_months.php';
?>


<div class="main_wrap">
<div class="jumbotron jumbo_start">
<img src="images/millhouse_white_logo.svg">
<a href="#category">
<div id="arrow_down">
<i class="fa fa-angle-down" aria-hidden="true"></i>
</div>
</a>
</div><!--stänger jumbotron-->
<div class="container">
<div id="archive" class="content_wrap">
<form action="#archive" class="form-group" method="get">
<select name="month">

<?php
echo $_GET['month'];
foreach ($months as $value) {
if($value > 0) {
$date = date("F", mktime(0, 0, 0, $value, 10));
?>
<option value="<?= $date ?>"><?= $date ?></option>
<?php 
}
}
?>
</select>

<br>
<br>

<div class="row">
<div class="col-sm-12">      
    <div class="card_header">
        <h3>View all posts</h3>    
    </div>

<div class="card_content">
<?php 
if(isset($_GET['month'])) {
include 'partials/sort_months.php';
foreach($selected_posts as $selpost) { ?>

<div class="recent_loop row">
    <div class="col-sm-9">
        <h4><?= $selpost['title'] ?></h4>
        <h5><?= $selpost['time'] ?></h5>
        <p><?= $selpost['content'] ?></p>
        <!--<p> <?= $c['email'] ?></p>-->
    </div>

	<div class="col-sm-3">
	    <?php if(isset($_SESSION["user"]["username"])) {?> 
	                   
	        <form action="partials/delete_entry.php" method="post">
	            <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
	            <input type="submit" value="ta bort" class="btn btn-primary btn_card"/>
	        </form>

	        <form action="profile_editpost.php" method="post">
	            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
	            <input type="submit" value="redigera" class="btn btn-primary btn_card"/>
	        </form>
    </div> 
</div><!--stänger recent_loop row-->
 
        <?php }}} ?>
     </div><!--stänger card_content-->
  </div><!--stänger col-sm-12-->
</div><!--stänger row-->

<input type="submit" class="btn btn-primary" value="VIEW POSTS">
</form>

		</div><!--stänger content_wrap-->
	</div><!--stänger container-->
</div><!--stänger main_wrap-->


<?php  require 'partials/footer.php'; ?>

