<?php
  // session_start();
  // if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
  //   header("location: login.php");
  //   exit();
  // }

  // require("./php/UIHandler.php");
  // $ui = new UIHandler();
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Home - Tomanap</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	  <script src="js/sweetalert.js"></script>
    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
</head>
<body id="page-top" class="politics_version">
  <div class="m-4">
    <h1>Servers:</h1>
    <ul class="list-group data_servers">
      
    </ul>
    <div style="display: none;" class="div_tomanap">
      <div id="showLetter" style="display: none;">
        <h1 id="hereLetter"></h1>
      </div>
      <form id="tomanap_form">
      <table>
        <tr>
          <td>T</td>
          <td><input type="text" name="country" placeholder="tara" class="form-control input_country"></td>
        </tr>
        <tr>
          <td>O</td>
          <td><input type="text" name="city" placeholder="oras" class="form-control input_city"></td>
        </tr>
        <tr>
          <td>M</td>
          <td><input type="text" name="mountain" placeholder="munte" class="form-control input_mountain"></td>
        </tr>
        <tr>
          <td>A</td>
          <td><input type="text" name="water" placeholder="apa" class="form-control input_water"></td>
        </tr>
        <tr>
          <td>N</td>
          <td><input type="text" name="name" placeholder="nume" class="form-control input_name"></td>
        </tr>
        <tr>
          <td>A</td>
          <td><input type="text" name="animal" placeholder="animal" class="form-control input_animal"></td>
        </tr>
        <tr>
          <td>P</td>
          <td><input type="text" name="plant" placeholder="planta" class="form-control input_plant"></td>
        </tr>
      </table>
      <form>
      <h1 id="game-stopped" style="display: none;"></h1>
      <button type="button" class="btn btn-danger btn-lg click_stop">STOP!</button>
      <button type="button" class="btn btn-success view-score" style="display: none;">View scores</button>
    </div>
  </div>


  <div class="modal fade" id="modalScores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Server scores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tableScores" style="width: 100%;">
          <thead>
            <tr>
              <th>Name</th>
              <th>T</th>
              <th>O</th>
              <th>M</th>
              <th>A</th>
              <th>N</th>
              <th>A</th>
              <th>P</th>
            </tr>
          </thead>
          <tbody class="tbody_scores"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="js/all.js"></script>
    <script src="js/jquery.easing.1.3.js"></script> 
    <script src="js/parallaxie.js"></script>
    <script src="js/headline.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/jquery.vide.js"></script>
    <script src="assets/js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>