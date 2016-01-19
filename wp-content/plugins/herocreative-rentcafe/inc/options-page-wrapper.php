<div class="wrap">

<h2>Official RentCafe Integration Plugin</h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span>Enter Property Details</span>
						</h2>

						<div class="inside">
							<div id="icon-options-general" class="icon32"></div>
									
									<form name="herocreative_rentcafe_form" method="post" action="">							

									<input type="hidden" name="herocreative_form_submitted" value="Y">

									<table class="form-table">
										
										<tbody>
										<tr>
											<td class="row-title">
												<label for="herocreative_companycode"><h3>Company Code</h3></label>
											</td>
											<td class="row-title">
												<input name="herocreative_companycode" id="herocreative_companycode" type="text" value="" class="regular-text" />
											</td>
										</tr>
										<tr>
											<td class="row-title">
												<label for="herocreative_propertycode"><h3>PropertyCode</h3></label>
											</td>
											<td class="row-title">
												<input name="herocreative_propertycode" id="herocreative_propertycode" type="text" value="" class="regular-text" />
											</td>
										</tr>
											
									</table>
									<input class="button-primary" type="submit" name="herocreative_rentcafe_submit" value="Submit" />
									</form>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
					<!-- <div class="container"> -->
					<div class="postbox">

						<?php 
							foreach ($herocreative_data as $data) : ?>

						<h2 class="hndle"><span>Property Detail Results</span>
						</h2>

						<div class="inside">
							<div id="icon-options-general" class="icon32"></div>
								
								<h5><?php echo $data->FloorplanName; ?></h5>
								<h6>(<?php echo $data->AvailableUnitsCount; ?> Available)</h6>
								<div class="row">
								<div class="col s12">
									<ul class="tabs">
										<li class="tab col s3"><a class="active" href="#studio">Studio</a></li>
								        <li class="tab col s3"><a href="#twobedroom">Two Bedroom</a></li>
								        <li class="tab col s3"><a href="#twobedtwobath">Two Bed Two Bath</a></li>
								        <li class="tab col s3"><a href="#threebedroom">Three Bedroom</a></li>
									</ul>
								</div>
									<?php if ($data->Beds == "1"): ?>	
										<table class="bordered col s6 pull-s6" id="studio">
									        <tbody>
									           <tr>
									              <th data-field="id">Beds</th>
									              <td> <?php echo $data->Beds; ?> </td>			
									            </tr>
									          <tr>
									              <th data-field="id">Bath</th>
									              <td> <?php echo $data->Baths; ?> </td>
									          </tr>
									          <tr>
									              <th data-field="id">SQ.FT.</th>
									              <td> <?php echo $data->MinimumSQFT; ?> - <?php echo $data->MaximumSQFT; ?> </td>
									          </tr>
									          <tr>
									              <th data-field="id">Rent</th>
									              <td> $ <?php echo $data->MinimumRent; ?> - $<?php echo $data->MaximumRent; ?> </td>
									          </tr>

									        </tbody>
									        <div class="col s6 push-s6">
									        	<img  width="85%" src="<?php echo $data->FloorplanImageURL; ?>"> 
									      	</div>
									     </table>
							     </div>
									<?php endif;?>

									<?php if ($data->Beds == "2" && $data->Baths =="1.0"): ?>	
										<table class="bordered col s6 pull-s6" id="twobedroom">
									        <tbody>
									           <tr>
									              <th data-field="id">Beds</th>
									              <td> <?php echo $data->Beds; ?> </td>			
									            </tr>
									          <tr>
									              <th data-field="id">Bath</th>
									              <td> <?php echo $data->Baths; ?> </td>
									          </tr>
									          <tr>
									              <th data-field="id">SQ.FT.</th>
									              <td> <?php echo $data->MinimumSQFT; ?> - <?php echo $data->MaximumSQFT; ?> </td>
									          </tr>
									          <tr>
									              <th data-field="id">Rent</th>
									              <td> $ <?php echo $data->MinimumRent; ?> - $<?php echo $data->MaximumRent; ?> </td>
									          </tr>

									        </tbody>
									        <div class="col s6 push-s6">
									        	<img  width="85%" src="<?php echo $data->FloorplanImageURL; ?>"> 
									      	</div>
									     </table>
							     </div>

									<?php endif;?>
					
									
						</div>
						<!-- .inside -->
							<?php endforeach; 
						?>
					</div>
					<!-- .postbox -->
					<!-- </div>  -->
					<!-- .container -->

					<?php if( $display_json == true ): ?>

					<div class="postbox">

						<h3><span>JSON Feed</span></h3>
						<div class="inside">
						<p>
							<?php echo $herocreative_data->{'PropertyId'} ?>
						</p>
						<p>
							<?php echo $herocreative_data->{'AvailableUnitsCount'} ?>
						</p>
						
							<pre><code>
							<?php var_dump($herocreative_data); ?>
							</pre></code>
						</div>
					</div>				
					<?php endif; ?>
					

				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
