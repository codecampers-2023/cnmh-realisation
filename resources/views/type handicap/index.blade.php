@extends("master")

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Type handicap</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12 d-flex justify-content-between p-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('typeHandicap.create')}}" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" name="serach" id="serach" placeholder="Search&hellip;">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-body p-0 table-data">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">Id</th>
                                <th style="width: 400px">Type handicap</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include("type handicap.paginate_table")

                        </tbody>
                    </table>

                </div>
            </div>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <div class="under-table">
                <div class="pagination">
                     <!--start-pagination--->
                    {{ $data->links() }}
                </div>
                <div class="">
                    <a href="{{route('typeHandicap.export')}}" class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-download"></i> Exporter
                    </a>
                    <a id="myModal" data-toggle="modal" data-target="#exampleModalLong"
                        class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-file-import"></i> Importer
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Import -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Importer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('typeHandicap.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end Model --}}

<!-- /.control-sidebar -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
function fetch_data(page,query)
{
$.ajax({
 url:"/pagination/fetch_data?page="+page+"&query="+query,
 success:function(data)
 {
  // console.log(data);

  let table = "";
  let pagination = "";
  let html = data;

  let parts = html.split("<!--start-pagination--->");
  table = parts[0];
    pagination = parts[1];


    console.log(pagination)
    // console.log(pagination)
    //   console.log(data)
    //   console.log(data)
    $('tbody').html('');
    $('tbody').html(table);
    $('.pagination').html(" ");
    $('.pagination').html(pagination);
}
})
}

$(document).on('keyup', '#serach', function(){
var query = $('#serach').val();
var page = $('#hidden_page').val();
fetch_data(page,query);

});


$(document).on('click', '.pagination a', function(event){
event.preventDefault();
var page = $(this).attr('href').split('page=')[1];
$('#hidden_page').val(page);
var query = $('#serach').val();
console.log(page);
console.log(query);
fetch_data(page,query);

});
});


    // model
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>
@endsection
