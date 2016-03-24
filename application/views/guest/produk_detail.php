<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5&appId=1077278998952020";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php
foreach ($data as $row) {
?>
<div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <a href="<?php echo base_url()?>assets/uploads/<?php echo $row['gambar']; ?>"><img src="<?php echo base_url()?>assets/uploads/<?php echo $row['gambar']; ?>" alt="" width="266" height="381" /></a>
                                    
                            </div>
                            
                                            </div>

                    
                    

                        <div class="col-sm-7">
                        <form action="<?php echo base_url().'cart/add_cart'; ?>" method="POST">
                                <input type="hidden" name="gambar" value="./assets/uploads/<?php echo $row['gambar']; ?>">
                                <input type="hidden" name="id" value="<?php echo $row['kode_produk']; ?>">
                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">

                            <div class="product-information"><!--/product-information-->
                                
                                <h2><?php echo $row['nama']; ?></h2>
                                
                                
                                <span>
                                    <span>Rp. <?php echo $row['harga']; ?></span>
                                    <label>Banyak:</label>
                                    <input type="text" name="qty" placeholder="5"/>
                                    <button type="submmit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Tambah Daftar
                                    </button>
                                </span>
                                
                                
                                <p>Bahan : <?php echo $row['bahan']; ?></p>
                                <p>Ukuran : <?php echo $row['size']; ?></p>
                                <p >Keterangan  : <p text-align="center">Untuk lebih detail tentang produk silahkan kontak kami di pin BB : 2dBCD23</p></p>
                                <p> <div class="fb-comments" data-href="http://gudangjeansfashion.com/home/produk_Detail/<?php echo $row['kode_produk']; ?>" data-width="200" data-numposts="7"></div></p>
                            </div><!--/product-information-->
                        </div>
                        </form>   
                    </div><!--/product-details-->
                    
                    <?php } ?>

                                        
                </div>

                </div>