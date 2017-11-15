<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('headerAdmin', $this->data);
?>
<div class="page-header">
  <h1>Pengaturan Akun</h1>
</div>
<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
    <div class="form-group">
        <?php if($this->session->flashdata('message')) : ?>
            <div class="col-sm-8 col-md-offset-2">
                <div class="form-group">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
  	<div class="form-group">
    	<label class="col-sm-2 control-label">Nama Lengkap :</label>
    	<div class="col-sm-8">
      		<input type="text" name="name" class="form-control" value="<?php echo $user->fullname ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-sm-2 control-label">E-Mail :</label>
    	<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" value="<?php echo $user->email ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-sm-2 control-label">Username :</label>
    	<div class="col-sm-8">
      		<input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('username', '<small class="text-red">', '</small>'); ?></p>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-sm-2 control-label">Password Baru :</label>
    	<div class="col-sm-8">
      		<input type="password" name="new_pass" class="form-control" value="<?php echo set_value('new_pass') ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('new_pass', '<small class="text-red">', '</small>'); ?></p>
            <p class="help-block"><small>Tinggalkan langkah ini bila tidak ingin menggati password</small></p>
    	</div>
  	</div>
  	<div class="form-group">
    	<label class="col-sm-2 control-label">Password Lama :</label>
    	<div class="col-sm-8">
      		<input type="password" name="old_pass" class="form-control" value="<?php echo set_value('old_pass') ?>" placeholder="">
            <p class="help-block"><?php  echo form_error('old_pass', '<small class="text-red">', '</small>'); ?></p>
    	</div>
  	</div>
    <div class="form-group" style="margin-bottom: 50px;">
        <div class="col-sm-6 col-md-offset-3">
            <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
    </div>
</form>
<?php
$this->load->view('footerAdmin', $this->data);

/* End of file account.php */
/* Location: ./application/views/account.php */