@extends('admin.layout.master')
@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
      
    <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              All Category List
              <div class="float-right">
                 <a href="javascript:;" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" data-toggle="modal" data-target="#myModal">
                  <i class="fas fa-plus fa-sm text-white-50"></i> Create Category </a>
              </div><br><br>
               @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($arr_data as $row)
                    <tr>
                      <td width="5%">{{ $no++ }}</td>
                      <td width="25%">{{$row->name}}</td>
                      <td width="10%">
                        <a href="javascript:;" class="btn btn-sm btn-info" data-target="#EditModal<?php echo $row->id; ?>" data-toggle="modal">
                            <i class="fa fa-pen" data-toggle="tooltip" data-placement="left" title="Edit"></i></a>
                        <a href="{{url('')}}/admin/category/category_delete/{{ base64_encode($row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you  to delete this record?');">
                            <i class="far fa-trash-alt" data-toggle="tooltip" data-placement="left" title="Delete"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
              
              
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Category - Add</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form  action="{{url('/')}}/admin/category/category_store" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="label-control">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                            </div>
                        </div>
                    </div>
                    </div>
                   
                    <div class="col-lg-12" style="text-align: center;">
                        <button class="btn btn-primary btn-md mr-2" name="sumbit" type="sumbit" value="submit"> Submit </button>
                         <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Close Modal -->
              
              
              
              <!-- Edit modal -->
              <?php foreach($editarr_data as $row1): ?>
              <div class="modal fade" id="EditModal<?php echo $row1->id; ?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Category - Edit</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form  action="{{url('/')}}/admin/category/category_update/<?php echo base64_encode($row1->id); ?>" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="label-control">Title </label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row1->name; ?>" placeholder="Title">
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-12" style="text-align: center;">
                        <button class="btn btn-primary btn-md mr-2" name="sumbit" type="sumbit" value="submit"> Submit </button>
                         <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Edit modal close -->
              <?php endforeach; ?>
              
              
              
            </div>
          </div>
</div>
@endsection