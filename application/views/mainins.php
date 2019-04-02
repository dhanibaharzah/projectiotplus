<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-question-circle"></i> Manual
      </h1>
    </section>
    <section class="content">
        <div class="row">
                        <div class="col-lg-12 col-xs-12">
                                <h3>User's Guide</h3>
                                <br>
                                <h5>1. Rent a Tool</h5>
                                <p>Open "Rental Tool" on side bar. There are 3 main part there: Tool list table, Search Engine, and Cart</p>
                                <p>Type anything on Search Engine bar, you will receive the result on Tool list table. Look at "Action" coloumn at Tool list table. You can book any item with <button class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i></button> button.</p>
                                <p>Action coloumn identify the current status of tool. You cannt order any tool without <button class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i></button> button.</p>
                                <p>Other status:</p>
                                <p>1. <button class="btn btn-sm btn-info">booked</button>, booked by user, check on user coloumn</p>
                                <p>2. <button class="btn btn-sm btn-warning">inorder</button>, inorder by user, check on user coloumn</p>
                                <p>3. <button class="btn btn-sm btn-default">data miss</button>, data miss match between database and real stock</p>
                                <p>4. <button class="btn btn-sm btn-default">broken</button>, tool need a replacement, broken status confirmed by tool keeper</p>
                                <p>5. <button class="btn btn-sm btn-danger">lost</button>, tool has been lost</p>
                                <br>
                                <p>Once you press <button class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i></button>, tool's status will be changed with <button class="btn btn-sm btn-info">booked</button>. And tool information will be spawn up on your Cart!</p>
                                <p>Just re-enter other word if you want to borrow other tool, there are no limit, you can borrow all listed tool. Dont forget your responsibility to bring them back to toolkeeper.</p>
                                <p>Last, press the <button class="btn btn-sm btn-success">Checkout</button> button, server will generate your invoice. Now you can take your tool from toolkeeper.</p>
                                <br>
                                <br>
                                <h5>2. Bring back tool</h5>
                                <p>Just bring those tools to toolkeeper, if you bring them back with more than 72 hours after you borrow them, it will recorded as "late" status on your invoice record.</p>
                                <p>And if there is any problem such as broken tool or tool has been lost, toolkeeper will directly report it. You can discus with your boss or your boss will call you to discus what you should do as your responsibility.</p>
                                <br>
                                <br>
                                <h5>3. Others</h5>
                                <p>As a user, You have access thru:</p>
                                <p>1. New Invoice, check all new invoice even it submitted by other user, but you has no rights to process it</p>
                                <p>2. Ongoing Invoice, check all ongoing invoice even it processed by other user, but no rights to close it</p>
                                <p>3. Broken Tools, check all broken tools, but no access to action button</p>
                                <p>4. All Invoice, check all invoice</p>
                                <p>5. Tool Management/All Tools, check all tools at toolkeeper</p>
                                <p>6. Tool Management/PM Setting, access to see all tools PM setting, but no access to modify it</p>
                                <p>7. Tool Management/PM Schedule, check toolkeeper's PM schedule for next 30 days</p>
                                <p>8. Tool Management/Today's PM, check PM schedule that need to execute today</p>
                                <p>9. Tool Management/PM Result, check PM Result by toolkeeper</p>
                                <p>10. Trouble History, check all trouble from invoice, such as late, broken and lost</p>
                                <br>
                                <br>
                                <h3>Toolkeeper/Manager's Guide</h3>
                                <br>
                                <h5>1. Rent a Tool as User</h5>
                                <p>Almost same as user's Guide, just a little bit different</p>
                                <p>Toolkeeper is the only manager user class, and the only class that cannot take checkout action.</p>
                                <p>Before toolkeeper press the <button class="btn btn-sm btn-success">Checkout</button>, toolkeeper need to select user from "User" dropdown, invoice's user will be generated base on who selected in this step</p>
                                <br>
                                <br>
                                <h5>2. Process Invoice</h5>
                                <p>Go to "New Invoice" menu on side bar, select invoice which you want to process.</p>
                                <p>There are 3 button here:</p>
                                <p>1. <button class="btn btn-sm btn-default">Cancel</button> this button will cancel the tool, and bring the status back to available</p>
                                <p>2. <button class="btn btn-sm btn-danger">Data Miss</button> this button will cancel the tool, and bring the status to data miss. Press this button if there are a miss match between database and real stock!</p>
                                <p>3. a check box! check on item where it available on toolkeeper</p>
                                <p>Once you check all items, press Process Invoice button, the invoice will be marked as ongoing invoice</p>
                                <br>
                                <br>
                                <h5>3. Close Invoice</h5>
                                <p>Go to "Ongoing Invoice" menu on side bar, select invoice which you want to close.</p>
                                <p>There are 3 button here:</p>
                                <p>1. <button class="btn btn-sm btn-default">Broken</button> this button will set tool as broken</p>
                                <p>2. <button class="btn btn-sm btn-danger">Lost</button> this button will set tool as lost</p>
                                <p>3. A check box! check on item which user bring back to toolkeeper</p>
                                <p>Once you check all items, press Close Invoice button, the invoice will be marked as closed invoice</p>
                                <br>
                                <br>
                                <h5>4. Others</h5>
                                <p>As a toolkeeper/manager, You have access thru:</p>
                                <p>1. Tool Management/All Tools, check all tools at toolkeeper, you can add/edit and check history of every tool</p>
                                <p>2. Tool Management/PM Setting, access to see all tools PM setting, but no access to modify it</p>
                                <p>3. Tool Management/PM Schedule, check toolkeeper's PM schedule for next 30 days</p>
                                <p>4. Tool Management/Today's PM, check PM schedule that need to execute today, and has responsible to fill PM form</p>
                                <p>5. Tool Management/PM Result, check PM Result by toolkeeper</p>
                                <p>6. Trouble History, check all trouble from invoice, such as late, broken and lost</p>
                                <br>
                                <br>
                                <h3>Admin's Guide</h3>
                                <br>
                                <h5>Info</h5>
                                <p>Basicly, admin is user class with access to Tool Management menu</p>
                                <p>Tool status and data change will only controled by toolkeeper/manager, admin has no right to do it</p>
                                <p>Admin's main job is to arrange PM Schedule</p>
                                <p>Admin has full access to PM setting. The other access is same with user.</p>
                                
                                
                                
                                
                        </div>
            
                
           
        </div>
                
    </section>
</div>