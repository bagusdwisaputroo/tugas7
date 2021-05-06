<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel Transaksi (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>no faktur</th>
               <th>Kepada</th>
               <th>Tanggal</th>
               <th>Qnty</th>
               <th>Discount</th>
               <th>Total</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT  * FROM transaksi';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['no_faktur'] ?></td>
               <td><?php echo $row['kepada'] ?></td>
               <td><?php echo $row['tanggal'] ?></td>
               <td><?php echo $row['qnty'] ?></td>
               <td><?php echo $row['discount'] ?></td>
               <td><?php echo $row['total'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Barang (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>ID Barang</th>
               <th>Nama Barang</th>
               <th>Harga</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM barang';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Tabel Kendaraan (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>No Polisi</th>
               <th>Merk</th>
              
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM kendaraan';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
             
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Tabel Faktur (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>No Faktur</th>
               <th>No Polisi</th>
               <th>ID Barang</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM faktur';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
               <td><?php echo $row[2] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (mampilkan semua data pelanggan dari tabel pelanggan yang melakukan service)</h4>
      <table>
         <thead>
            <tr>
                
               <th>Kepada </th>
               <th>Tanggal</th>
               <th>No Polisi</th>
               <th>Merk</th>
               <th>Nama Barang</th>
               <th>Total </th>
            </tr>
         </thead>
         <?php
            $sql = 'select transaksi.kepada,tanggal, faktur.no_polisi,kendaraan.merk, barang.nama_barang, transaksi.total from kendaraan join faktur on kendaraan.no_polisi=faktur.no_polisi join transaksi on faktur.no_faktur=transaksi.no_faktur join barang on faktur.id_barang=barang.id_barang';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['kepada'] ?></td>
               <td><?php echo $row['tanggal'] ?></td>
               <td><?php echo $row['no_polisi'] ?></td>
               <td><?php echo $row['merk'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['total'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (mampilkan semua data kendaraan dari tabel barang dari transaksi)</h4>
      <table>
         <thead>
            <tr>
            <th>Kepada </th>
               <th>Tanggal</th>
               <th>No Polisi</th>
               <th>Merk</th>
               <th>Nama Barang</th>
               <th>Total </th>
            </tr>
         </thead>
         <?php
            $sql = 'select transaksi.kepada,tanggal, faktur.no_polisi,kendaraan.merk, barang.nama_barang, transaksi.total from kendaraan left join faktur on kendaraan.no_polisi=faktur.no_polisi left join transaksi on faktur.no_faktur=transaksi.no_faktur LEFT join barang on faktur.id_barang=barang.id_barang';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
            <td><?php echo $row['kepada'] ?></td>
               <td><?php echo $row['tanggal'] ?></td>
               <td><?php echo $row['no_polisi'] ?></td>
               <td><?php echo $row['merk'] ?></td>
               <td><?php echo $row['nama_barang'] ?></td>
               <td><?php echo $row['total'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>