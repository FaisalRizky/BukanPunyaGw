<html>
	<head>
		<title>Review Komentar</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}" />

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link href="{{asset('css/Layout.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

		<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
		<link href="https://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.6/dist/sweetalert2.all.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	</head>
	<body>
		<div class="wrap">
				<div class="logo">
					<a href="\">
						<img src="{!! asset('img/desain berigame1.png') !!}" width="18%"/></a>
						<div class="sbox" style="float:right; padding-top:2.5%; padding-right:20%;">
		@foreach($profil as $aktif)
			<p class style="font-family:Verdana; color:white; text-decoration:none;">Logged in as {{$aktif->penulis}}<a class style="text-decoration:none; color:#3498db;" href="{{url('/logout')}}">&nbsp;(Logout)</a></p>
		@endforeach

			</div>

		</div>
		@if(session()->has('Sessionactive'))
		<div class="alert" style="position: fixed;
			margin-left: 40%;
			z-index: 1000;
			padding: 20px auto;
			background-color: green;
			color: white;">
		 <span class="closebtn" style="
		 margin-left: 15px;
		 color: white;
		 font-weight: bold;
		 float: right;
		 font-size: 22px;
		 line-height: 20px;
		 cursor: pointer;
		 transition: 0.3s;
		 color: black;
		" onclick="this.parentElement.style.display='none';">&times;</span>
		 <strong>Session Aktif</strong>
				 {{ session()->get('Sessionactive') }}
		</div>
		</center>
		@endif

				<div class="marg">
				<div class="header">
				<div class="menu">

					<ul>
		<div class="linknavigasi">
						<li><a href="{{ url('/adminpage') }}">Home</a></li>

						<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
						<li><a href="{{ url('/komentarulasadmin') }}">Comment Review</a></li>
		</div>
					</ul>
				  </div>
				</div>
				<div class="badan">
				<div class="row">
					  <div class="col-md-12" style="background-color:black;">
		          <center><p><h1 style="color:white; font-family:Verdana;">Comment Review</h1></p></center>


							<div class="thumbpage">
<br>
    <center>
      <table id="table_id">
    <thead>
        <tr style="color:white;">
            <th><center>ID</center></th>
            <th><center>Nama komentar</center></th>
            <th><center>Isi Komentar</center></th>
						<th><center>Judul Post</center></th>
						<th><center>Status</center></th>
            <th><center>Approval</center></th>
        </tr>
    </thead>
    @if(!empty($daftar))
    <tbody>
        @foreach($daftar as $list)
        <tr class="gradeX">
            <td><center>{{$list->id}}</center></td>
            <td><center>{{$list->namakomen}}</center></td>
            <td><center>{{$list->isikomen}}</center></td>
						<td><center>{{$list->judul}}</center></td>
						@if($list->status==1)
						<td><center>Disetujui</center></td>
						@elseif($list->status==0)
						<td><center>Tidak disetujui</center></td>
						@endif
						@if($list->status==1)
						<td><center><form  method ="POST" action="/komentarulasadmin/disapprove" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" value="{{$list->id}}" name="idkomen"/>
							<input style="color:black;"  type="submit" value="Disapprove">
						</form>
						@elseif($list->status==0)
						<td><center><form  method ="POST" action="/komentarulasadmin/approve" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" value="{{$list->id}}" name="idkomen"/>
							<input style="color:black;" type="submit" value="Approve">
						</form>
						@endif
							<form  method ="POST" action="/komentarulasadmin/delete" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" value="{{$list->id}}" name="idkomen"/>
								<input style="color:black;"  type="submit" value="Delete">
								</center></td>
							</form>
        </tr>
        @endforeach
    </tbody>
    @else
    <tbody>
        <tr class="gradeX">
            <td><center>&nbsp;</center></td>
            <td><center>&nbsp;</center></td>
            <td><center>&nbsp;</center></td>
            <td><center>&nbsp;</center></td>
        </tr>
    </tbody>
    @endif
  </center>
</table>
<br>
<br>
@if(session()->has('Success'))
    <div class="alert alert-success">
        {{ session()->get('Success') }}
    </div>
		@elseif(session()->has('Successio'))
		<div class="alert alert-success">
			{{session()->get('Successio')}}
		</div>
		@elseif(session()->has('Successino'))
		<div class="alert alert-success">
			{{session()->get('Successino')}}
		</div>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
$('.hapus').click(function(){
	event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
				var id_cpu = me.attr('data-id')
    Swal.fire({
        title: 'Apa anda yakin?',
        text: 'Data tidak akan bisa dikembalikan!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "deletecpu/"+id_cpu,
                type: "DELETE",
                data: {'id': id_cpu, '_method': 'DELETE', '_token': csrf_token},
                success: function (response) {

                  location.reload();
                    Swal.fire({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data telah dihapus!'
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});
</script>
<div class="footer">
<div class="botnavContainer" style="width:auto; margin:0; margin-left: 9%; display: flex">
<div class="logofoot">
<a href="/">	<img src="{!! asset('img/desain berigame1.png') !!}" width="315" height="92"/></a>

<div class="cl"></div>
</div>
<div style="height:20px"></div>
<div class="BGCopyrightInfo" style="color:white; font-size:18px;padding-top:4%;">
<span style="padding-left:0.3em">Copyright @ 2018 BeriGame, All right reserved ·</span>
</div>
<div style="clear:both"></div>
</div>
</div>
</body>
</html>
