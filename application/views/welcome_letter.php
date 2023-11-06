<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Letter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');



  body {
    background-image: url(<?= base_url('assets/img/bg8.jpeg') ?>);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #82b1ff;
    color: #252525;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    overflow-x: hidden;
  }

  .congrats {
    text-align: center;
    margin-top: 3.5em;
    background-color: #fff;
    width: 100%;
    margin: auto;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    animation: sh linear 1s forwards;
    padding: 12px;
    position:relative;
    z-index: 10;

  }
  .congrats h1{
    font-weight: bold;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
    display: flex;
    justify-content: center;
  }

  .table td,
  .table th {
    padding: 8px;
    border: 1px solid #ddd;
    white-space: nowrap;
  }

  .table th {
    background-color: #f2f2f2;
  }



  .welcomebox-content {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    /* Adjust this value as needed */

  }

  .btn-success {
    background-color: #00c853;
    color: #fff;
  }

  

  

  .action {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-height: 300px;
    max-width: 300px;
    width: 15vw;
    z-index: -10;
   }
 
 .congrats img{
     width : 30% !important;
 }

.congrats p{
        font-size: 11px;
    padding: 0 10px;
}



.congrats .btns {
    color: #575757 !important;
}



  @media screen and (max-width: 1300px) {

    /* .welcomebox {
  width: 35vw;
	} */
    
  }

  @media screen and (max-width: 1920px) {
    .action {
      /* top: unset !important; */
    }

 
  }

  @media screen and (max-width: 768px) {

    /* .welcomebox {
	width: 67vw;
  } */
  
  
 .congrats img{
     width : 50% !important;
 }
  
  
   
  }

  @keyframes sh {
    from {

      opacity: 0;
      transform: scale(0.01);
      
    }

    to {

      opacity: 1;
      transform: scale(1);
    }
  }


  @media screen and (min-width: 1150px) {

    /* .congrats {
      width: 80% !important;
    } */
    .congrats {
      width: 79% !important;
    }

 
    .action {
      /* top: unset !important; */

    }

    body {
      font-size: 14px !important;
    }

    .table tr,
    td {
      font-size: 12px;
    }

    .table {
      overflow-x: auto;

    }
  }

  @media screen and (max-width: 734px) {
    .congrats {
      width: 70% !important;
    }

    .action {
      /* top: unset !important; */
    }
  }

    @media screen and (max-width: 480px) {
      .congrats {
        width: 100% !important;
      }

 

 
    body {
      font-size: 14px !important;
    }

    .table tr,
    td {
      font-size: 12px;
    }

    .table {
      overflow-x: auto;

    }

  }
  
  .wall{
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/18515/PIA09959-1280x800_copy.jpg);
  background-size: cover;
}

html, body{
  height: 100%;
  width: 100%;
  overflow: hidden;
}

body{
  background: #000;
  text-align: center;
}

.scene{
  display: inline-block;
  vertical-align: middle;
  perspective: 5px;
  perspective-origin: 50% 50%;
  position: relative;
}

.wrap{
  position: absolute;
  width: 1000px;
  height: 1000px;
  left: -500px;
  top: -500px;
  transform-style: preserve-3d;
  animation: move 2s  linear;
  animation-fill-mode: forwards;
  
}

.wall {
  width: 100%;
  height: 100%;
  position: absolute;
  opacity: 0;
  animation: fade 2s  linear;
}


.wall-right {
  transform: rotateY(90deg) translateZ(500px);
}

.wall-left {
  transform: rotateY(-90deg) translateZ(500px);
}

.wall-top {
  transform: rotateX(90deg) translateZ(500px);
}

.wall-bottom {
  transform: rotateX(-90deg) translateZ(500px);
}

.wall-back {
  transform: rotateX(180deg) translateZ(500px);
}

@keyframes move {
  0%{
    transform: translateZ(-500px) rotate(0deg);
  }
  100%{
    transform: translateZ(500px) rotate(0deg);
  }
}

@keyframes fade {
  0%{
    opacity: 0;
  }
  25% {
    opacity: 1;
  }
  75% {
    opacity: 1;
  }
  100%{
    opacity: 0;
  }
}



/* 
.scene { 
  animation: 🤫 300s infinite linear;
}

@keyframes 🤫 {
  0%{
    filter: hue-rotate(0)
  }
  50% {
    filter: hue-rotate(180deg) saturation(5);
    transform: scaleX(4000);
    perspective: 50px;
  }
 
  100%{
    filter: hue-rotate(360deg);
  }
} 
*/

</style>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="welcomebox-content">

          <div class="welcomebox">
            <div class="action" id="action">
              <div class="scene">
                  <div class="wrap">
                      <div class="wall wall-right"></div>
                      <div class="wall wall-left"></div>   
                      <div class="wall wall-top"></div>
                      <div class="wall wall-bottom"></div> 
                      <div class="wall wall-back"></div>    
                  </div>
                  <div class="wrap">
                      <div class="wall wall-right"></div>
                      <div class="wall wall-left"></div>   
                      <div class="wall wall-top"></div>
                      <div class="wall wall-bottom"></div>   
                      <div class="wall wall-back"></div>    
                  </div>
                </div>

              
            </div>
            <div class="congrats">
              <img src="<?= base_url() ?>assets/newui/img/logos/logo.png" alt="" class="img-fluid mt-4 mb-2">
              <h1 class="text-success mb-2">Register Successful!</h1>
              <p class="my-3">Dear <?= $first_name . ' ' . $last_name; ?>,
                You are now successfully Registered, Your Member ID is<strong> <?= $member_id; ?></strong> and Password is<strong> <?= $password_print; ?> </strong>If any queries please don't hesitate to contact us.</p>
              <table class="table px-2">
                <tr>
                  <td>Sponsor Id:</td>
                  <td><?= $sponsor_id; ?></td>
                </tr>
                <tr>
                  <td>Sponsor Name:</td>
                  <td><?php $query = "SELECT first_name, last_name FROM users WHERE member_id = '$sponsor_id'";
                      $result = $this->db->query($query)->result_array();
                      echo $result[0]['first_name'] . ' ' . $result[0]['last_name']; ?></td>
                </tr>
                <tr>
                  <td>Member Id</td>
                  <td><?= $member_id; ?></td>
                </tr>
                <tr>
                  <td>Member Name</td>
                  <td><?= $first_name . ' ' . $last_name; ?></td>
                </tr>
                <tr>
                  <td>Email ID</td>
                  <td><?= $email; ?></td>
                </tr>
                <tr>
                  <td>Mobile No.</td>
                  <td><?= $mobile_number; ?></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><?= $password_print; ?></td>
                </tr>
              </table>
              <div class="btns d-flex gap-1 justify-content-center ">
                
                <a href="<?= base_url('login') ?>" class="btn btn-outline-secondary d-inline-flex align-items-center" type="button">
                  Dashboard

                </a>
              </div>
              <!-- <div class="endbtnwelcome">
      <div class="buttons-w">
        <a class="button one btn btn-primary waves-effect waves-light" href="<?= base_url('registration') ?>">Register Agian</a>
        <a class="button two btn btn-success waves-effect waves-light" href="<?= base_url('login') ?>">Log in</a>


      </div>

    </div> -->
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
  <?php include_once("foot.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>