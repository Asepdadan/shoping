<form action="<?php echo base_url().'cart/update/'; ?>" >
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> Alert body ...
                    </div>

            <!--       <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li> -->
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Gambar</td>
                            <td class="description">Nama</td>
                            <td class="description">Kode</td>
                            <td class="price">Harga</td>
                            <td class="quantity">Banyak</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                            <?php echo form_hidden($i.'[rowid]', $items['rowid']);  ?>

                        <tr>
                            <td class="cart_product">
                                <a href="<?php echo $items['gambar']; ?>"><img src="<?php echo $items['gambar']; ?>" width="100" heigth="50"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">
                                     <?php echo $items['name'];  ?>

                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                                <p>
                                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                        <?php endforeach; ?>
                                                </p>

                                        <?php endif; ?>
                                </a></h4>
                                
                            </td>
                            <td><?php echo  $items['id']; $kode_produk[$i] = array('kode' => $items['id'],'banyak' => $items['qty'],'jumlah' => $i); ?></td>
                            <td class="cart_price">
                                <p><?php echo $this->cart->format_number($items['price']); ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="<?php echo $i.'[qty]'; ?>" autocomplete="off" size="2" placeholder="1" value="<?php echo $items['qty']; ?>">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?php echo base_url().'cart/remove/'.$items['rowid'];?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                      <?php $i++; ?>
                    <?php endforeach; ?>
                
                    <tr>
                        <td colspan="4" class="cart_total"> </td>
                        <td ><strong>Total Bayar</strong></td>
                        <td class="cart_total_price"><p>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></p></td>
                </tr>

                <tr>
                    <td colspan="5" class="cart_total"> </td>
                    <td ><button type="submit" class="btn btn-info">Update </button></td>
                </tr>
                                         
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
</form>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                        <legend>
                            <p Style="color:blue; font-weight:bold;">Kontak kami di Pin BBM : 234545 dan untuk produk lebih lanjut dan pemesanan</p>

                            <?php echo validation_errors(); ?>
                        </legend>
                    <form action="<?php echo base_url().'root/order/order'; ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <legend>Form Pemesanan</legend>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">Nama Lengkap  *(Wajib)</label>
                            <input type="text" name="nama"  class="form-control"  placeholder="Isi nama lengkap anda">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">Email  *(Jika punya)</label>
                            <input type="email" name="email"  class="form-control"  placeholder="Isi email anda">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">Kode Produk *(wajib)</label>
                            <input type="text" name="kode_produk"  class="form-control"  placeholder="Isi Kode produk yang anda pesan">
                            contoh : Jkt001#banyak yg di beli #ker235#banyak yg di beli#dst
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">No Handphone/Pin BBM *(wajib)</label>
                            <input type="text" name="nohp"  class="form-control"  placeholder="Isi no Kontak anda yg bisa di hubungi">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">Alamat Lengkap *(wajib)</label>
                            <textarea name="alamat"  class="form-control" rows="3"  placeholder="Isi alamat lengkap anda"></textarea>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <label for="">Bukti transfer</label>
                            <input type="file" name="userfile"  >
                        </div>
                    </div>
                    
            
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
              </div>
              <div class="col-xs-12 col-sm-6">
                  
              <?php 
             /*   if(empty($kode_produk)){

                }else{



              foreach ($kode_produk as $key) {
                echo "<br>";
                  echo "=================";
                    echo "<br>";
                  echo $key['kode'];
              
                  echo "<br>";
                  $test = $this->db->query("select nama,harga from tbl_produk where kode_produk = '$key[kode]' ")->result_array();
                  foreach ($test as $val ) {
                      echo $val['nama'];
                      echo "<br>";
                      echo $val['harga'];

                  }
                  echo "<br>";
                  echo $key['banyak'];
                  echo "<br>";
                  echo "=================";
                  echo "<br>";
                 
              }
          }*///end if

              ?>
              </div>
            </div>

        </div>
    </div>
</div>

<br><br>
<br><br>
<br><br>

