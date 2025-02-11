<?php $__env->startSection('title', 'Create Admin'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
	<h6 class="fw-semibold mb-0">Create Admin</h6>
	<ul class="d-flex align-items-center gap-2">
		<li class="fw-medium">
			<a href="<?php echo e(url('dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
				Dashboard /
			</a>
		</li>
		<li class="fw-medium">
			<a href="<?php echo e(url('dashboard/admin/show')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
				Admins /
			</a>
		</li>
		<li class="fw-medium">Create</li>
	</ul>
</div>

<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-info bg-info-100 text-info-600 border-info-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 mb-24 bg-gradient-primary" role="alert">
    <div class="d-flex align-items-start justify-content-between text-lg">
        <div class="d-flex align-items-start gap-2">
            <iconify-icon icon="mynaui:check-octagon" class="icon text-xl mt-4 flex-shrink-0"></iconify-icon>
            <div>
                Success
                <p class="fw-medium text-info-600 text-sm mt-8"><?php echo e($_SESSION['success']); ?></p>
            </div>
        </div>
        <button class="remove-button text-info-600 text-xxl line-height-1">
            <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
        </button>
    </div>
</div>

<div class="card radius-12 overflow-hidden h-100 d-flex align-items-center flex-nowrap flex-row mb-24 bg-gradient-success" style="padding-left: 10px; padding-right: 10px;font-size: 15px;">
    <?php if(empty($last_admin->admin_photo)): ?>
    	<div class="last-avatar" style="background-image: url(<?= assets('assets/images/avatar/default-photo.png') ?>)"></div>
    <?php else: ?>
    	<div class="last-avatar" style="background-image: url(<?= assets('assets/images/users').'/'.$last_admin->admin_id.'/'.$last_admin->admin_photo ?>)"></div>
    <?php endif; ?>
    <div class="card-body p-16 flex-grow-1">
    	<h5 class="card-title text-lg text-primary-light mb-6" style="font-size: 16px !important;">The latest admin has been successfully added to the database!</h5>
        <p class="card-text text-neutral-600 mb-16">
        	<?php echo e(ucwords($last_admin->admin_first_name.' '.$last_admin->admin_last_name)); ?>

        	<br>
        	<?php echo e($last_admin->admin_email); ?>

        </p>
        <a href="<?php echo e(url('dashboard/admin/preview').'/'.$last_admin->public_code); ?>" class="btn text-primary-600 hover-text-primary p-0 d-inline-flex align-items-center gap-2">
            Show Details <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
        </a>
    </div>
</div>
<?php endif; ?>

<?php
	unset($_SESSION['success']);
?>

<form action="<?php echo e(url('dashboard/admin/create/request')); ?>" method="POST" style="width: 100%;" class="form-request" data-target="<?= url('dashboard/admin/create') ?>" enctype="multipart/form-data">
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
		    <div class="card">
		        <div class="card-header">
		            <h5 class="card-title mb-0">Personal Info.</h5>
		        </div>
		        <div class="card-body">
		            <div class="row gy-3">
		                <div class="col-12">
		                    <label class="form-label">First Name <span>*</span></label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:person"></iconify-icon>
		                        </span>
		                        <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Last Name <span>*</span></label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:person"></iconify-icon>
		                        </span>
		                        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Email <span>*</span></label>
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
		                        <input type="text" name="phone" class="form-control" placeholder="0000000000">
		                    </div>
		                </div>
		                <div class="col-12">
		                    <label class="form-label">Password <span>*</span></label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
		                        </span>
		                        <input type="password" name="password" class="form-control" placeholder="*******">
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Confirm Password <span>*</span></label>
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
		                    <label class="form-label">Gender <span>*</span></label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:heart"></iconify-icon>
		                        </span>
		                        <select class="form-control" name="gender">
		                        	<option selected value="1">default: male</option>
		                        	<?php $__currentLoopData = $all_genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        	<option value="<?php echo e($gender->gender_id); ?>"><?php echo e(strtolower($gender->gender_name)); ?></option>
		                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                        </select>
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Account Privacy <span>*</span></label>
		                    <div class="icon-field">
		                        <span class="icon">
		                            <iconify-icon icon="f7:eyeglasses"></iconify-icon>
		                        </span>
		                        <select class="form-control" name="account_privacy">
		                        	<option selected value="1">default: public</option>
		                        	<?php $__currentLoopData = $all_privacy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privacy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        	<option value="<?php echo e($privacy->account_privacy_id); ?>"><?php echo e(strtolower($privacy->account_privacy_name)); ?></option>
		                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                        </select>
		                    </div>
		                </div>		                
		                <div class="col-12">
		                    <label class="form-label">Birth Date <span>*</span></label>
		                    <div class="row">
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="birth_day">
				                        	<option selected>Day</option>
				                        	<?php for($d = 1; $d <= 31; $d++): ?>
				                        	<option value="<?php echo e($d); ?>"><?php echo e($d); ?></option>
				                        	<?php endfor; ?>
				                        </select>
				                    </div>	
		                    	</div>		                    	
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="birth_month">
				                        	<option selected>Month</option>
				                        	<?php for($m = 1; $m <= 12; $m++): ?>
				                        	<option value="<?php echo e($m); ?>"><?php echo e($m); ?></option>
				                        	<?php endfor; ?>
				                        </select>
				                    </div>	
		                    	</div>		                    	
		                    	<div class="col-4">
				                    <div class="icon-field">
				                        <select class="form-control" name="birth_year">
				                        	<option selected>Year</option>
				                        	<?php for($y = date('Y')-100; $y <= date('Y'); $y++): ?>
				                        	<option value="<?php echo e($y); ?>"><?php echo e($y); ?></option>
				                        	<?php endfor; ?>
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
		                	<button type="submit" class="btn btn-sm btn-primary" name="submit">Create Account</button>
		                	<button type="reset" class="btn btn-sm btn-light" id="btn-reset" 
		                			data-photo="<?= assets('assets/images/avatar/default-photo.png') ?>" 
		                			data-cover="<?= assets('assets/images/avatar/default-cover.jpg') ?>">Reset</button>
		                	<script>
		                		let resetBtn = document.getElementById('btn-reset')
		                		resetBtn.addEventListener('click', function () {
		                			document.getElementsByClassName('profile-photo')[0].style.backgroundImage = 'url('+resetBtn.getAttribute("data-photo")+')'
		                			document.getElementsByClassName('profile-cover')[0].style.backgroundImage = 'url('+resetBtn.getAttribute("data-cover")+')'
		                		})
		                	</script>
		                </div>
		            </div>
		        </div> 	
		    </div>
		</div>
	</div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>