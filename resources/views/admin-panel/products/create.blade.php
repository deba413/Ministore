@extends('admin-panel.layouts.app')

@section('content')

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product</h3>
              </div>


            </div>
            <div class="clearf description"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product<small> Create</small></h2>
                    <div class="clearf description"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="{{route('products.store')}}"  method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="price" name="price" class="form-control col-md-7 col-xs-12" name="price" required>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount_price">Discount Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="discount_price" name="discount_price" class="form-control col-md-7 col-xs-12" name="discount_price" required>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="description" name="description" class="form-control col-md-7 col-xs-12" name="description"  required cols="30" rows="10">
                          </textarea>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $cat )
                            <option value="{{$cat->id}}">{{$cat->name}}</option>                             
                            @endforeach
                          </select>
                        </div> 
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_category">Sub Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="sub_category_id" required>
                            <option value="">Select Sub Category</option>
                            @foreach ($sub_categories as $sub_cat )
                            <option value="{{$sub_cat->id}}" data-category_id="{{$sub_cat->category_id}}" style="display:none;" class="sub_cat_option">{{$sub_cat->name}}</option>                             
                            @endforeach
                          </select>
                        </div> 
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12" name="image" required>
                        </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        $('select[name="sub_category_id"]').val('');
        $('.sub_cat_option').hide();
        $('.sub_cat_option[data-category_id="'+category_id+'"]').show();
    });
</script>

@endpush