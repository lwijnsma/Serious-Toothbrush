<?php
    include 'include/checkout_script.php';
?>

<div class='container' style='margin-top: 50px'>
    <div class='row'>
        <div class='col'>
            <h3 id="white">Product(en)</h3>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <div class='card card-info'>
                <div class='card-body'>
                    <?php while ($song = $songs->fetch_assoc()): ?>
                    <?php $total += $song['price']; ?>
                        <div class='row'>
                            <div class='col'>
                                <img width='100px' height='70px' class='img-responsive' src='<?php echo ($song['picture_location'])?? 'images/song_placeholder.png'; ?>' />
                            </div>

                            <div class='col'>
                                <h4 class='product-name'>
                                    <strong><?php echo $song['title']; ?></strong>
                                </h4>

                                <h4>
                                    <small><?php echo $song['description']; ?></small>
                                </h4>
                            </div>

                            <div class='col text-right'>
                                <h6>
                                    <strong>&euro; <?php echo $song['price']; ?></strong>
                                </h6>
                            </div>
                        </div>
                        <hr>
                    <?php endwhile; ?>

                    <div clas='row'>
                        <div class='col text-right'>
                            <b>Totaal prijs :</b>&nbsp;
                            <b>&euro; <?php echo $total; ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</br>

<div class='container'>
    <div class='row'>
        <div class='col'>
            <h3 id="white">Selecteer betaal methode</h3>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <div class="list-group">
                <div class="list-group-item">
                    <div class="list-group-item-heading">
                        <div class="row radio">
                            <div class="col">
                            <label>
                            <input type="radio" name="checkout" id="option1" value="iDeal" disabled>
                                iDeal
                            </label>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">select bank</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>ING</option>
                                        <option>ABN Ambro</option>
                                        <option>Rabobank</option>
                                        <option>Knab</option>
                                        <option>SNS</option>
                                    </select>
                                </div>
                            </div>

                        <div class="col">
                            <button type="button" class="btn btn-primary" disabled>Checkout</button>
                        </div>

                        </div>
                    </div>
                </div>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
            <div class="list-group-item">
                <div class="list-group-item-heading">
                    <div class="row radio">
                        <div class="col">
                            <label>
                            <input type="radio" name="checkout" id="option2" value="CC" disabled>
                                Credit Card
                            </label>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">select Creditcard</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Visa</option>
                                    <option>Master Card</option>
                                    <option>Discover</option>
                                    <option>American Expres</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-primary" disabled>Checkout</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group-item">
                <div class="list-group-item-heading">
                    <div class="row radio">
                        <div class="col">
                            <label>
                                <input type="radio" name="checkout" id="option3" value="paypal" disabled>
                                PayPal
                            </label>
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="PayPal e-mail" disabled>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-primary" disabled>Checkout</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group-item">
                <div class="list-group-item-heading">
                        <div class="row radio">
                            <div class="col">
                                <label>
                                    <input type="radio" name="checkout" id="option4" value="voucher" checked>
                                    Voucher
                                </label>
                            </div>

                            <div class="col">
                                <input type="text" class="form-control" name='code' placeholder="Code" >
                            </div>

                            <div class="col">
                                    <button type="submit" name='submit' class="btn btn-primary">Checkout</button>
                            </div>
                        </div>
                    </form>

                    <?php if ($checkout === 'voucher'): ?>
                        <div class='row'>
                            <div class='col'>
                                <?php echo $error; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</br>
