<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
     <div class="page-content">
        <div class="page-header position-relative">
            <h1>
             Account Summary
             
            </h1>
        </div><!--/.page-header-->
        
        
         <div class="row-fluid">
            
            <div class="table-header">
              Results for "All contacts"
            </div>
            <table id="managers" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Date Create</th>
                        <th>Activated</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Date Create</th>
                        <th>Activated</th>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
     </div>
   
</div>

	<script type="text/javascript">
			$(function() {
				
				
			
				$("#managers").dataTable({
					"bProcessing": true,
					
            		"sAjaxSource" : "<?php echo base_url() ?>account/contacts"
            		
            	});



			});



       

</script>	