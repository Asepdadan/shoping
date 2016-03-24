            <div class="col-sm-9 padding-right">
                  <!--features_items wanita-->
               <div class="features_items">

               <style type="text/css" media="screen">
                   .produk_inform{
                    font-size: 20pt;
                    margin-right: 250px;
                    text-align: center;
                   }
               </style>              
            
                        <h2 class="title text-center">Produk Wanita</h2>
                                <?php
                                if(empty($data)){
                                
                                    echo "<div class ='container'>";
                                    echo "<p class='produk_inform'>";
                                    echo "tidak ada produk";
                                    echo "</p2>";
                                    echo "</div>";
                                }else{

                                foreach($data as $row){
                                ?>
                        <div class="col-md-6">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <div class="row">
                                            <div class="col-xs-4 col-md-6">
                                            <p><a href="<?php echo base_url().'home/produk_Detail/'.$row['kode_produk']; ?>"><img src="<?php echo base_url()?>assets/uploads/<?php echo $row['gambar']; ?>" alt=""  width="268" heigth="249" /></a></p>
                                             <p>Kode : <?php echo $row['kode_produk']; ?></p>
                                            <p><h5>Rp. <?php echo $row['harga']; ?></h5></p>

                                            </div>

                                          
                                       
                                                     

                                        <div class="col-xs-6 col-md-">
                                                <div class="choose" style="margin-left:10px;">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <p>Nama : <a href="<?php echo base_url().'home/produk_Detail/'.$row['kode_produk']; ?>"><?php echo $row['nama']; ?></a></p>
                                                        <p>Bahan : <?php echo $row['bahan']; ?></p>
                                                        <p>Size : <?php echo $row['size']; ?></p>
                                                        <p>Warna  : <?php echo $row['warna']; ?></p>
                                                         <!-- form hidden -->
                                        <form action="<?php echo base_url().'cart/add_cart'; ?>" method="POST">
                                                <input type="hidden" name="gambar" value="<?php echo base_url()?>/assets/uploads/<?php echo $row['gambar']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['kode_produk']; ?>">
                                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                                <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                                                <input type="hidden" name="qty" value="1">
                                                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah Pembelian</button>
                                                          </form>
                                                    </ul>
                                                </div>

                                        </div>

                                        </div>                                      
                                    </div>
                                    <!-- <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Kode Produk : <?php echo $row['id']; ?></h2>
                                            <h2>Rp. <?php echo $row['harga']; ?></h2> -->
                                                <!-- inputan hidden add cart -->
                                                <!-- <form action="<?php echo base_url().'cart/add_cart'; ?>" method="POST">
                                                <input type="hidden" name="gambar" value="./assets/uploads/<?php echo $row['gambar']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                                <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                                                <input type="hidden" name="qty" value="1">
                                            <p><a href="<?php echo base_url().'home/produk_Detail/'.$row['id']; ?>"><?php echo $row['nama']; ?></a></p>
                                            <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah Ke Pembelian</button>
                                        </div>
                                    </div> -->
                                </div>
                                
                        
                                
                            </div>
                        </div>

                        <?php } }?>    
                         <center><?php echo $halaman ?></center>
                    </div> <!--features_items-->
                                   
                      <style type="text/css" media="screen">
                    .halaman a{
                        padding:10px;
                         background:#990000;
                         -moz-border-radius:15px;
                         -webkit-border-radius:15px;
                         border:1px solid #FFA500;
                         font-size:15px;
                         font-weight:bold;
                         color:#FFF;
                         text-decoration:none;
                         text-align: center;
                    }    
                    </style>
                        <hr>    
                                                                                    
                </div>
            </div>
        </div>
    </section>

    