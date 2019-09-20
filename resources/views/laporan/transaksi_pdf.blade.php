<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Transaksi</title>
</head>
<body>
<center><b>Laporan Data Transaksi<br>
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
                            Kode Transaksi
                          </th>
                          <th>
                            Peminjam
                          </th>
                          <th>
                            NIM / NIP
                          </th>
                          <th>
                            Barang
                          </th>
                          <th>
                            Jumlah Pinjam
                          </th>
                          <th>
                            Tanggal Pinjam
                          </th>
                          <th>
                            Status
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
                            {{$data->trans->kode_transaksi}}
                          </td>
                          <td> 
                            {{$data->trans->user->name}}
                          </td>
                          <td>
                            {{$data->trans->user->username}}
                          </td>
                          
                          <td>
                            {{$data->barang->nama_barang}}
                          </td>
                          <td>
                            {{$data->jumlah}}
                          </td>
                          <td>
                            {{$data->trans->tgl_pinjam}}
                          </td>
                          <td>
                            @if($data->status == 'pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                            @else
                            <label class="badge badge-success">Kembali</label>
                            @endif
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