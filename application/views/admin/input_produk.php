<script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>

<div class="container">
    <div class="row">





          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" >
                  <li class="active"><a href="#input" data-toggle="tab" Style="font-weight:bold;">Input Produk</a></li>
                  <li><a href="#produk" data-toggle="tab" Style="font-weight:bold;">Produk</a></li>
                  <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Celana Pria</a></li>
                  <li><a href="#kemeja" data-toggle="tab" Style="font-weight:bold;">Kemeja Pria</a></li>
                  <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Jaket Pria</a></li>
                  <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Blazer  Pria</a></li>
                  <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Kaos Pria</a></li>
                  <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Topi Pria</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Celana Wanita</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Gamis</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Jaket</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Atasan</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Sendal Sepatu</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Kerudung</a></li>
                    <li><a href="#celanapria" data-toggle="tab"Style="font-weight:bold;">Kaos</a></li>
                    <li><a href="#celanapria" data-toggle="tab" Style="font-weight:bold;">Kemeja Wanita</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="input">
                  <br>
<div class="col-xs-6 col-sm-4">
            <form action="<?php echo base_url().'add'; ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                    
                    
                    </div>                    
                </div>

                <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <?php 
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo validation_errors();
                        echo "</div>";
                         ?>
                        
                        </div>
                </div>

                  <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <label >Gambar Produk</label>    <br>
                        <img  class="img-responsive" id="uploadPreview" style="width: 200px; height: 150px;"/><br>
                        </div>
                </div>
                <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <input type="file" class="form-control" name="userfile" size="20" onchange="PreviewImage();"  id="uploadImage">
                        </div>
                </div>

               <!--  <div class="form-group">             
                        <div class="col-sm-10 col-sm-offset-2">       
                        <label >Kode Produk</label>    
                        <input type="text" class="form-control" name="produk_id" >
                        </div>
                </div> -->

                <div class="form-group">      
                        <div class="col-sm-10 col-sm-offset-2">              
                        <label >Kategori </label>    
                        <select name="kategori"  >
                        <?php foreach($kategori as $row){  ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                        <? } ?>
                        </select>
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Kode Produk</label>    
                        <input type="text" class="form-control" name="nama" >
                        </div>
                </div>



                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Nama Produk</label>    
                        <input type="text" class="form-control" name="nama" >
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Bahan Produk</label>    
                        <input type="text" class="form-control" name="bahan" >
                        </div>
                </div>

            <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Ukuran Produk</label>    
                        <input type="text" class="form-control" name="size" >
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Warna Produk</label>    
                        <input type="text" class="form-control" name="warna" >
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Harga Produk</label>    
                        <input type="text" class="form-control" name="harga" >
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Dekripsi Produk</label>    
                        <textarea name="deskripsi" placeholder="masukan deskripsi tentang produk" ></textarea>
                        </div>
                </div>
        
                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Merk Produk</label>    
                        <input type="text" class="form-control" name="merk" >
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Stok Produk</label>    
                        <input type="text" class="form-control" name="stok"  placeholder="isi Stok">
                        </div>
                </div>

                <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn btn-block">Submit</button>
                        </div>
                </div>
            </form>
        </div>


                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="produk">
                    
        <div class="col-xs-6 col-sm-12">
            <div class="col-sm-10 col-sm-offset-2">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Detail</th>
                                <th colspan="2" style="text-align: center; ">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data as $row) {
                            
                        
                        ?>
                            <tr>
                                <td><img src="<?php echo base_url()?>/assets/uploads/<?php echo $row['gambar']; ?>" alt="" width="200" heigth="50"></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td>Rp.<?php echo $row['harga']; ?></td>
                                <td><span class="badge" style="background:blue;"><?php echo $row['size']; ?></span></td>
                                <td><span class="badge" style="background:red;"><?php echo $row['stok']; ?></span></td>
                                <td><span class="badge" style="background:red;"><?php echo $row['kategori_id']; ?></span></td>
                                <td><p><a href="<?php echo base_url().'home/produk_Detail/'.$row['id']; ?>">Detail</a></p></td>
                                <td><p><a href="<?php echo base_url().'root/produk/hapus/'.$row['id']; ?>"><span class="badge" style="background:orange;">hapus</span></a> </p></td>
                                <td><p><a href="<?php echo base_url().'root/produk/edit/'.$row['id']; ?>"><span class="badge" style="background:orange;">Edit</span></a></p></td>
                                </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="celanapria">

                  <p>celana pria</p>

                  </div>



                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->



    </div>
</div>

</div>
