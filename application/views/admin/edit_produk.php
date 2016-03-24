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

        <div class="col-xs-6 col-sm-4">
            <form action="<?php echo base_url().'edit'; ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                    <legend>Form Posting Produk</legend>
                    
                    </div>                    
                </div>

                <div class="form-group">      
                        <div class="col-sm-10 col-sm-offset-2">              
                        <label >Kategori </label>    
                        <select name="kategori" >
                        <?php foreach($kategori as $row){  ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                        <? } ?>
                        </select>
                        </div>
                </div>
                <?php foreach ($data as $row) { ?>
                <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <?php 
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo validation_errors();
                        echo "</div>";
                         ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </div>
                </div>

                  <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <label >Gambar Produk</label>    <br>
                        <img id="uploadPreview" style="width: 200px; height: 150px;" src="<?php echo base_url()?>/assets/uploads/<?php echo $row['gambar']; ?>" /><br>
                        <input type="hidden" name="userfile" value="<?php echo $row['gambar']; ?>">
                        </div>
                </div>
                <!-- <div class="form-group">           
                        <div class="col-sm-10 col-sm-offset-2">         
                        <input type="file" class="form-control" name="userfile" size="20" onchange="PreviewImage();"  id="uploadImage">
                        </div>
                </div> -->

               <!--  <div class="form-group">             
                        <div class="col-sm-10 col-sm-offset-2">       
                        <label >Kode Produk</label>    
                        <input type="text" class="form-control" name="produk_id" >
                        </div>
                </div> -->

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Nama Produk</label>    
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Bahan Produk</label>    
                        <input type="text" class="form-control" name="bahan" value="<?php echo $row['bahan']; ?>">
                        </div>
                </div>

            <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Ukuran Produk</label>    
                        <input type="text" class="form-control" name="size" value="<?php echo $row['size']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Warna Produk</label>    
                        <input type="text" class="form-control" name="warna" value="<?php echo $row['warna']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Harga Produk</label>    
                        <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>">
                        </div>
                </div>

                 <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Dekripsi Produk</label>    
                        <textarea name="deskripsi" placeholder="masukan deskripsi tentang produk" ><?php echo $row['deskripsi']; ?></textarea>
                        </div>
                </div>
        
                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Merk Produk</label>    
                        <input type="text" class="form-control" name="merk" value="<?php echo $row['merk']; ?>">
                        </div>
                </div>

                <div class="form-group">                    
                        <div class="col-sm-10 col-sm-offset-2">
                        <label >Stok Produk</label>    
                        <input type="text" class="form-control" name="stok"  placeholder="isi Stok" value="<?php echo $row['stok']; ?>">
                        </div>
                </div>

                <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn btn-block">Submit</button>
                        </div>
                </div>
            </form>
        </div>
<?php } ?>


        <div class="col-xs-6 col-sm-4">
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
                                <td><p><a href="<?php echo base_url().'home/produk_Detail/'.$row['id']; ?>">Detail</a></p></td>
                                <td><p><a href="<?php echo base_url().'root/produk/hapus/'.$row['id']; ?>"><span class="badge" style="background:orange;">hapus</span></a> </p></td>
                                <td><p><a href="<?php echo base_url().'home/edit/'.$row['id']; ?>"><span class="badge" style="background:orange;">Edit</span></a></p></td>
                                </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>


