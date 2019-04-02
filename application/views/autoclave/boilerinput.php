<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Boiler<small>Input Data <?php echo $username; ?></small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addtool" action="<?php echo base_url() ?>addboilerinput1" method="post" role="form">
					<div class="box-body">
						<div class="row">
							<div class="col-lg-4 col-xs-12">
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">1. Boiler Pressure</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="boiler_steam_press" required="required" type="text" 
										placeholder="<?php echo number_format($boiler->boiler_steam_press,1,".","");?>">
										<span class="input-group-addon">barG</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>2. Feedwater Pump</h6>
									</div>
									<div class="col-md-6">
										<select class="form-control input-sm" name="feed_water_pump">
											<option value="1" selected="selected">Line 1</option>
											<option value="2">Line 2</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<h6>3. Water Flow</h6>
									</div>
									<div class="col-lg-7">
									<div class="form-group input-group has-success">
										<input class="form-control input-sm" name="water_flow" required="required" type="text"
										value="<?php echo number_format($boiler->water_flow, 0, ".","");?>" >
										<span class="input-group-addon">m^3</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>4. Steam Output</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="steam_out" required="required" type="text"
										placeholder="<?php echo number_format($boiler->steam_out, 1, ".","");?>" >
										<span class="input-group-addon">Ton</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">5. Feedwater Tank Level</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="feed_tank_lvl" required="required" type="text"
										placeholder="<?php echo number_format($boiler->feed_tank_lvl, 1, ".","");?>" >
										<span class="input-group-addon">%</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">6. ID Fan</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="id_fan" required="required" type="text"
										placeholder="<?php echo number_format($boiler->id_fan, 1, ".","");?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">7. FD Fan</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="fd_fan" required="required" type="text"
										placeholder="<?php echo number_format($boiler->fd_fan, 1, ".","");?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>8. Spider Fan</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="spider_fan" required="required" type="text" value="0"
										placeholder="<?php echo $boiler->spider_fan;?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>9. Secondary Dumper</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="secondary_dumper" required="required" type="text"
										placeholder="<?php echo number_format($boiler->secondary_dumper, 1, ".","");?>" >
										<span class="input-group-addon">%</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">10. Flue Gas Temp</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="flue_gas_temp" required="required" type="text"
										placeholder="<?php echo number_format($boiler->flue_gas_temp, 0, ".","");?>" >
										<span class="input-group-addon">&#8451;</span>
									</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<img src="<?php echo base_url() ?>assets/images/boiler.jpg" width="100%"/>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">11. Bed Temp 1</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="bed_temp1" required="required" type="text"
										placeholder="<?php echo number_format($boiler->bed_temp1, 0, ".","");?>" >
										<span class="input-group-addon">&#8451;</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">12. Bed Temp 2</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="bed_temp2" required="required" type="text"
										placeholder="<?php echo number_format($boiler->bed_temp2, 0, ".","");?>" >
										<span class="input-group-addon">&#8451;</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">13. Water Level Boiler</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="water_lvl_boiler" required="required" type="text"
										placeholder="<?php echo number_format($boiler->water_lvl_boiler, 0, ".","");?>" >
										<span class="input-group-addon">%</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">14. Screw Feeding 1</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="screw_feed_1" required="required" type="text"
										placeholder="<?php echo number_format($boiler->screw_feed_1, 1, ".","");?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">15. Screw Feeding 2</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="screw_feed_2" required="required" type="text"
										placeholder="<?php echo number_format($boiler->screw_feed_2, 1, ".","");?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">16. Deaerator</font></h6>
									</div>
									<div class="col-md-6">
									<div class="form-group input-group">
										<input class="form-control input-sm" name="deaerator" required="required" type="text"
										placeholder="<?php echo number_format($boiler->deaerator, 1, ".","");?>" >
										<span class="input-group-addon">mbar</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>17. Blowdown</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<select class="form-control input-sm" name="blowdown">
											<option value="1" selected="selected">Works</option>
											<option value="0">DEAD</option>
										</select>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6><font color="red">18. Re-circulating Fan</font></h6>
									</div>
									<div class="col-md-6">
										<div class="form-group input-group">
										<input class="form-control input-sm" name="recir_fan" required="required" type="text"
										placeholder="<?php echo number_format($boiler->recir_fan, 1, ".","");?>" >
										<span class="input-group-addon">Hz</span>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>19. ACS Line 1 (Front)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out1b" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out1b, 0, ".","");?>" >
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>20. ACS Line 2 (Front)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out2b" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out2b, 0, ".","");?>" >
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>21. ACS Line 1 (Back)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out1" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out1, 0, ".","");?>" >
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>22. ACS Line 2 (Back)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out2" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out2, 0, ".","");?>" >
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>23. ACS Line 3 (Back)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out3" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out3, 0, ".","");?>" >
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h6>24. ACS Line 4 (Back)</h6>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control input-sm" name="acs_out4" required="required" type="text"
										placeholder="<?php echo number_format($boiler->acs_out4, 0, ".","");?>" >
									</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
                </div>
            </div>
			<div class="col-md-12">
				<div class="box box-primary">
				<form role="form" id="addtool" action="<?php echo base_url() ?>addboilerinput3" method="post" role="form">
					<div class="box-header">
						<h4 class="box-title">Pengecekan Harian Demin Water Quality <small>isi setiap jam 8:00, 16:00 dan 00:00</small></h4>
					</div>
					<div class="box-body table-responsive">
						<label>Line:</label>
						<input type="number" class="form-control input-sm" name="line_run" required/>
						<label>Flow Rate:</label>
						<input type="number" class="form-control input-sm" name="flow_rate" required/>
						<table class="table table-hover table-striped table-bordered ">
							<tr>
								<th>Parameter</th>
								<th>Unit</th>
								<th>Surya Cipta</th>
								<th>Sand Filter</th>
								<th>Catridge</th>
								<th>Carbon aktif</th>
								<th>Cation Exch</th>
								<th>Anion Exch</th>
								<th>Blue Tank</th>
								<th>Boiler FW</th>
								<th>Boiler</th>
								<th>Blowdown</th>
							</tr>
							<tr>
								<th>Tot. Hardness</th>
								<th>ppm CaCO3</th>
								<td><input type="number" class="form-control input-sm" name="sc_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="sf_1" required/></td>
								<td></td>
								<td></td>
								<td><input type="number" class="form-control input-sm" name="ce_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="ae_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="bt_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="bf_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="bl_1" required/></td>
								<td><input type="number" class="form-control input-sm" name="bd_1" required/></td>
							</tr>
							<tr>
								<th>pH</th>
								<th></th>
								<td><input type="number" class="form-control input-sm" name="sc_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="sf_2" required/></td>
								<td></td>
								<td></td>
								<td><input type="number" class="form-control input-sm" name="ce_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="ae_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="bt_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="bf_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="bl_2" required/></td>
								<td><input type="number" class="form-control input-sm" name="bd_2" required/></td>
							</tr>
							<tr>
								<th>Conductivity</th>
								<th>uS/cm</th>
								<td><input type="number" class="form-control input-sm" name="sc_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="sf_3" required/></td>
								<td></td>
								<td></td>
								<td><input type="number" class="form-control input-sm" name="ce_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="ae_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="bt_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="bf_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="bl_3" required/></td>
								<td><input type="number" class="form-control input-sm" name="bd_3" required/></td>
							</tr>
							<tr>
								<th>Turbidity</th>
								<th>NTU</th>
								<td><input type="number" class="form-control input-sm" name="sc_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="sf_4" required/></td>
								<td></td>
								<td><input type="number" class="form-control input-sm" name="ca_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="ce_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="ae_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="bt_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="bf_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="bl_4" required/></td>
								<td><input type="number" class="form-control input-sm" name="bd_4" required/></td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
				</form>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">
					<form role="form" id="addtool" action="<?php echo base_url() ?>addboilerinput2" method="post" role="form">
					<div class="box-header">
						<h4 class="box-title">Input Every Day, Last Input Data : <?php echo $boiler2->timestamp; ?></h4>
					</div>
					<div class="box-body">
						
						<h4>Harap input data tiap jam 8.00 s/d 8.30</h4>
						<br>
						<div class="col-md-12">
							<label>Water Flow (Daily) Last data : <?php echo number_format($boiler2->water_0, 0, ".","");?></label>
							<div class="form-group input-group has-success">
									<input class="form-control input-sm" name="water_0" required="required" type="text"
									value="<?php echo number_format($boiler2->water_0, 0, ".","");?>" >
									<span class="input-group-addon">m^3</span>
							</div>
						</div>
						<div class="col-md-12">
							<label>Steam Flow (Daily) Last data : <?php echo number_format($boiler2->steam_0, 0, ".","");?></label>
							<div class="form-group input-group has-success">
									<input class="form-control input-sm" name="steam_0" required="required" type="text"
									value="<?php echo number_format($boiler2->steam_0, 0, ".","");?>" >
									<span class="input-group-addon">m^3</span>
							</div>
						</div>
						<div class="col-md-12">
							<label>kWh (Daily) Last data : <?php echo number_format($boiler2->kwh_0, 0, ".","");?></label>
							<div class="form-group input-group has-success">
									<input class="form-control input-sm" name="kwh_0" required="required" type="text"
									value="<?php echo number_format($boiler2->kwh_0, 0, ".","");?>" >
									<span class="input-group-addon">m^3</span>
							</div>
						</div>
						
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<input type="reset" class="btn btn-default" value="Reset" />
					</div>
                    </form>
				</div>
			</div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/boiler1.js" type="text/javascript"></script>