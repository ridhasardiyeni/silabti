@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('user.create') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah User</a>
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data User</h4>
                  
                  <div class="table-responsive">
                    <table id="table" class="table table-condensed">
                      <thead class="thead-light">
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Level
                          </th>
                          
                          <th>
                            Status
                          </th>
                          <th>
                            Action
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
                          @if($data->gambar)
                            <img src="{{url('images/user', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />

                          @endif


                            {{$data->name}}
                          </td>
                          <td>
                          <a href="{{route('user.show', $data->id)}}"> 
                          {{$data->username}}
                          </a>
                          </td>
                          <td>
                            {{$data->email}}
                          </td>
                          <td>
                            {{$data->level}}
                          </td>
                          
                          <td>
                            @if($data->aktif ==1)
                            <label class="badge badge-success">Aktif</label>
                          
                          @else
                            <label class="badge badge-danger">Belum Aktif</label>
                          @endif
                          </td>
                          <td>
                           <form action="{{route('user.destroy', $data)}}" method="post"> 
                          <a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('user.show', $data)}}"><i class="fa big-icon fas fa-eye"></i></a>
                          <a class="btn btn-sm btn-warning" href="{{route('user.edit', $data)}}"><i class="fa big-icon fas fa-edit"></i></a>
           
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa big-icon fas fa-trash"></i></button>
                        </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection