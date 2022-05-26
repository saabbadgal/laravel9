<div class="container">
    <form onsubmit="event.preventDefault(0)" id="createForm">
       @csrf
       <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="card-header">Users Filter </div>
                <div class="card-body">
                   <div class="row">
                      <div class="col-lg-4">
                         <div class="form-group"> 
                            <label for="ifscCode">Dob From</label>
                            <input class="form-control text-md-right date"  type="text" name="dateFrom"  value="{{ date("Y-m-d",strtotime('-15000 days')) }}" autocomplete="off" placeholder="Choose Date">
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="form-group"> 
                            <label for="ifscCode">DOB To</label>
                            <input class="form-control text-md-right date"  type="text" name="dateTo"  value="{{ date("Y-m-d") }}" autocomplete="off" placeholder="Choose Date">
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <label for="anual_income" class="col-lg-4 col-form-label text-md-end">{{ __('Anual Income') }}</label>
                         <div class="col-md-6"> 
                            <p> 
                               <input name="anual_income" type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider-range"></div>
                            @error('anual_income')
                            <span class="text-danger">
                            {{ $message }}
                            </span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                         <div class="col-md-6">
                            <div class="row mt-2">
                               <div class="col">
                                  <div class="form-check">
                                     <input class="form-check-input" type="radio" name="gender" value="both" checked>
                                     <label class="form-check-label" for="gender2">
                                     All
                                     </label>
                                  </div>
                               </div>
                               <div class="col">
                                  <div class="form-check">
                                     <input class="form-check-input" type="radio" name="gender" value="male" >
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
                      <div class="col-lg-4">
                         <label for="family_type" class="col-lg-4 col-form-label text-md-end">{{ __('Family type') }}</label>
                         <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example" name="family_type">
                               <option value="" selected >Select Family Type</option>
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
                      <div class="col-lg-4">
                         <label for="is_manglik" class="col-lg-4 col-form-label text-md-end">{{ __('Manglik') }}</label>
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
                      <div class="col-lg-4 mt-4">
                         <button type="button" class="btn btn-primary" onclick="getAdminAll()">
                         {{ __('Get Results') }}
                         </button>
                      </div>
                   </div>
                   <div class="row mb-0">
                      <div class="col-md-6 offset-md-4">
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </form>
 </div>
 <div id="all"></div>