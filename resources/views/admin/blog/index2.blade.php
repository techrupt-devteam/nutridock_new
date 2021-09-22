@extends('admin.layout.master')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
          <header class="row page-header page-header-compact page-header-light border-bottom mb-3">
            <div class="container-fluid">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-2">
                        <div class="col-auto mb-2">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-wind"></i></div>
                                Blog - List
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        	
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              All Blog
              <div class="float-right">
                <div class="custom-file" style="max-width: 250px">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <a href="{{url('')}}/admin/create-blog" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                  <i class="fas fa-plus fa-sm text-white-50"></i> Create Blog
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Comment</th>
                      <th>Date</th>
                      <th style="width: 75px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php  $cnt=0; foreach($arr_data as $row): $cnt++; 
                       $originalDate=$row->created_at; $newDate=date("d-m-Y",strtotime($originalDate));
                     ?>
                    <tr>
                      <td style="vertical-align: middle;">{{$cnt}}</td>
                      <td class="text-center" width="10%">
                      	<img src="{{url('')}}/uploads/images/{{$row->image}}" width="40px" class="rounded-circle" />
                      </td>
                      <td width="20%">{{$row->blog_title}}</td>
                      <td width="25%">{!!  substr(strip_tags($row->blog_description), 0, 25) !!}...</td>
                      <td>61</td>
                      <td>{{$newDate}}</td>
                      <td  width="10%">
                      	<a href="{{url('/')}}/admin/blog/delete/{{ base64_encode($row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to remove this record ?');">
                      		<i class="far fa-trash-alt" data-toggle="tooltip" data-placement="left" title="Delete"></i>
                      	</a>
                      	<a href="{{url('/')}}/admin/edit-blog/{{ base64_encode($row->id) }}" class="btn btn-sm btn-info">
                      		<i class="far fa-edit" data-toggle="tooltip" data-placement="left" title="Edit"></i>
                      	</a>
                      </td>
                    </tr>
                    <!-- <tr>
                      <td>2</td>
                      <td class="text-center">
                      	<img src="img/cup-hot-coffee.jpg" width="40px" height="40px" class="rounded-circle" />
                      </td>
                      <td>Why We Are Top of The Heap Digital Agency In Town</td>
                      <td>Excepteur sint occaecat cupidatat non proident mollit any laboruys.</td>
                      <td>50</td>
                      <td>2011/04/25</td>
                      <td>
                      	<a href="" class="btn btn-sm btn-danger">
                      		<i class="far fa-trash-alt" data-toggle="tooltip" data-placement="left" title="Delete"></i>
                      	</a>
                      	<a href="" class="btn btn-sm btn-info">
                      		<i class="far fa-edit" data-toggle="tooltip" data-placement="left" title="Edit"></i>
                      	</a>
                      </td>
                    </tr> -->
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@endsection