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
    <a href="{{ route('prodi.create') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Prodi</a>
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
                  <h4 class="card-title pull-left">Data Prodi</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-condensed" id="table">
                      <thead class="thead-light">
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Program Studi
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i=0; ?>
                      @foreach($datas as $data)
                        <tr>
                          <td>
                             <b>{{++$i}}.</b>
                          </td>
                          <td class="py-1">
                        
                          <a href="{{route('prodi.show',$data)}}"> 
                            {{$data->nama_prodi}}
                          </a>
                          </td>
                          <td>
                          @if(Auth::user()->level=='admin')
                          <form action="{{route('prodi.destroy', $data)}}" method="post"> 
                          <a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('prodi.show', $data)}}"><i class="fa big-icon fas fa-eye"></i></a>
                          <a class="btn btn-sm btn-warning" href="{{route('prodi.edit', $data)}}"><i class="fa big-icon fas fa-edit"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa big-icon fas fa-trash"></i></button>
                        </form>
                        @else
                          -
                          @endif
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
          
@endsection