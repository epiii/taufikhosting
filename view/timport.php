<?php 
	if ($_GET['hlm']){
		$acak2=dekrip($_GET['hlm']);
		if ($acak2=='timport'){
?>	
<div class="row-fluid">
    <div class="span7">
        <div class="box paint color_8">
	        <div class="title">
                <h4><span>Import Data (Excel)</span> </h4>
	        </div>
            
			<span id="loadarea"></span>
            <div class="content">
			<form class="form-horizontal cmxform" enctype="multipart/form-data" id="suserFR" method="post" action="proses/ptransaksi.php?aksi=import" autocomplete="off">
				
				<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="search-input">File Excel (.xls)</label>
                  <div class="controls span9">
                    <div class="input-append row-fluid">
                      <input type="file" name="fileTB" class="spa1n6 fileinput" id="search-input">
                      > </div>
                  </div>
                </div>
				
				<div class="form-actions row-fluid">
                    <div class="span7 offset3">
                	    <button type="submit" class="btn btn-primary">import</button>
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
    $(document).ready(function(){	
		$('#gantiTB').click(function(){
			$('#pass1').toggle(1000);
			$('#pass2').toggle(1000);
			$('#passwordTB').val('');
			$('#password2TB').val('');
		});
		
		//edit
		/*$('#suserFR').submit(function() {
			var urlx  = $(this).attr('action');
				urlx2 = "?aksi=import";
			
			$("#loadarea").html('<img src="img/w8.gif">').fadeIn(1000);
			
			var file = $('#fileTB').val();
			if(file==''){
				alert('harus isi file');
				return false;
			}else{
				$.ajax({
					type: 'POST',
					dataType:'json',
					url: urlx + urlx2,
					data: $(this).serialize(),
					cache: false,
					processData: false,// Don't process the files
					contentType: false,//Set content type to false as jq 'll tell the server its a query string request
					success: function(data) {
						if(data.status=='sukses'){
							//loadData();
							alert('berhasil update data');
						}else{
							alert('gagal import data');
						}
					},error: function(jqXHR, textStatus, errorThrown){
						console.log('ERRORS: ' + textStatus);
					}
				});
				return false;
			}
		});
		//end of simpan(tambah & edit)
	});*/
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