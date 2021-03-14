@extends('/layouts/master',['title'=>'Add Product'])
@section('content')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Admin</h2>
    
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="{{Route('product')}}">
                        <span>Product</span>
                    </a>
                   </li>
                <li><span>Tambah Product</span></li>
                
            </ol>
    
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
    
                    <h4 class="card-title">Add Form</h4>
                </header>
                <div class="card-body">
                    <form class="form-horizontal form-bordered form-bordered container" enctype="multipart/form-data" action="{{Route('store-category')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">Nama</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">harga</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">harga</label>
                                <textarea name="descrition" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">Rate</label>
                                <input type="text" name="rate" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">Stock</label>
                                <input type="text" name="stock" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">Berat</label>
                                <input type="text" name="weight" class="form-control">
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Multi-Value Select</label>
                                <div class="col-lg-6">
                                    <select multiple data-plugin-selectTwo class="form-control populate">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="tags-input" class="control-label">Rate</label>
                                <input type="file" name="image_name" class="form-control">
                            </div>
                        </div>
                        <button class="float-right btn btn-sm btn-success" type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div></div>
</section>

@endsection

@section('footer')
    <!-- Specific Page Vendor -->
		<script src="/assets/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="/assets/vendor/select2/js/select2.js"></script>
		<script src="/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
        <script src="/assets/vendor/select2/js/select2.js"></script>
		<script src="/assets/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
        		<!-- Examples -->
		<script src="/assets/js/examples/examples.advanced.form.js"></script>

@endsection