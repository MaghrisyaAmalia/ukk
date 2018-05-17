<!--main content start-->
<section id="main-content">
	
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>SURAT MASUK</h4>
					<h3><?php echo $this->db->count_all('surat_masuk');?></h3>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>SURAT KELUAR</h4>
						<h3><?php echo $this->db->count_all('surat_keluar');?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
		
	
</section>
						
		
		
		
						
					</section>
