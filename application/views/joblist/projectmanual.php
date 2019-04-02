<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-book"></i> Project Job - User Guide
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<h4><b>Function/Menu</b></h4>
				<h5><b>Costum Job</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectjob"><span>Costum Job</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Search box,
						<br>
						Filter data based on job title and job description.
					</li>
					<li class="treeview">
						<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New</button> button,
						<br>
						Add new job, it will ask you to fill Job Title, Job Description and sometimes it will ask Job classification based on logged user's role.
					</li>
					<li class="treeview">
						Table,
						<br>
						Will only show job data that added by logged user. 
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</button> to change 'Job Title' or 'Job Description', approved job and submitted job will return to basic tag once user click it.
						Use <button class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Set</button> to add/edit tools usage, spare parts usage, duration, and linked document of selected job.
						Use <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Del</button> to remove selected job.
						Use <button class="btn btn-sm btn-success">Ask Approval</button> to ask approval from user with approval tag based on job's class.
					</li>
				</ul>
				</p>
				<h5><b>All Job</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectalljob"><span>All Job</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Search box,
						<br>
						Filter data based on job title and job description.
					</li>
					<li class="treeview">
						<button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New</button> button,
						<br>
						Add new job, it will ask you to fill Job Title, Job Description and sometimes it will ask Job classification based on logged user's role.
					</li>
					<li class="treeview">
						Table,
						<br>
						Show all approved job data from all user. There are additional job data if logged user has Approval tag/role.
						Use <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Approve</button> to update job's tag to <span class="label label-success">Approved</span>, this button visible for user with Approval role only.
						Use <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reject</button> to return job data back to creator/submitter for revision, this button visible for user with Approval role only.
					</li>
				</ul>
				</p>
				<h5><b>Plan Calendar</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectplan"><span>Plan Calendar</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Calendar Widget,
						<br>
						Show user's plan by date.
					</li>
					<li class="treeview">
						Approval Status box,
						<br>
						Show user's schedule status from submit till approved
					</li>
					<li class="treeview">
						Table,
						<br>
						Show all plan schedule on selected date. It shows nothing if there are no schedule on selected date.
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button> to add/edit schedule, user will redirected to schedule setting page, read Create Schedule Guide for details.
						Once selected date's Schedule is on approval progress, table will show additional button. 
						Use <button class="btn btn-sm btn-warning"><i class="fa fa-ban"></i></button> to cancel approval process then return schedule to editing process.
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button> to generate pdf file of selected schedule.
						Use <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button> to view detailed plan schedule on html.
					</li>
				</ul>
				</p>
				<h5><b>Approved Calendar</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectapp"><span>Approved Calendar</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Calendar Widget,
						<br>
						Show user's approved job by date.
					</li>
					<li class="treeview">
						Execution Status box,
						<br>
						Show execution status/report.
					</li>
					<li class="treeview">
						Table,
						<br>
						Show all approved schedule on selected date. It shows nothing if there are no schedule on selected date.
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button> to generate pdf file of selected schedule.
						Use <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button> to view detailed plan schedule on html.
					</li>
				</ul>
				</p>
				<h5><b>All Calendar</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectall"><span>All Calendar</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Calendar Widget,
						<br>
						Show all approved job by date.
					</li>
					<li class="treeview">
						Table,
						<br>
						Show all approved schedule on selected date. It shows nothing if there are no schedule on selected date.
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button> to generate pdf file of selected schedule.
						Use <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button> to view detailed plan schedule on html.
						Use <button class="btn btn-sm btn-warning"><i class="fa fa-sign-in"></i></button> to gain access to detailed plan schedule on html and report/close link, read Job Monitor Guide for details.
					</li>
				</ul>
				</p>
				<h5><b>Approval Setting</b></h5>
				Link : <a href="<?php echo base_url(); ?>projectapproval"><span>Approval Setting</span></a>
				<p>
				<ul class="treeview-menu">
					<li class="treeview">
						Table,
						<br>
						Show all user with specific role
						Use <button class="btn btn-sm btn-success"><i class="fa fa-gear"></i></button> to edit user's role, only user with approval tag has right to do this action.
					</li>
					<li class="treeview">
						Route box,
						<br>
						Show approval flow
					</li>
				</ul>
				</p>
				<br>
				<br>
				<h4><b>Program Guide</b></h4>
				<h5><b>Create New Job</b></h5>
				<ul class="treeview-menu">
					<li class="treeview">
						Go to Costum/Project Job on <a href="<?php echo base_url(); ?>projectjob">Costum Job Menu</a>
						<br>
						<b>Note:</b> All user has right to add Costum/Project Job
					</li>
					<li class="treeview">
						Click <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New</button> , 'Add' modal-box will appear. Fill all requested data. Click ADD button to save it.
						<br>
						<b>Note:</b> There are only 2 job class, Electric/Mechanic. User with <span class="label label-warning">Electric Tech.</span> automaticly create electric job that's need  <span class="label label-success">Electric Approval</span> user to confirm it. 
						The same route with <span class="label label-primary">Mechanic Tech.</span> user.
						While user with role tag <span class="label label-default">Undefined</span> will get additional selection to classify the job. 
					</li>
					<li class="treeview">
						Added job will appear in the first line of table. Click <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</button> to change 'Job Title' or 'Job Description', approved job and submitted job will return to basic tag once user click it.
						Click <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Del</button> to remove selected job. For now, just 
						click <button class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Set</button> to add/edit tools usage, spare parts usage, duration, and linked document of selected job.
					</li>
					<li class="treeview">
						There are 5 box in the 'Setting Project Job' page. First go to 'Time setting' box, set the execution duration/day in minutes then click <button class="btn btn-sm btn-success"><i class="fa fa-gear"></i></button>.
						Submitted time will shown on 'Duration:' label inside 'Time Setting' box.
						Then go to 'Spare Part' box, search needed spare part and needed quantity in each input field, press <button class="btn btn-sm btn-success">Add Part</button> to save it, saved item will shown inside 'Spare Part' box.
						There are no limitation number of spare parts.
						Go to 'Tools' box, search needed tools and needed quantity in each input field, press <button class="btn btn-sm btn-success">Add Tool</button> to save it, saved item will shown inside 'Tools' box.
						There are no limitation number of tools.
						<br>
						<b>Note:</b> Leave Attach Ducument empty
					</li>
					<li class="treeview">
						Press <button class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> BACK</button> to go back to costum job.
						Now, info coloumn has been filled with submitted spare part and tools.
					</li>
					<li class="treeview">
						Last, press <button class="btn btn-sm btn-success">Ask Approval</button> to start approval process.
						<br>
						<b>Note:</b> <button class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Set</button> button still accessible even if its already in approval progress, 
						but <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</button> will reset approval progress.
						Once the job rejected by <span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span>, reject note will appear in the info coloumn.
						Check approval setting for route details
					</li>
				</ul>
				
				<h5><b>Costum Job Approval</b></h5>
				<ul class="treeview-menu">
					<li class="treeview">
						Go to All Job on <a href="<?php echo base_url(); ?>projectalljob">All Job Menu</a>
						<br>
						<b>Note:</b> This guide only for user with tag <span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span>
					</li>
					<li class="treeview">
						Check on Job that has <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Approve</button> and <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reject</button>
						<br>
						<b>Note:</b> Data sorted by create sequence, newest added job will show on first row of table
					</li>
					<li class="treeview">
						Please read it before approve/reject it.
					</li>
					<li class="treeview">
						Press <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Approve</button> to approve it, Approve modal-box will appear, just click 'Approve' button. Approved job will gain <span class="label label-success">Approved</span> tag.
					</li>
					<li class="treeview">
						Press <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reject</button> to reject it, Reject modal-box will appear, fill the reason in 'Note' textarea, click 'Reject' button. Rejected job will go back to creator's 'costum job' table.
					</li>
				</ul>
				
				<h5><b>Create Schedule</b></h5>
				<ul class="treeview-menu">
					<li class="treeview">
						Go to Plan Calendar on <a href="<?php echo base_url(); ?>projectplan">Plan Calendar Menu</a>
						<br>
						<b>Note:</b> This guide only for user with tag <span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span>
					</li>
					<li class="treeview">
						Select Date on calendar widget. Once schedule box in the bottom of page show 'Project List on xxxx-xx-xx -user-' <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>, press <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
						<br>
						<b>Note:</b> <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button> will disabled once selected date has approved schedule or schedule in approval progress.
					</li>
					<li class="treeview">
						Web will redirect to 'Setting Project Schedule for xxxx-xx-xx' page.
						There are a selector in the first box, select job and press <button class="btn btn-sm btn-success">ADD</button>
						<br>
						<b>Note:</b> Only approved job will appear in this selector, data in the selector sorted by create sequence, newest data placed in first row.
					</li>
					<li class="treeview">
						Every added job will shown in each box. First, set the execution time by choose the dropdown menu then press <button class="btn btn-sm btn-success">SET</button>. 
						Saved setting shown at 'Execution : ....' in each box. Add PIC by choose user in dropdown menu for SLCI employee, and write down name of executor for thrid party, press <button class="btn btn-sm btn-success">Add PIC</button>.
						There are no limitation of PIC number.
						Press <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</button> to delete selected job.
					</li>
					<li class="treeview">
						Once schedule for selected date has been complete, press <button class="btn btn-sm btn-success">Submit Approval</button>, this button will move the schedule to approval progress.
						<br>
						<b>Note:</b> Check Approval Setting for route details.
					</li>
					<li class="treeview">
						Web will redirect back to Plan Calendar. Approval status box will show the last submitted schedule. Select the same date as before.
						<button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button> has beed disappear.
						Use <button class="btn btn-sm btn-warning"><i class="fa fa-ban"></i></button> to cancel approval process then return schedule to editing process.
						Use <button class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button> to generate pdf file of selected schedule.
						Use <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button> to view detailed plan schedule on html.
					</li>
					<li class="treeview">
						Once schedule has been approved by <span class="label label-success">Checker III</span>, schedule will be moved to Approved Calendar and <button class="btn btn-sm btn-warning"><i class="fa fa-ban"></i></button> has been disappear.
					</li>
				</ul>
				
				<h5><b>Report Job Progress</b></h5>
				<ul class="treeview-menu">
					<li class="treeview">
						Go to All Calendar on <a href="<?php echo base_url(); ?>projectall">All Calendar Menu</a>
					</li>
					<li class="treeview">
						Select date then press <button class="btn btn-sm btn-warning"><i class="fa fa-sign-in"></i></button>, web will redirect to all job monitor page.
					</li>
					<li class="treeview">
						Press <button class="btn btn-sm btn-primary">Report</button> button that placed in same row as the selected job. Web will redirect to report page.
					</li>
					<li class="treeview">
						Fill report textarea and upload picture if required. Last, fill the user and password then press <button class="btn btn-sm btn-primary">Submit</button>
					</li>
				</ul>
				
				<h5><b>Close Job</b></h5>
				<ul class="treeview-menu">
					<li class="treeview">
						Go to All Calendar on <a href="<?php echo base_url(); ?>projectall">All Calendar Menu</a>
					</li>
					<li class="treeview">
						Select date then press <button class="btn btn-sm btn-warning"><i class="fa fa-sign-in"></i></button>, web will redirect to all job monitor page.
					</li>
					<li class="treeview">
						Press <button class="btn btn-sm btn-success">Close</button> button that placed in same row as the selected job. Web will redirect to close page.
					</li>
					<li class="treeview">
						Last, fill the user and password then press <button class="btn btn-sm btn-success">Close</button>
						<br>
						<b>Note:</b> Only job arranger has right to close the job.
					</li>
				</ul>
				<br>
				<br>
				<h4><b>Approval Route</b></h4>
				<ul class="treeview-menu">
					<li class="treeview">
						All user has right to add Costum/Project Job on <a href="<?php echo base_url(); ?>projectjob">Costum Job Menu</a>. 
						All project need approval from user with <span class="label label-success">Electric Approval</span> tag or <span class="label label-success">Mechanic Approval</span> tag.
						Project will never appear on schedule arranger if it has no <span class="label label-success">Approved</span> tag.
					</li>
					<li class="treeview">
						There are only 2 job class, Electric/Mechanic. User with <span class="label label-warning">Electric Tech.</span> automaticly create electric job that's need  <span class="label label-success">Electric Approval</span> user to confirm it. 
						The same route with <span class="label label-primary">Mechanic Tech.</span> user.
						While user with role tag <span class="label label-default">Undefined</span> will get additional selection to classify the job. 
					</li>
					<li class="treeview">
						User need to click <a class="btn btn-xs btn-success" href="#">Ask Approval</a> button to forward the project job to <span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> based on the explanation before.
					</li>
					<li class="treeview">
						<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> will receive approval request on <a href="<?php echo base_url(); ?>projectalljob"> All Job Menu</a>
					</li>
					<li class="treeview">
						<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> select <a class="btn btn-sm btn-success" href="#">Approve</a> or <a class="btn btn-sm btn-danger" href="#">Reject</a> to process it.
					</li>
					<li class="treeview">
						Rejected project job will return to the job's owner, while approved job will get <span class="label label-success">Approved</span> tag.
					</li>
					<li class="treeview">
						<span class="label label-success">Electric Approval</span> or <span class="label label-success">Mechanic Approval</span> will set the schedule and supporting team on Plan Calendar Menu. The schedule will need approval from Checker I, Checker II and Checker III
					</li>
					<li class="treeview">
						All user with registered LINE account has access to check the Approved Schedule by send "mtnjob" command to check today's job and "mtnjob2" to check tomorrow's job. 
					</li>
				</ul>
			</div>
		</div>
	</section>
</div>