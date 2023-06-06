<?php
    include("header.php");
    include("connect.php");
?>
<title>Check Out &ndash; BRICH Bookstore</title>
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width" style="padding-top: 60px">Checkout</h1></div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      		</div>
		</div>
        <!--End Page Title-->

        <?php
        if (!isset($_SESSION['user_id']) & empty($_SESSION['user_id']) || $_SESSION['verify'] == 0) {
            ?>
            <div style="display: flex; justify-content: center; align-items: center; margin: auto; width: 350px; height: 200px;">
            <div class="text-center" style="font-size: 15px; word-spacing: 2px; line-height: 1.5;">
                <p>Login to checkout items</p>
                <a href="login.php"><button type="button" class="btn btn-small">LOGIN</button></a>
            </div>
            </div>
            <?php
        } 
        
        else
        {
        ?>
        
        <div class="container">
        	<div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box returning-customer">
                        <h3><i class="icon anm anm-user-al"></i> Information </h3>
                        
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Summary </h3>
                        
                    </div>
                </div>
            </div>
            
            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form id="payment-form" method="post" onsubmit="return validateExpiryDate()" action="checkout_process.php">
                            <fieldset>
                                <h2 class="login-title mb-3">Shipping details</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-name">Name <span class="required-f">*</span></label>
                                        <input name="name" value="<?= $user['username']?>" id="input-name" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                        <input name="telephone" value="<?=$user['phone'];?>" id="input-telephone" type="tel" required>
                                    </div>
                      
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-address-1">Address <span class="required-f">*</span></label>
                                        <input name="address" value="<?=$user['ship_address'];?>" id="input-address-1" type="text" required>
                                    </div>
                    
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-city">City<span class="required-f">*</span></label>
                                        <input name="city" value="<?= $user['city'];?>" id="input-city" type="text" required>
                                    </div>

                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-state">States <span class="required-f">*</span></label>
                                        <select name="state" class="form-control" required>
                                            <option value=""> --- Please Select States --- </option>
                                            <option value="Johor" <?php if ($user['states'] == 'Johor') echo 'selected'; ?>>Johor</option>
                                            <option value="Malacca" <?php if ($user['states'] == 'Malacca') echo 'selected'; ?>>Malacca</option>
                                            <option value="Kedah" <?php if ($user['states'] == 'Kedah') echo 'selected'; ?>>Kedah</option>
                                            <option value="Kelantan" <?php if ($user['states'] == 'Kelantan') echo 'selected'; ?>>Kelantan</option>
                                            <option value="Negeri Sembilan" <?php if ($user['states'] == 'Negeri Sembilan') echo 'selected'; ?>>Negeri Sembilan</option>
                                            <option value="Pahang" <?php if ($user['states'] == 'Pahang') echo 'selected'; ?>>Pahang</option>
                                            <option value="Penang" <?php if ($user['states'] == 'Penang') echo 'selected'; ?>>Penang</option>
                                            <option value="Perak" <?php if ($user['states'] == 'Perak') echo 'selected'; ?>>Perak</option>
                                            <option value="Perlis" <?php if ($user['states'] == 'Perlis') echo 'selected'; ?>>Perlis</option>
                                            <option value="Sabah" <?php if ($user['states'] == 'Sabah') echo 'selected'; ?>>Sabah</option>
                                            <option value="Sarawak" <?php if ($user['states'] == 'Sarawak') echo 'selected'; ?>>Sarawak</option>
                                            <option value="Selangor" <?php if ($user['states'] == 'Selangor') echo 'selected'; ?>>Selangor</option>
                                            <option value="Terengganu" <?php if ($user['states'] == 'Terengganu') echo 'selected'; ?>>Terengganu</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-postcode">Post Code <span class="required-f">*</span></label>
                                        <input name="postcode" value="<?= $user['postal'];?>" id="input-postcode" type="text" required>
                                    </div>
                                </div>

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">payment method</h2>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion" class="payment-section">
                                            <div class="card mb-2">
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardname">Name on Card <span class="required-f">*</span></label>
                                                                <input name="cardname" value="" placeholder="Card Name" id="input-cardname" class="form-control" type="text" required>
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-payment">Credit Card Type <span class="required-f">*</span></label>
                                                                <select name="payment_method" class="form-control" id="input-payment" required>
                                                                <option value=""> --- Please Select --- </option>
                                                                <option value="American Express">American Express</option>
                                                                <option value="Visa Card">Visa Card</option>
                                                                <option value="Master Card">Master Card</option>
                                                                <option value="Discover Card">Discover Card</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardno">Credit Card Number  <span class="required-f">*</span></label>
                                                                <input name="cardno" value="" placeholder="Credit Card Number" id="input-cardno" class="form-control" type="text" pattern="[0-9]{16}" maxlength="16" required>
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cvv">CVV Code <span class="required-f">*</span></label>
                                                                <input name="cvv" value="" placeholder="CVV (3 digit)" id="input-cvv" class="form-control" type="password" maxlength="3" pattern="[0-9]{3}" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="cc-expiration-mm">Expiration Date <span class="required-f">*</span></label>
                                                                <div class="row">
                                                                <div class="col">
                                                                    <label for="cc-expiration-mm">Month</label>
                                                                    <select name="cc-expiration-mm" class="form-control" id="cc-expiration-mm" required>
                                                                        <option value="">MM</option>
                                                                        <option value="">---------</option>
                                                                        <option value="1">January</option>
                                                                        <option value="2">February</option>
                                                                        <option value="3">March</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">May</option>
                                                                        <option value="6">June</option>
                                                                        <option value="7">July</option>
                                                                        <option value="8">August</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                    </select>
                                                                    <span id="cc-expiration-mm-error" class="error-message" style="color: red;"></span>
                                                                </div>
                       

                                                                <div class="col">
                                                                    <label for="cc-expiration-mm">Year</label>
                                                                    <select name="cc-expiration-yy" class="form-control" id="cc-expiration-yy" required>
                                                                        <option value="">YY</option>
                                                                        <option value="">---------</option>
                                                                        <option value="24">2024</option>
                                                                        <option value="25">2025</option>
                                                                        <option value="26">2026</option>
                                                                        <option value="27">2027</option>
                                                                        <option value="28">2028</option>
                                                                        <option value="29">2029</option>
                                                                        <option value="30">2030</option>
                                                                        <option value="31">2031</option>
                                                                    </select>
                                                                    <span id="cc-expiration-yy-error" class="error-message" style="color: red;"></span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <img src="assets/images/payment2.jpg" alt="card" title="card" />
                                                            </div>
                                                        </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                            <label for="input-note">Order Notes</label>
                                                            <textarea class="form-control resize-both" rows="3" name="note" id="input-note" maxlength="3500"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </fieldset>
                    </div>
                </div>    

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>
                            <?php
                                $total = 0;
                                $uid = $_SESSION['user_id'];
                                $sql = "SELECT * FROM cart JOIN books ON books.book_id = cart.bid AND uid = '$uid'";
                                $result = mysqli_query($conn, $sql);
                                $rowcount = mysqli_num_rows($result);
                                if ($rowcount != 0) {
                                                    ?>
                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Images</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $total = 0;
                                        $shippingFee = 8;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $book_id = $row['book_id'];
                                            $book_price = $row['book_price'];
                                            $qty = $row['qty'];
                                            $subtotal = $book_price * $qty;
                                            $total += $subtotal;
                                            ?>
                                            <tbody>
                                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                                    <td class="cart__image-wrapper cart-flex-item">
                                                        <a href="product-detail.php?book_id=<?php echo $row['book_id']; ?>"><img class="cart__image" src="assets/images/<?php echo $row['book_image']; ?>" alt="<?php echo $row['book_title']; ?>"></a>
                                                    </td>
                                                    <td class="cart__meta small--text-left cart-flex-item">
                                                        <div class="list-view-item__title">
                                                            <a href="product-detail.php?book_id=<?php echo $row['book_id']; ?>"><?php echo $row['book_title']; ?> </a>
                                                        </div>
                                                    </td>
                                                    <td class="cart__price-wrapper cart-flex-item">
                                                        <span class="money">RM<?php echo $row['book_price'] ?></span>
                                                    </td>
                                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                                        <?php echo $row['qty'] ?>
                                                    </td>
                                                    <td class="text-right small--hide cart-price">
                                                        <div><span class="money">RM<?php echo $subtotal ?></span></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>

                                        <tfoot class="font-weight-600">
                                            <tr>
                                                <td colspan="4" class="text-right">Shipping</td>
                                                <td>RM<?php echo $shippingFee; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Total</td>
                                                <td>RM<?php echo $total + $shippingFee; ?></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <hr />
                                    <div class="order-button-payment">
                                        <button type="submit" name="order" class="btn btn-primary" >Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
        <!--End Body Content-->

<script>
function validateExpiryDate() {
  var monthInput = document.getElementById('cc-expiration-mm');
  var yearInput = document.getElementById('cc-expiration-yy');
  var monthError = document.getElementById('cc-expiration-mm-error');
  var yearError = document.getElementById('cc-expiration-yy-error');

  var month = parseInt(monthInput.value);
  var year = parseInt(yearInput.value);

  monthError.textContent = '';
  yearError.textContent = '';

  if (isNaN(month) || month < 1 || month > 12) {
    monthError.textContent = 'Please enter a valid month (1-12).';
    return false;
  }

  if (isNaN(year) || year < 0 || year > 99) {
    yearError.textContent = 'Please enter a valid year (00-99).';
    return false;
  }

  var currentDate = new Date();
  var currentYear = currentDate.getFullYear() % 100;
  var currentMonth = currentDate.getMonth() + 1;

  if (year < currentYear || (year === currentYear && month < currentMonth)) {
    monthError.textContent = 'This credit card has expired.';
    return false;
  }

  return true;
}
</script>



    <?php
    include('footer.php');
    ?>

    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    <!-- Including Jquery -->
    <script src="assets/js/main.js"></script>
</div>
</body>

<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->
</html>
