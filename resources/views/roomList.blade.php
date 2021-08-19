@extends('layout.mainlayout')
@section('aboveContent')
<div class="container-fluid game px-0">
  <div class="container p-3">
    <h2 class="h1-responsivefooter text-center my-4">Danh sách phòng</h2>
    <p class="w-100 text-center my-1">
      <a id="tao-phong" data-phong="{{ md5(time()) }}" data-url="{{ url('/') }}/phong/{{ md5(time()) }}" class="btn btn-success btn-lg"><i class="fad fa-plus-circle"></i> Tạo phòng mới</a>
    </p>
    <div class="table-responsive">
      <table id="danh-sach-phong" class="table table-bordered table-hover table-striped table-sm">
        <thead class="thead-light">
          <tr>
            <th class="text-center" scope="col">Mã phòng</th>
            <th class="text-center" scope="col">Trạng thái</th>
            <th class="text-center no-sort" scope="col" data-sort-method="none">Bàn cờ</th>
            <th class="text-center" scope="col">Lần cuối chơi</th>
          </tr>
        </thead>
        <tbody style="background-color: whitesmoke;">
  @for ($i = 0; $i < count($rooms); ++$i)
          <tr>
            <td class="text-center room-code"><a href="{{ url('/') }}/phong/{{ $rooms[$i]['code'] }}">{{ $rooms[$i]['code'] }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-key text-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $rooms[$i]['pass'] }}"></i></td>
            <td class="text-center">
            @if ($rooms[$i]['fen'] == 'rnbakabnr/9/1c5c1/p1p1p1p1p/9/9/P1P1P1P1P/1C5C1/9/RNBAKABNR r - - 0 1')
              <span class="badge badge-pill badge-danger">mới</span>
            @else
              <span class="badge badge-pill badge-dark">cũ</span>
            @endif
            </td>
            <td class="text-center" data-sort-method="none"><a target="_blank" class="btn btn-success" href="{{ url('/ban-co/') }}/{{ $rooms[$i]['fen'] }}">Xem</a></td>
            <td class="text-right" data-order="{{ strtotime($rooms[$i]['modified_at']) }}">{{ date('d/m/Y | g:i a', strtotime($rooms[$i]['modified_at']) + (420*60)) }}</td>
          </tr>
  @endfor
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('belowContent')
<script>
$(document).ready(function () {
  $('#danh-sach-phong').DataTable({
    'language': {
      'url': '{{ URL::to('/') }}/js/TableVietnam.json'
    },
    'order': [[ 3, 'desc' ]]
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
@include('layout.partials.rules')
@endsection