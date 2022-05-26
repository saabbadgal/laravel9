<h2 class="text-center alert alert-warning">
    Please update your profile
 </h2>
 <form method="POST" action="{{ route('updateProfile') }}">
    @csrf
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-6">
             <div class="card">
                <div class="card-header">{{ __('Update profile') }}</div>
                <div class="card-body">
                   <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>
                      <div class="col-md-6">
                         <input id="dob" type="text" class="form-control date @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}"  autocomplete="dob" autofocus>
                         @error('dob')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                      <div class="col-md-6">
                         <div class="row mt-2">
                            <div class="col-4">
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="male" checked>
                                  <label class="form-check-label" for="gender1">
                                  Male
                                  </label>
                               </div>
                            </div>
                            <div class="col">
                               <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="female">
                                  <label class="form-check-label" for="gender2">
                                  Female
                                  </label>
                               </div>
                            </div>
                         </div>
                         @error('gender')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="anual_income" class="col-md-4 col-form-label text-md-end">{{ __('Anual Income') }}</label>
                      <div class="col-md-6">
                         <input id="anual_income" type="number" class="form-control @error('anual_income') is-invalid @enderror" name="anual_income" value="{{ old('anual_income') }}"  autocomplete="anual_income" autofocus >
                         @error('anual_income')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="occupation">
                            <option value="" selected>Select Occupation</option>
                            <option value="private_job" @if (old('occupation') == 'private_job') selected="selected" @endif>Private job</option>
                            <option value="government_job" @if (old('occupation') == 'government_job') selected="selected" @endif>Government Job</option>
                            <option value="business" @if (old('occupation') == 'business') selected="selected" @endif>Business</option>
                         </select>
                         @error('occupation')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="family_type" class="col-md-4 col-form-label text-md-end">{{ __('Family type') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="family_type">
                            <option value="" selected>Select Family Type</option>
                            <option value="joint_family" @if (old('family_type') == 'joint_family') selected="selected" @endif>Joint family</option>
                            <option value="nuclear_family" @if (old('family_type') == 'nuclear_family') selected="selected" @endif>Nuclear family</option>
                         </select>
                         @error('family_type')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="manglik" class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="is_manglik">
                            <option value="" selected>Select option</option>
                            <option value="0" @if (old('is_manglik') == '0') selected="selected" @endif>No</option>
                            <option value="1" @if (old('is_manglik') == '1') selected="selected" @endif>Yes</option>
                         </select>
                         @error('is_manglik')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="card">
                <div class="card-header">{{ __('Partner preference') }}</div>
                <div class="card-body">
                   <div class="row mb-3">
                      <label for="partner_anual_income" class="col-md-4 col-form-label text-md-end">{{ __('Anual Income') }}</label>
                      <div class="col-md-6">
                         <p> 
                            <input name="partner_anual_income" type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                         </p>
                         <div id="slider-range"></div>
                         @error('partner_anual_income')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="partner_occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="partner_occupation">
                            <option value="" selected>Select Occupation</option>
                            <option value="private_job" @if (old('partner_occupation') == 'private_job') selected="selected" @endif>Private job</option>
                            <option value="government_job" @if (old('partner_occupation') == 'government_job') selected="selected" @endif>Government Job</option>
                            <option value="business" @if (old('partner_occupation') == 'business') selected="selected" @endif>Business</option>
                         </select>
                         @error('partner_occupation')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="partner_family_type" class="col-md-4 col-form-label text-md-end">{{ __('Family type') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="partner_family_type">
                            <option value="" selected>Select Family Type</option>
                            <option value="joint_family" @if (old('partner_family_type') == 'joint_family') selected="selected" @endif>Joint family</option>
                            <option value="nuclear_family" @if (old('partner_family_type') == 'nuclear_family') selected="selected" @endif>Nuclear family</option>
                         </select>
                         @error('partner_family_type')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-3">
                      <label for="is_partner_manglik" class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>
                      <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name="is_partner_manglik">
                            <option value=" " selected>Select option</option>
                            <option value="0" @if (old('is_partner_manglik') == '0') selected="selected" @endif>No</option>
                            <option value="1" @if (old('is_partner_manglik') == '1') selected="selected" @endif>Yes</option>
                         </select>
                         @error('is_partner_manglik')
                         <span class="text-danger">
                         {{ $message }}
                         </span>
                         @enderror
                      </div>
                   </div>
                   <div class="row mb-0">
                      <div class="col-md-6 offset-md-4">
                         <button type="submit" class="btn btn-primary">
                         {{ __('Update Profile') }}
                         </button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </form>