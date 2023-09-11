<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Top navbar example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

<link href="<?php echo base_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    

 <link href="<?php echo base_url('navbar-top.css');?>" rel="stylesheet">

  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Top navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      
	  
	  <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("home");?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("home/calc1");?>">Calc1</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("home/calc2");?>">Calc2</a>
        </li>
		
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
	  
	   
	  
	  
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Selamat Datang</h1>
<?php
$Random=rand(1,5);
?>	
<img width="100%" height="450" src="<?php echo base_url("images/well".$Random.".jpg");?>" alt="">

	 
    <p class="lead">This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>
	
    <a class="btn btn-lg btn-primary" href="../components/navbar/" role="button">View navbar docs &raquo;</a>
  </div>
</main>


    <script src="<?php echo base_url('assets/dist/js/bootstrap.bundle.min.js');?>"></script>

<?php
/*

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

*/
?>   
  </body>
</html>
