@extends('layout.master')
@section('title', 'Create Admin')

@section('content')

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
	<h6 class="fw-semibold mb-0">Create Admin</h6>
	<ul class="d-flex align-items-center gap-2">
		<li class="fw-medium">
			<a href="{{ url('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
				Dashboard /
			</a>
		</li>
		<li class="fw-medium">
			<a href="{{ url('dashboard/admin/show') }}" class="d-flex align-items-center gap-1 hover-text-primary">
				Admins /
			</a>
		</li>
		<li class="fw-medium">Create</li>
	</ul>
</div>

<form action="" method="POST" style="width: 100%;" enctype="multipart/form-data">
	<div class="row gy-4">
		<div class="col-md-6">
		    <div class="card mb-3">
		        <div class="card-header">
		            <h5 class="card-title mb-0">Photo.</h5>
		        </div>
		        <div class="card-body">
		        	<div class="row gy-3">
		        		<div class="col-12">
		        			<input name="photo" type="file" style="height: 0;visibility: hidden;opacity: 0;position: absolute;top:0;">
		        			<input name="cover" type="file" style="height: 0;visibility: hidden;opacity: 0;position: absolute;top:0;">

		        			<div class="profile-container">
			        			<div class="profile-cover">
			        				<button class="profile-btn-cover" type="button">
					                    <div class="icon-field">
					                        <iconify-icon icon="solar:camera-bold-duotone" style="float:left;font-size:22px;margin-top:3px;"></iconify-icon>
					                        <span>Choose Cover</span>
					                    </div>
			        				</button>
			        			</div>
			        			<div class="profile-photo">
			        				<button class="profile-btn-photo" type="button">
			        					<iconify-icon icon="solar:camera-bold-duotone"></iconify-icon>
			        				</button>
			        			</div>
		        			</div>
		        			<script>
		        				let btn_photo = document.getElementsByClassName('profile-btn-photo')[0]
		        				let btn_cover = document.getElementsByClassName('profile-btn-cover')[0]
		        				let int_photo = document.getElementsByName('photo')[0]
		        				let int_cover = document.getElementsByName('cover')[0]

		        				btn_photo.addEventListener('click', () => {
		        					int_photo.click()
		        				})		        				
		        				btn_cover.addEventListener('click', () => {
		        					int_cover.click()
		        				})

		        				int_photo.addEventListener('change', () => {
		        					const file_photo = int_photo.files[0]
							        const reader = new FileReader();
							        reader.onload = function(event) {
							          document.getElementsByClassName('profile-photo')[0].style.backgroundImage = 'url('+event.target.result+')'
							        }
							        reader.readAsDataURL(file_photo);
		        				})		        				
		        				int_cover.addEventListener('change', () => {
		        					const file_cover = int_cover.files[0]
							        const reader = new FileReader();
							        reader.onload = function(event) {
							          document.getElementsByClassName('profile-cover')[0].style.backgroundImage = 'url('+event.target.result+')'
							        }
							        reader.readAsDataURL(file_cover);
		        				})
		        			</script>
		        		</div>
		        	</div>
		        </div>
			</div>
		    <div class="card mb-3">
		        <div class="card-header">
		            <h5 class="card-title mb-0">Personal Info.</h5>
		        </div>
		        <div class="card-body">
		            <div class="row gy-3">
		                <div class="col-12">
		                    <label class="form-label">First Name</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:person"></iconify-icon>
		                        </span>
		                        <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Last Name</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:person"></iconify-icon>
		                        </span>
		                        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Email</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="mage:email"></iconify-icon>
		                        </span>
		                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Phone</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
		                        </span>
		                        <input type="text" name="phone" class="form-control" placeholder="+1 (555) 000-0000">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Password</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
		                        </span>
		                        <input type="password" name="password" class="form-control" placeholder="*******">
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Confirm Password</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
		                        </span>
		                        <input type="password" name="confirm-password" class="form-control" placeholder="*******">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="col-md-6">
		    <div class="card mb-3">
		        <div class="card-header">
		            <h5 class="card-title mb-0">Other Info.</h5>
		        </div>
		        <div class="card-body">
		            <div class="row gy-3">
		                <div class="col-12">
		                    <label class="form-label">Gender</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:heart"></iconify-icon>
		                        </span>
		                        <select class="form-control" name="gender">
		                        	<option selected value="1">default: male</option>
		                        	@foreach($all_genders as $gender)
		                        	<option value="{{ $gender->gender_id }}">{{ strtolower($gender->gender_name) }}</option>
		                        	@endforeach
		                        </select>
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Account Privacy</label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:eyeglasses"></iconify-icon>
		                        </span>
		                        <select class="form-control" name="privacy">
		                        	<option selected value="1">default: public</option>
		                        	@foreach($all_privacy as $privacy)
		                        	<option value="{{ $privacy->account_privacy_id }}">{{ strtolower($privacy->account_privacy_name) }}</option>
		                        	@endforeach
		                        </select>
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Birth Date</label>
		                    <div class="row">
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="day">
				                        	<option selected value="{{ date('d') }}">Day</option>
				                        	@for($d = 1; $d <= 31; $d++)
				                        	<option value="{{ $d }}">{{ $d }}</option>
				                        	@endfor
				                        </select>
				                    </div>	
		                    	</div>		                    	
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="month">
				                        	<option selected value="{{ date('m') }}">Month</option>
				                        	@for($m = 1; $m <= 12; $m++)
				                        	<option value="{{ $m }}">{{ $m }}</option>
				                        	@endfor
				                        </select>
				                    </div>	
		                    	</div>		                    	
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="year">
				                        	<option selected value="{{ date('Y') }}">Year</option>
				                        	@for($y = date('Y')-100; $y <= date('Y'); $y++)
				                        	<option value="{{ $y }}">{{ $y }}</option>
				                        	@endfor
				                        </select>
				                    </div>	
		                    	</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="card mb-3">
		        <div class="card-body">
		            <div class="row gy-3">
		                <div class="col-12">
		                	<button type="submit" class="btn btn-primary">Create Account</button>
		                	<button type="reset" class="btn btn-light">Reset</button>
		                </div>
		            </div>
		        </div> 	
		    </div>
		</div>
	</div>
</form>

@endsection