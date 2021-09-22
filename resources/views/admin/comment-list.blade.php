@extends('admin.layout.master')
@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
      <header class="row page-header page-header-compact page-header-light border-bottom mb-3">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-2">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                               <i class="fas fa-medal"  style="font-size: 18px;"></i> 
                            </div>
                            Leave A Comment
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              Total Comment 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#</th>
                      <th style="width: 5%;">Name</th>
                      <th style="width: 10%;">Blog Title</th>
                      <th style="width: 5%;">Email</th>
                      <th style="width: 5%;">Website</th>
                      <th style="width: 20%;">Message</th>
                      <th style="width: 5%;">Date</th>
                      <th style="width: 5%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $cnt=0; foreach($arr_data as $row): $cnt++; 
                    $id = $row->blog_id;
                    $obj_data = \DB::table('blog')->where('id',$id)->orderBy('id','Asc')->first();
                   
                    ?>
                    <tr>
                      <td style="width: 5%;"><?php echo $cnt; ?></td>
                      <td style="width: 5%;"><?php echo $row->name; ?></td>
                      <td style="width: 10%;"><?php echo $obj_data->blog_title; ?></td>
                      <td style="width: 5%;"><?php echo $row->email; ?></td>
                      <td style="width: 5%;"><?php echo $row->website; ?></td>
                      <td style="width: 20%;">{!!  substr(strip_tags($row->message), 0, 25) !!}...</td>
                      <td style="width: 5%;">{{date('d-m-Y', strtotime($row->created_at))}}</td>
                      <td class="text-center">
                        <a href="" class="btn btn-sm btn-danger">
                            <i class="far fa-trash-alt" data-toggle="tooltip" data-placement="left" title="Delete"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
@endsection