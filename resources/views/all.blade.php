<div class="container-fluid mt-2">
  <div class="row justify-content-center">
    <div class="col-11">
      <div class="card">
        <div class="card-header">
          Users list ({{ count($users) }})
        </div>
        <div class="card-body">
          @if(count($users))
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">DOB</th>
                <th scope="col">Gender</th>
                <th scope="col">Anual Income</th>
                <th scope="col">Ocupation</th>
                <th scope="col">Family type</th>
                <th scope="col">Manglik</th>
                <th scope="col">Expected income</th>
                <th scope="col">Partner occupation</th>
                <th scope="col">Partner family type</th>
                <th scope="col">Partner manglik</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    @php
                        // dd($user->gender);
                    @endphp
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name ?? "" }}</td> 
                    <td>{{ $user->email ?? "" }}</td> 
                     <td>{{$user->dob }}</td> 
                    <td>{{ ucfirst($user->gender) }}</td> 
                    <td>{{ $user->anual_income }}</td> 
                    <td>{{ ucwords(str_replace('_',' ',$user->occupation))  }}</td> 
                    <td>{{ ucwords(str_replace('_',' ',$user->family_type)) }}</td> 
                    <td>{{ $user->manglik ? "yes" : 'No' }}</td> 
                    <td>{{ $user->partner_anual_income_range_from. '-' .$user->partner_anual_income_range_to }}</td>  
                    <td>{{ ucwords(str_replace('_',' ',$user->partner_occupation )) }}</td> 
                    
                    <td>{{ ucwords(str_replace('_',' ',$user->partner_family_type)) }}</td>  
                    <td>{{ $user->is_partner_manglik ? "Yes" : "No" }}</td>  
                  </tr>      
                @endforeach
             
            </tbody>
          </table>
          @else
          <h1 class="text-center">Empty Records</h1>
          @endif
        </div>
      </div>
    </div>
  </div>
 
</div>


