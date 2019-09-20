<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Barang</title>
</head>
<body>
<center><b>Laporan Data Barang<br>
Sistem Informasi Peminjaman Alat Lbor<br>
Jurusan Teknologi Informasi (TI)<br>
Politeknik Negeri Padang (PNP)</b>
</center>
<br><br>
 <table border="1">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Nama Barang
                          </th>
                          <th>
                            Merk
                          </th>
                          <th>
                            Stok Barang
                          </th>
                          <th>
                            Satuan
                          </th>
                          <th>
                            Kondisi Barang
                          </th>
                          <th>
                            Keterangan
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i=1 ?>
                      @foreach($datas as $data)
                        <tr>
                          <td>
                            {{$i++}}.
                          </td>
                          <td class="py-1">
                            {{$data->nama_barang}}
                          </td>
                          <td>
                          
                            {{$data->merk}}
                          
                          </td>

                          <td>
                            {{$data->stok_barang}}
                          </td>
                          <td>
                            {{$data->satuan}}
                          </td>
                          <td>
                            {{$data->kondisi_barang}}
                          </td>
                          <td>
                            {{$data->keterangan}}
                          </td>
                          
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <br><br>
                   
                    <table align="right">
                     <tr align="center">
                       <td>
                         Diketahui,
                       </td>
                     </tr>
                     <tr align="center">
                       <td>
                         Kepala Labor Jurusan TI
                       </td>
                     </tr>
                     <tr>
                       <td>
                         
                       </td>
                     </tr>
                     <tr>
                       <td>
                         
                       </td>
                     </tr>
                     <tr>
                       <td>
                         
                       </td>
                     </tr>
                      <tr>
                        <td>
                         Rita Afyenni, S.Kom.,M.Kom
                        </td>
                      </tr>
                      <tr>
                        <td>
                          NIP.19700718 200801 2 010
                        </td>
                      </tr>
                      </table>
                 
</body>
</html>