@extends('admin.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Title" value="{{$pizza->name}}">
                </div>

                <div class="form-group">
                  <label for="subtitle">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Sub Title" value="{{$pizza->price}}">
                </div>

                <div class="form-group">
                  <label for="slug">category</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Slug" value="{{$pizza->category}}">
                </div>

              </div>

                  <div class="checkbox pull-left">
                      <p>Size</p>
                    <label>
{{--                        <p>{{dump($pizza->sizes[0])}}</p>--}}
{{--                        <p>{{dump($pizza->sizes[1])}}</p>--}}
{{--                        <p>{{dump($pizza->sizes)}}</p>--}}
                        @if($pizza->sizes==26)
                         <input type="checkbox" name="sizes"  > 26
                        @else
                          <input type="checkbox" name="sizes" checked value="26" > 26
                        @endif
                    </label>
                      <label>
                        @if($pizza->sizes[1]==30)
                          <input type="checkbox" name="sizes"  > 30
                        @else
                          <input type="checkbox" name="sizes" checked value="30" > 26
                        @endif
                      </label>
                      <label>
                        @if($pizza->sizes[2]===40)
                            <input type="checkbox" name="sizes"  > 40
                        @else
                            <input type="checkbox" name="sizes" checked value="40" > 40
                        @endif
                      </label>



                  </div>
                </div>
                <br>
                <div class="form-group" style="margin-top:18px;">
                  <label>Select Tags</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    <option value="">
                          selected</option>
                  </select>
                </div>
                <div class="form-group" style="margin-top:18px;">
                  <label>Select Category</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                    <option value=""
                        selected
                  </select>
                </div>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Post Body Here
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                <textarea name="body" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
              </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='' class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
