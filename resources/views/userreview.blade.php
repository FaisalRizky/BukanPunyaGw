<html>
	<head>
		<title>User Review</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link href="{{asset('css/Layout.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

		<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
		<link href="https://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
			@if(session()->has('superadmin'))
			<li><a href="{{ url('/superadminpage') }}">Home (select admin)</a></li>
			@else
						<li><a href="{{ url('/adminpage') }}">Home</a></li>
						@endif
						<li class="dropdown"><a class="dropdown-toggle" href="#"  data-toggle="dropdown">Dashboard</a>
							<ul class="dropdown-menu" style="background:#1a1a1a; width:auto; position:absolute; margin-left: 50%; padding-right:37%; padding-left:37%;">
								<div class="buathover">
								<li><a class style="color:white;" href="{{ url('dashboardsoc') }}">SoC</a></li>
								<li><a class style="color:white;" href="{{ url('dashboardcpu') }}">CPU</a></li>
								<li><a class style="color:white;" href="{{ url('dashboardgpu') }}">GPU</a></li>
							</div>
							</ul>
						</li>
						<li><a href="{{ url('/userreview') }}">User Review</a></li>
		</div>
					</ul>
				  </div>
				</div>
				<div class="badan">
				<div class="row">
					  <div class="col-md-12" style="background-color:black;">
		          <center><p><h1 style="color:white; font-family:Verdana;">List review</h1></p></center>


							<div class="thumbpage" style="color:white; font-family:robotodraft;">
<br>
    <center>
      <table id="table_id" style="color:white" class="display">
    <thead>
        <tr>

					<th class="column1"><center>ID Review</th>
					<th class="column2"><center>Nama Reviewer</th>
					<th class="column3"><center>ID Hardware</th>
					<th class="column4"><center>Tipe Hardware</th>
					<th class="column5"><center>Link Hardware</th>
					<th class="column6"><center>Rating</th>
					<th class="column6"><center>Tanggal Review</th>
					<th class="column9"><center>Update</th>
					<center>
        </tr>
    </thead>
    <tbody>
			@foreach($review as $review)
				<tr style="color:black; text-align:center;">
					<td class="column1">{{$review->id_review}}</td>
					<td class="column2">{{$review->nama_review}}</td>
					<td class="column3">{{$review->id_hw}}</td>
					<td class="column4">{{$review->tipe_review}}</td>
					<td class="column5"><div class="styling"><a href="{{url('/hardware/'.$review->tipe_review.'/'.$review->id_hw)}}">Link</a></div></td>
					<td class="column6">{{$review->rating}}</td>
					<td class="column7">{{$review->tanggal_review}} nm</td>
					<th class="column9"><p><button style="color:black;" data-id="{{ $review->id_review }}" class="hapus">Hapus</a></p></div></th>
				</tr>
@endforeach
    </tbody>

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
<div class="footer">
<div class="botnavContainer" style="width:auto;  margin:0; margin-left: 9%; display: flex">
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
				var id_review = me.attr('data-id')
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
                url: "deletereview/"+id_review,
                type: "DELETE",
                data: {'id': id_review, '_method': 'DELETE', '_token': csrf_token},
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
</body>
</html>
