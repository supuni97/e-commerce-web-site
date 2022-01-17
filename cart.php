<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php 
    
    include('db.php');

    session_start();
    if(isset($_SESSION['sign_in'])){
      if($_SESSION['sign_in'] == true){

        $user_id = $_SESSION['user_id'];
        if(isset($_SESSION['table'])){
          $table_name = $_SESSION['table'];
        }

        $sql = "SELECT * FROM cart_details WHERE user_id = '".$user_id."'";

        $result = $link -> query($sql);

?>
    <?php include('navBar.php'); ?>

    <div class="container">
        <div  style="position:sticky;top: 0; z-index: 100;">
            <center><h1 style="text-transform: capitalize;" class="mb-5 mt-4 alert-primary p-3"><?php echo $_SESSION['username']; ?>'s Cart</h1></center>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div>
                    <?php 
                        $total_price = 0;
                        while ($row = $result -> fetch_array()) {

                                if(isset($_GET['id'])){
                                    $product_id = $_GET['id'];

                                    $sql1 = "DELETE FROM cart_details WHERE product_id = '".$product_id."'";
                                    $result1 = $link -> query($sql1);
                                    if ($result1) {
                                        header('location:cart.php');
                                    }
                                }


                            ?>
                            <div style="position:relative;">
                                <div class="mb-4">
                                <img src="<?php echo $row['src']; ?>" width=100px>
                                <h5><?php echo $row['product_name'] ?></h5><br>

                                <h3 style="color:#32a852;"><span>LKR.</span><span id="price"><?php echo $row['product_price'] ?></span></h3>

                            </div>
                            <div class="quantities">
                                <button id="minus-btn" type="button" style="padding: 0 5px;border: 1px solid blue; background-color: #fff;" disabled="disabled";>-</button>
                                <input type="text" name="" id ="quantity" value="<?php echo $row['quantity']; ?>" style="width: 40px;box-sizing: border-box;padding-left: 10px; background-color: #fff; border: none;">
                                <button id="plus-btn" type="button" style="padding: 0 5px;border: 1px solid blue; background-color: #fff;">+</button>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $row['product_id'] ?>"><button class="btn btn-danger" style="position: absolute; right: 5px;" >Delete</button></a>
                            </div>
                            </div>
                            <hr>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="row">
                        
                    <div class="col-md-6 col-lg-6 col-sm-12 card mb-5 ml-3 shadow" style="height:300px; position:relative;">
                    <div class="mt-3 mb-4 card-body">
                        <h2 class="mb-4 card-text"><i>Order Summary</i></h2>
                        <h4 style="display: flex;justify-content: space-between;" class="card-text"><span>Total Price</span><span><span>LKR.</span><span id="t_price">0</span></h4>

                        <button class="btn btn-secondary" id="buy-btn" style="position:absolute; bottom: 15px; width: 82%;" title="You must see your quantity, If it is correct go to buy " >Buy</button>

                </div>

                </div>
            </div>
                <div class="row">
                    <div class="mb-5 shadow">
                    <form class="row g-3 needs-validation" id="buy-form" style="display:none;" novalidate>
                        <h4>Fil this form to continue your payments</h4>
                      <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                          <div class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">State</label>
                        <select class="form-select" id="validationCustom04" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a valid state.
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="validationCustom05" required>
                        <div class="invalid-feedback">
                          Please provide a valid zip.
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                          </label>
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-4" id="paypal">
                        <div id="paypal-button"></div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php }else{ ?>

        <div style="width:100%; height:100vh; background-color: rgba(0, 0, 0,0.8);">
          <div style="width: 100%;height: 100vh;">
            <div style="width: 60%;height: 50vh; margin: 25vh auto;">
               <div class="shadow p-3 mb-5 bg-body rounded" role="alert" style="height: 100%; position: relative;">
                <div style="position:absolute; top: 45%; left: 26%;">
                  <h2>You need to Sign In first</h2>
                </div>
                <div style="position:absolute; bottom: 5%;right: 5%;">
                  <a href="home.php"><button class="btn btn-primary" >Go to Home</button></a>
                </div>
              </div>
            </div>
        </div>
        </div>

      <?php }}else{ ?>

        <div>
          <div style="width: 100%;height: 100vh;">
            <div style="width: 60%;height: 50vh; margin: 25vh auto;">
               <div class="shadow p-3 mb-5 bg-body rounded" role="alert" style="height: 100%; position: relative;">
                <div style="position:absolute; top: 45%; left: 26%;">
                  <h2>You need to Sign In first</h2>
                </div>
                <div style="position:absolute; bottom: 5%;right: 5%;">
                  <a href="home.php"><button class="btn btn-primary" >Go to Home</button></a>
                </div>
              </div>
            </div>
        </div>
        </div>
  
    <?php } ?>
    <?php include('footer.php'); ?>


    <script>
        let buy_btn = document.querySelector('#buy-btn');
        let buy_form = document.querySelector('#buy-form');

        buy_btn.addEventListener('click', () => {
            buy_btn.setAttribute("disabled", "disabled");
            buy_form.removeAttribute("style");
        });
    </script>
    <script type="text/javascript" src="main.js"></script>

<!-- paypal -->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    let total_price = document.querySelector('#t_price').innerHTML;
    //let total_price = parseInt(total_price_src);
    total_price = total_price/200;

  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: total_price,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
        window.location.replace("success.php");
      });
    }
  }, '#paypal-button');

</script>    

</body>
</html>