<?php include 'include/header.php'; ?>

<?php  
	include '../db/db.php';

	$query      = "SELECT * FROM message";
    $stmt       = $db->prepare($query);
    $result     = $stmt->execute();
?>

	
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->

		<div id="page-wrapper" style="height: -webkit-fill-available">
			<div class="main-content" style="padding: 20px;">
				<div class="main-page">
					<div class="widget-shadow">
						<div class="panel-default">
							<div class="panel-heading">Inbox</div>
							<div class="inbox-page">
								<?php $i=0; while($row = $stmt->fetch()): ?>
								<div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="mail mail-name"> 
										<p style="color: green;"><?php echo $row['name']; ?></p> 
									</div>
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
									<div class="mail"><p><?php echo $row['subject']; ?></p></div>
									</a>
									<div class="mail-right"><p><?php echo date("d M", strtotime($row['date'])); ?></p></div>
									<div class="clearfix"> </div>
									<div id="collapse<?php echo $i++;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="mail-body">
											<p><?php echo $row['message']; ?></p>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</div>							
			</div>
		</div>
		<!-- main content end-->


		<div class="footer">
		   <p>&copy; 2018 All Rights Reserved | Develop by <a href="https://neonlab.com/" target="_blank" style="color: #F95959">Neo Lab</a></p>
		   											<div class="clearfix"> </div>

		</div>
							
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>