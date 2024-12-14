@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Withdrow Methods</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Method</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.withdraw-method.update', $method->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $method->name }}">
                        </div>
                        <div class="form-group">
                            <label>Minimum Amount</label>
                            <input type="text" class="form-control" name="minimum_amount" value="{{ $method->minimum_amount }}">
                        </div>
                        <div class="form-group">
                            <label>Maximum Amount</label>
                            <input type="text" class="form-control" name="maximum_amount" value="{{ $method->maximum_amount }}">
                        </div>
                        <div class="form-group">
                            <label>Withdraw charge (%)</label>
                            <input type="text" class="form-control" name="withdraw_charge" value="{{ $method->withdraw_charge }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="summernote">{!! $method->description !!}</textarea>
                        </div>

                        <button type="submmit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
