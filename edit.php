<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel tbl_form berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tbl_form WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $addres = $_POST['addres'];
            $nomorhandphone = $_POST['nomorhandphone'];
            $tanggal = $_POST['tanggal'];
            $waktu = $_POST['waktu'];
            $rasa = $_POST['rasa'];
            $gula = $_POST['gula'];

			$sql = mysqli_query($koneksi, "UPDATE tbl_form SET nama='$nama', email='$email' , addres='$addres', nomorhandphone='$nomorhandphone', tanggal='$tanggal', waktu='$waktu',rasa='$rasa' ,gula='$gula' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil mengedit data."); document.location="halaman.php?page=tampil";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="halaman.php?page=edit&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>

			<div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            
             <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="email" class="form-control" required>
                </div>
            </div>
            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Addres</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="addres" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Number Phone</label>
                <div class="col-md-6 col-sm-6">
                    <input type="number" name="nomorhandphone" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">T</label>
                <div class="col-md-6 col-sm-6">
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Time</label>
                <div class="col-md-6 col-sm-6">
                    <input type="time" name="waktu" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Cake</label>
                <div class="col-md-6 col-sm-6">
                    <select name="rasa" class="form-control">
                        <option value="Black Forrest">Black Forrest</option>
                        <option value="Yellow Butter Cake">Yellow Butter Cake</option>
                        <option value="Pound Cake">Pound Cake</option>
                        <option value="Red Velvet Cake">Red Velvet Cake</option>
                        <option value="Gold Opera">Gold Opera</option>
                        <option value="Chocolate Mousee"> Chocolate Mousee</option>
                        <option value="Vanilla Fruits">Vanilla Fruits</option>
                        <option value="Tiramisu">Tiramisu</option>
                        <option value="Chocolate De Ville">Chocolate De Ville</option>
                    </select>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Sugar</label>
                <div class="col-md-6 col-sm-6">
                    <select name="gula" class="form-control" required>
                        <option value="Sedikit">Sedikit</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Banyak">Banyak</option>
                    </select>
                </div>
            </div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="halaman.php?page=tampil" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
