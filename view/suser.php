<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='suser'){
?>	
<div class="row-fluid">
    <div class="span7">
        <div class="box paint color_4">
	        <div class="title">
                <h4><span>Data Pengguna</span> </h4>
	        </div>
            
			<span id="loadarea"></span>
            <div class="content">
              <form class="form-horizontal cmxform" id="suserFR" method="get" action="proses/pmaster.php" autocomplete="off">
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3">
                    	Nama<span class="help-block">tidak boleh kosong</span> </label>
                    <div class="controls span7">
                    	<input placeholder="nama lengkap" id="namaTB" name="namaTB" type="text" Required class="span12"/>
                    </div>
				</div>
                
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="hint-field">
                    	Username<span class="help-block">Required min 3 characters</span></label>
                    <div class="controls span7">
                    	<input id="usernameTB" placeholder="username" name="usernameTB" minlength="3" type="text" class="row-fluid"/>
                    </div>
				</div>
                
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3">
                    	Alamat<span class="help-block">alamat lengkap</span> </label>
                    <div class="controls span7">
                    	<textarea id="alamatTB" name="alamatTB" placeholder="alamat lenngkap" ></textarea>
                    </div>
				</div>
                
                <div class="form-row control-group row-fluid">
                    <label class="control-label span3">
                    	Level<span class="help-block">Level</span> </label>
                    <div class="controls span7">
                    	<input type="text" id="id_levelTB" name="id_levelTB" readonly>
					</div>
				</div>
                
                <div class="form-row control-group row-fluid">
                	<div class="controls span7">
                    	<label ><input type="checkbox" id="gantiTB"/>Ganti Password</label>
                    </div>
                </div>
                
                <div class="control-group row-fluid" id="pass1" style="display:none">
                    <label class="control-label span3">
                    	Password</label>
                    <div class="controls span7 ">
                    	<div class="input-prepend row-fluid"> 
                        	<span class="add-on">
                            	<i class="icon-lock"></i>
							</span>
                    		<input class="row-fluid" type="password" id="passwordTB" name="passwordTB" 
                            placeholder="min 4 characters">
                    	</div>
                    </div>
				</div>
                
                <div class="control-group row-fluid" id="pass2" style="display:none">
                    <label class="control-label span3">Konfirmasi Password</label>
                    <div class="controls span7">
                	    <div class="input-prepend row-fluid"> 
                        	<span class="add-on">
                            	<i class="icon-lock"></i>
                            </span>
                    		<input class="row-fluid" type="password" id="password2TB" 
                            placeholder="confirm password" name="password2TB">
                    	</div><span id="pass_info"></span>
                    </div>
				</div>
                
                <div class="form-actions row-fluid">
                    <div class="span7 offset3">
                	    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
				</div>
			</form>
		</div>
	</div>
</div>
        <!-- End .span8 -->
       
        <!-- End .span4 --> 
      </div>
      <!-- End .row-fluid --> 
<script type="text/javascript">
    //function loadData(par){
    function loadData(){
		var proses = 'proses/';
		$('#loadarea').html('<img src="img/w8.gif">').fadeIn();
		$.ajax({
			url	: proses+"pmaster.php",
			type: "GET",
			data: 'aksi=tampil&menu=suser',
			dataType:'json',
			success:function(data){
				if(data.status=='sukses'){
					$("#loadarea").html('<img src="img/w8.gif">').fadeOut(1000);
					$("#namaTB").val(data.nama);
					$("#usernameTB").val(data.username);
					$("#alamatTB").val(data.alamat);
					$("#id_levelTB").val(data.id_level);
				}else{
					alert('sorry, error with database connection x_x');
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log('ERRORS: ' + textStatus);
			}
		});
	}

	$(document).ready(function(){	
		//var idx = $('#id_userTB').val();
		//loadData(idx)
		loadData();
		$('#gantiTB').click(function(){
			$('#pass1').toggle(1000);
			$('#pass2').toggle(1000);
			$('#passwordTB').val('');
			$('#password2TB').val('');
			
			/*if( $(this).prop({checked:true}) ){
				alert('cek');
			}else if($(this).prop({checked:false})){
				alert('no');
			}*/
		});
		//edit
		$('#suserFR').submit(function() {
			//var idformx = $("#idform").val();
			var urlx  = $(this).attr('action');
				urlx2 = "?aksi=ubah&menu=suser";
			
			$("#loadarea").html('<img src="img/w8.gif">').fadeIn(1000);
			
			var pas1 = $('#passwordTB').val();
			var pas2 = $('#password2TB').val();
			if( (pas1!=pas2)&&($('#gantiTB').prop({checked:true})) ){
				alert('password  tidak sesuai ');
				return false;
			}else{
				$.ajax({
					type: 'POST',
					dataType:'json',
					url: urlx + urlx2,
					data: $(this).serialize(),
					success: function(data) {
						if(data.status=='error_pass'){
							$("#pass_info").html('konfirmasi password tidak sama');
							$("#loadarea").html('<img src="img/w8.gif">').fadeOut(1000);
						}else if(data.status=='sukses'){
							loadData();
							alert('berhasil update data');
							//$("#loadarea").html('<span style="color:yellow;text-weight:bold">berhasil merubah data</span>');
						}else{
							alert('gagal mengubah data');
						}
					}
				});
				return false;
			}
		});
		//end of simpan(tambah & edit)

		
	});
</script>
<?php
		}else{
			echo 'halo 1';
			//header("location:index.php");
		}
	}else{
		echo 'halo 2 ';
		//header("location:index.php");
	}
?>