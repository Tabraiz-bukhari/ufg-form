@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Add User</h4>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a>Home</a></li>
                  <li class="breadcrumb-item active">User Management</li>
                </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="offset-md-2 col-md-8">

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">User Form</h3>
                </div>

                <form method="POST" action="{{ route('users.store') }}">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label>Name <span style="color:red">*</span></label>
                      <input type="text" name="name" value="" class="form-control @error('name') is-invalid @enderror" placeholder="Name" >

                      @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Email <span style="color:red">*</span></label>
                      <input type="email" name="email" value="" class="form-control @error('email') is-invalid @enderror" placeholder="emample@mail.com" >

                      @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Password <span style="color:red">*</span></label>
                      <input type="password" name="password" value="" class="form-control @error('password')  @enderror" placeholder="Password" >

                      @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>User Type <span style="color:red">*</span></label>
                      <select name="role" class="form-control select2 changeRole  @error('role') is-invalid @enderror" >
                        <option value="">Select User Type</option>
                        @foreach ($roles as $role)
                          <option value="{{ $role->id }}" data-role="{{ $role->name }}"> {{ $role->name }}</option>
                        @endforeach
                      </select>

                      @error('role')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div> 

                    <div class="form-group">
                      <label>Default Currency</label>
                      <select name="currency" class="form-control select2 currencyImage @error('currency') is-invalid @enderror">
                        <option selected value="">Select Currency</option>
                        @foreach ($currencies as $currency)
                          <option value="{{ $currency->id }}" {{ old('currency') == $currency->id ? 'selected' : null }} data-image="data:image/png;base64, {{ $currency->flag }}"> &nbsp; {{ $currency->code }} - {{ $currency->name }} </option>
                        @endforeach
                      </select>

                      @error('currency')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Default Brands</label>
                      <select name="brand" class="form-control select2 getBrandtoHoliday @error('brand') is-invalid @enderror">
                        <option value="">Select Brands</option>
                        @foreach ($brands as $brand)
                          <option value="{{ $brand->id }}" {{ (old('brand') == $brand->id ? 'selected' : null) }} >{{ $brand->name }}</option>
                        @endforeach
                      </select>

                      @error('brand')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Holiday Type</label>
                      <select name="holiday_type" class="form-control select2 appendHolidayType">
                        <option value="">Select Holiday Type</option>
                        @if(isset($user->getBrand->getHolidayTypes))
                          @foreach ($user->getBrand->getHolidayTypes as $holiday_type)
                            <option value="{{ $holiday_type->id }}" {{ $user->holidaytype_id == $holiday_type->id ? 'selected' : (old('brand') == $holiday_type->id ? 'selected' : null) }} >{{ $holiday_type->name }}</option>
                          @endforeach
                        @endif      
                      </select>

                      @error('holiday_type')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                      @enderror
                    </div>

                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>

                </form>
              </div>


            </div>

          </div>
        </div>
      </section>

    </div>
@endsection
