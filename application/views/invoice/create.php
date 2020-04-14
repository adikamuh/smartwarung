<?php
    // function get_coordinates($city, $street, $province){
    //     $address = urlencode($city.','.$street.','.$province);
    //     $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Poland";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     $response = curl_exec($ch);
    //     curl_close($ch);
    //     $response_a = json_decode($response);
    //     $status = $response_a->status;

    //     if ( $status == 'ZERO_RESULTS' ){
    //         return FALSE;
    //     }
    //     else{
    //         $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
    //         return $return;
    //     }
    // }

    // function GetDrivingDistance($lat1, $lat2, $long1, $long2){
    //     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     $response = curl_exec($ch);
    //     curl_close($ch);
    //     $response_a = json_decode($response, true);
    //     $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    //     $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    //     return array('distance' => $dist, 'time' => $time);
    // }

    // $coordinates1 = array(
    //     'lat'   => -7.9512782,
    //     'long'  => -112.623029
    // );
    // $coordinates2 = array(
    //     'lat'   => -7.944541,
    //     'long'  => 112.619553
    // );

    // if ( !$coordinates1 || !$coordinates2 ){
    //     echo 'Bad address.';
    // }
    // else{
    //     $dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
    //     echo 'Distance: <b>'.$dist['distance'].'</b><br>Travel time duration: <b>'.$dist['time'].'</b>';
    // }
?>

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-12 ftco-animate">
            <form action="#" class="billing-form">
                <h2 class="text-center mb-6 billing-heading">Detail Belanja</h2>
                <div class="cart-list">
                <table class="table table-sm">
                    <thead class="thead-primary" style="line-height: 0.5;">
                        <tr class="text-center" >
                        <th></th>
                        <th></th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="<?php echo site_url('cart/update/') ?>" method="post" hidden>
                    <?php $total=0;foreach($carts as $item): ?>
                        <tr class="text-center">
                            <td class="product-remove " style="width:0.1%;"><a onclick="return confirm('Apakah Anda yakin akan menghapus?');" href="<?php echo site_url('cart/delete/').$item['item'] ?>"><span class="ion-ios-close"></span></a></td>
                            
                            <td class="image-prod " style="width:0.1%;"><div class="img" style="background-image:url(<?php $photos = explode(',',$item['photo']); echo base_url('assets/uploads/').$photos[0]?>);"></div></td>
                            
                            <td class="product-name " style="width:0.1%;">
                                <h3><?php echo $item['name'] ?></h3>
                                <input type="number" name="item" hidden value="<?php echo $item['id'] ?>">
                            </td>
                            
                            <td class="price " style="width:0.1%;"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></td>
                            <input type="number" name="price" hidden value="<?php echo $item['price'] ?>">
                            
                            <td class="price" style="width:0.1%;">
                                <!-- <div class="input-group mb-3">
                                    <input type="text" name="quantity[]" class="quantity form-control input-number" value="<?php echo $item['quantity'] ?>" min="1" max="100">
                                </div> -->
                                <?php echo $item['quantity'] ?>
                                <input type="number" name="quantity" hidden value="<?php echo $item['quantity'] ?>">
                            </td>
                            
                            <td class="total " style="width:0.1%;"><?php echo "Rp ".number_format($item['price']*$item['quantity'], 0, ".", ".");$total += $item['price']*$item['quantity'] ?></td>
                        </tr><!-- END TR-->
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </form><!-- END -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 ftco-animate">
	          <div class="row mt-5 pt-3">
	          	<div class="col-xl-6 mb-5">
	          		<form action="">
                        <div id="map" style="width: 100%;height: 400px;"></div>
                        <!-- <input id="origin-input" class="controls" type="text" placeholder="Asal">
                        <input id="destination-input" class="controls" type="text" placeholder="Enter a destination location"> -->
                        <!-- <div id="mode-selector" class="controls">
                            <input type="radio" name="type" id="changemode-walking" checked="checked">
                            <label for="changemode-walking">Walking</label>

                            <input type="radio" name="type" id="changemode-transit">
                            <label for="changemode-transit">Transit</label>

                            <input type="radio" name="type" id="changemode-driving">
                            <label for="changemode-driving">Driving</label>
                        </div> -->
                        <div class="row align-items-end mt-3">
                            <div class="col-sm-12">
                                <div class="form-group input-sm">
                                <div class="w-100"></div>
                                <div class="row">
                                <input type="text" name="warung" hidden id="warung" value="<?php echo $warungs['username'] ?>">
                                    <div class="col-sm-6 pb-3">
                                        <label for="asal" class="mt-3">Asal</label>
                                        <input id="origin-input" type="text" class="form-control" name="origin"  value="<?php echo $warungs['address'] ?>" disabled>
                                        <input id="origin-place_id" type="text" class="form-control" name="origin-place_id" placeholder="Asal" value="<?php echo $warungs['place_id'] ?>" hidden>
                                    </div>
                                    <div class="col-sm-6 pb-3">
                                        <label for="tujuan" class="mt-3">Tujuan</label>
                                        <input id="destination-input" type="text" class="form-control" name="destination" placeholder="Tujuan">
                                        <input id="destination-place_id" type="text" class="form-control" name="destination-place_id" placeholder="Tujuan" hidden>
                                    </div>
                                </div>
                                    <label for="jarak">Jarak (dalam kilometer)</label>
                                    <input disabled id="distance" type="text" class="form-control" name="distance" placeholder="Jarak" oninput="update_ongkir()">
                                </div>
                                <div class="w-100"></div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                    </form>
	          	</div>
	          	<div class="col-md-6 mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4" style="height:95%">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
                            <span>Total Belanja</span>
                            <span><?php echo "Rp ".number_format($total, 0, ".", ".") ?></span>
                            <input type="number" name="billing" value="<?php echo $item['price'] ?>" hidden id="billing">
                        </p>
                        <p class="d-flex">
                            <span>Ongkos Kirim</span>
                            <span id="ongkir">Rp 0</span>
                            <input type="number" name="delivery_fee" hidden id="delivery_fee">
                        </p>
                        <!-- <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p> -->
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="total"><?php echo "Rp ".number_format($total, 0, ".", ".") ?></span>
                            <input type="number" name="total" hidden id="total">
                        </p>
                        <p><a href="#"class="btn btn-primary py-3 px-2">Pesan sekarang</a></p>
                    </div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
          </div>
        </div>
      </div>
    </section> <!-- .section -->