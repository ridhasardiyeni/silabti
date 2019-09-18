<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Barang</title>
</head>
<body>
<center><h3>LAPORAN DATA BARANG</h3></center>
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
</body>
</html>