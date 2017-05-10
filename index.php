<?php
//Time for class start with 15 minutes subtracted.
$staticTime = mktime(8, 30, 00, 5, 11, 2017);
$currentTime = date("d-m-Y H:i:s");

//Time for class start with 15 minutes subtracted - TESTING.
$classStart = date("d-m-Y H:i:s", $staticTime);
$time = strtotime($classStart);
$time = $time - (15 * 60);
$classStart = date("d-m-Y H:i:s", $time);

//Current fake time, same as class starts - TESTING.
$currentTimeFake = date("d-m-Y H:i:s", $staticTime);
$time = strtotime($currentTimeFake);
$time = $time - (15 * 60);
$currentTimeFake = date("d-m-Y H:i:s", $time);

class timeAndIpChecker 
{
	private $teacherIp;
	private $studentIp;

	function __construct()
	{
		$this->studentIp = "195.254.169.71";
		$this->teacherIp = "195.254.169.71";
	}

	public function checkIp()
	{
		if ($this->teacherIp ===  $this->studentIp)
		{
			return true;
		}
		return false;
	}

	public function checkTime($classStart, $currentTimeTest)
	{
		if($classStart === $currentTimeTest)
		{
			return true;
		}
		return false;
	}
}



$checker = new timeAndIpChecker();
$time = $checker->checkTime($classStart, $currentTimeFake);
$ip = $checker->checkIp();
$shown = false;
?>

<!DOCTYPE html>
<html lang="">
<head>
	<title></title>
	<meta name="description" content="">
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<style type="text/css">
 		p {
		    margin: 0 10px 10px;
		}
 	</style>
</head>
<body class="<?php if($time && !$shown) echo "modal-open";?>">
<header>
	  <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>

<div class="panel panel-default">
	<section class="panel-heading">
		<h4>Something here</h4>
	</section>
	<article class="">
		<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. </p>
			<?php 
				if ($time)
				{
					if($ip)
					{
						echo "<button type=\"button\" class=\" btn btn-success \">Tjek ind</button>";
					} else {
						echo "<button type=\"button\" class=\" btn btn-danger\">Meld fraværende</button>";
					}
				} else {
					echo "<button type=\"button\" class=\" btn btn-default\" disabled>Tjek ind</button";
				}
			?>
	</article>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" <?php if($time && $ip && !$shown) echo "style='display:block'"; ?>>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php 
if($time && $ip && !$shown) echo "<div class=\"modal-backdrop fade in\"></div>";
?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
</script>
</body>
</html>
