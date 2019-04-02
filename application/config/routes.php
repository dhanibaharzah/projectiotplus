<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['go_to_youtube'] = 'user/ilie';
$route['full_code'] = 'user/ilie';
$route['demo_ver'] = 'user/demo_ver';
$route['loginexternal/(:num)'] = "login/loginexternal/$1";
$route['top_nav'] = "iot_rawmat/top_nav";
$route['getbugpersen'] = "user/getbugpersen";
/*********** USER DEFINED ROUTES *******************/
$route['rawr_guide_book'] = "rawr_doc/rawr_guide_book";
$route['doc_js_intro'] = "rawr_doc/doc_js_intro";
$route['doc_js_resources'] = "rawr_doc/doc_js_resources";
$route['doc_js_applist'] = "rawr_doc/doc_js_applist";
$route['doc_js_others'] = "rawr_doc/doc_js_others";
$route['linetutorial'] = "rawr_doc/linetutorial";
$route['linetopic'] = "rawr_doc/linetopic";
$route['jsatopz'] = "rawr_doc/jsatopz";

//controller login !!!
$route['loginMe'] = 'login/loginjoin';
//end controller login !!!
$route['chat_box'] = 'user/chat_box';
$route['server_update'] = 'user/server_update';
$route['server_update_tbl'] = 'user/server_update_tbl';
$route['server_update_tbl/(:num)'] = 'user/server_update_tbl/$1';
$route['server_update_exe'] = 'user/server_update_exe';

//controller user !!
$route['dashboard'] = 'user';
$route['apaaja'] = 'user/apaaja';
$route['logout'] = 'user/logout';

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['undermaintenance'] = "user/undermaintenance";
$route['undermtn'] = "CBM_line/undermtn";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";
//end controller user !!

//controller login neh 
$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";
//end controller login

//due to new base concept ===========================================================================================
//new controller JOBLIST
$route['projectjob'] = "joblist/projectjob";
$route['projectjob/(:num)'] = "joblist/projectjob/$1";
$route['addprojectjob'] = "joblist/addprojectjob";
$route['editprojectjob'] = "joblist/editprojectjob";
$route['editappprojectjob'] = "joblist/editappprojectjob";
$route['delprojectjob'] = "joblist/delprojectjob";
$route['partlist/(:num)'] = "joblist/partlist/$1";
$route['toollist/(:num)'] = "joblist/toollist/$1";
$route['askprojectapp/(:num)/(:num)'] = "joblist/askprojectapp/$1/$2";

$route['projectresult'] = "joblist/projectresult";
$route['projectresult/(:num)'] = "joblist/projectresult/$1";
$route['replist/(:num)'] = "joblist/replist/$1";
$route['reportinfo/(:num)'] = "joblist/reportinfo/$1";
$route['closepic/(:num)'] = "approval/closepic/$1";
$route['closepic_session'] = "approval/closepic_session";
$route['closeproject'] = "joblist/closeproject";

$route['prjresultbypic'] = "joblist/prjresultbypic";
$route['prjresultbypic/(:num)'] = "joblist/prjresultbypic/$1";

$route['docapproval'] = "joblist/docapproval";
$route['docapproval/(:num)'] = "joblist/docapproval/$1";
$route['process/(:num)'] = "joblist/process/$1";

$route['projectalljob'] = "joblist/projectalljob";
$route['projectalljob/(:num)'] = "joblist/projectalljob/$1";
$route['appprojectjob'] = "joblist/appprojectjob";
$route['rjtprojectjob'] = "joblist/rjtprojectjob";

$route['getpartdropdown'] = "joblist/getpartdropdown";
$route['getpartdropdown/(:any)'] = "joblist/getpartdropdown/$1";
$route['setprojectjob/(:num)'] = "joblist/setprojectjob/$1";
$route['setrepeater'] = "joblist/setrepeater";
$route['setdate'] = "joblist/setdate";
$route['setdur'] = "joblist/setdur";
$route['settool'] = "joblist/settool";
$route['deltoolprojectjob/(:num)/(:num)'] = "joblist/deltoolprojectjob/$1/$2";
$route['setpart'] = "joblist/setpart";
$route['delpartprojectjob/(:num)/(:num)'] = "joblist/delpartprojectjob/$1/$2";
$route['setform'] = "joblist/setform";
$route['delformprojectjob/(:num)'] = "joblist/delformprojectjob/$1";
$route['setready'] = "joblist/setready";
$route['delreadyprojectjob/(:num)/(:num)'] = "joblist/delreadyprojectjob/$1/$2";

$route['projectplan'] = "joblist/projectplan";
$route['apptable'] = "joblist/apptable";
$route['planjob'] = "joblist/projectplan";
$route['getprojectplan'] = "joblist/getprojectplan";
$route['getheader/(:num)'] = "joblist/getheader/$1";
$route['gettabel/(:num)'] = "joblist/gettabel/$1";
$route['gotodate'] = "joblist/gotodate";
$route['setprojectsch/(:any)'] = "joblist/setprojectsch/$1";

$route['schjob'] = "joblist/schjob";
$route['schpart/(:num)'] = "joblist/schpart/$1";
$route['schtool/(:num)'] = "joblist/schtool/$1";
$route['schuser/(:num)'] = "joblist/schuser/$1";
$route['schpic'] = "joblist/schpic";
$route['delschpic/(:num)/(:any)'] = "joblist/delschpic/$1/$2";
$route['delticket/(:num)/(:any)'] = "joblist/delticket/$1/$2";
$route['schstart'] = "joblist/schstart";
$route['schsubmit/(:any)'] = "joblist/schsubmit/$1";
$route['schcancel/(:any)'] = "joblist/schcancel/$1";

$route['devicenotready/(:any)/(:num)'] = "joblist/devicenotready/$1/$2";

$route['schview/(:num)'] = "approval/schview/$1";
$route['schviewpart/(:num)'] = "approval/schviewpart/$1";
$route['schviewtool/(:num)'] = "approval/schviewtool/$1";
$route['schviewform/(:num)'] = "approval/schviewform/$1";
$route['schviewuser/(:num)'] = "approval/schviewuser/$1";
$route['schapp/(:num)'] = "approval/schapp/$1";
$route['schmon/(:num)'] = "approval/schmon/$1";
$route['report/(:num)'] = "approval/report/$1";
$route['report_session'] = "approval/report_session";

$route['linechecker'] = "approval/linechecker";
$route['linechecker_notif'] = "approval/linechecker_notif";

$route['schaction/(:num)/(:num)'] = "approval/schaction/$1/$2";
$route['check_session'] = "approval/check_session";
$route['send_notif'] = "approval/send_notif";

$route['projectapp'] = "joblist/projectapp";
$route['getprojectapp'] = "joblist/getprojectapp";
$route['gettabelapp/(:num)'] = "joblist/gettabelapp/$1";
$route['getheaderapp/(:num)'] = "joblist/getheaderapp/$1";

$route['projectall'] = "joblist/projectall";
$route['getprojectall'] = "joblist/getprojectall";
$route['gettabelall/(:num)'] = "joblist/gettabelall/$1";
$route['getheaderall/(:num)'] = "joblist/getheaderall/$1";

$route['schviewall/(:num)'] = "approval/schviewall/$1";
$route['schmonall/(:num)'] = "approval/schmonall/$1";

$route['close/(:num)'] = "approval/close/$1";
$route['close_session'] = "approval/close_session";

$route['pmjob'] = "pmjob/pmjob";
$route['pmjob/(:num)'] = "pmjob/pmjob/$1";
$route['pmjob/(:num)/(:any)/(:any)/(:any)'] = "pmjob/pmjob/$1/$2/$3/$4";
$route['pmjob/(:num)/(:any)/(:any)/(:any)/(:any)'] = "pmjob/pmjob/$1/$2/$3/$4/$5";
$route['formlist/(:num)'] = "joblist/formlist/$1";
$route['setpmjob/(:num)'] = "pmjob/setpmjob/$1";
$route['pmcall'] = "pmjob/pmcall";
$route['getpmall'] = "pmjob/getpmall";
$route['getpmtabelall/(:num)'] = "pmjob/getpmtabelall/$1";

$route['pmview/(:num)'] = "approval/pmview/$1";

$route['checkdoc'] = "pmjob/pmsummary";
$route['test_array'] = "pmjob/test_array";
//$route['mechdata/pmcode/(:any)'] = "approval/pmcode/$1";
$route['mechdata/(:any)/(:any)'] = "approval/mechdata/$1/$2";
//$route['mechdata/pmcode/(:any)'] = "approval/pmcode/$1";
$route['pmcode/(:any)'] = "approval/pmcode/$1";
$route['pmtag/(:any)/(:num)'] = "approval/pmtag/$1/$2";
$route['pmsheet/(:any)/(:num)/(:num)'] = "approval/pmsheet/$1/$2/$3";
$route['submit_pm'] = "approval/submit_pm";
$route['qrcode/(:any)'] = "pmjob/qrcode/$1";
$route['pmqr'] = "pmjob/pmqr";

$route['pmresult'] = "pmjob/pmresult";
$route['pmresult/(:num)'] = "pmjob/pmresult/$1";

$route['resch'] = "approval/resch";
//==========================================================device
$route['workshopdev'] = "device/workshopdev";
$route['workshopdev/(:num)'] = "device/workshopdev/$1";

$route['alldev'] = "device/alldev";
$route['alldev/(:num)'] = "device/alldev/$1";
$route['tagging/(:any)'] = "device/tagging/$1";
$route['devqr/(:any)'] = "device/devqr/$1";
$route['parameter1/(:any)'] = "device/parameter1/$1";
$route['parameter2/(:any)'] = "device/parameter2/$1";
$route['parameter3/(:any)'] = "device/parameter3/$1";
$route['parameter4/(:any)'] = "device/parameter4/$1";

$route['adddevice'] = "device/adddevice";
$route['savedevice'] = "device/savedevice";

$route['editdevice/(:num)'] = "device/editdevice/$1";
$route['editdevicein'] = "device/editdevicein";

$route['hisdevice/(:num)'] = "device/hisdevice/$1";
$route['viewtestresult/(:num)'] = "device/viewtestresult/$1";
$route['viewtestresultx/(:num)'] = "device/viewtestresultx/$1";
$route['devtren/(:num)'] = "device/devtren/$1";

$route['hispos/(:any)'] = "device/hispos/$1";
$route['hispos/(:any)/(:num)'] = "device/hispos/$1/$2";

$route['hispar/(:any)'] = "device/hispar/$1";
$route['hispar/(:any)/(:num)'] = "device/hispar/$1/$2";

$route['hisman/(:any)'] = "device/hisman/$1";
$route['hisman/(:any)/(:num)'] = "device/hisman/$1/$2";

$route['histes/(:any)'] = "device/histes/$1";
$route['histes/(:any)/(:num)'] = "device/histes/$1/$2";

$route['devmainclass'] = "device/devmainclass";
$route['editdevmainclass'] = "device/editdevmainclass";
$route['adddevmainclass'] = "device/adddevmainclass";

$route['devsubclass'] = "device/devsubclass";
$route['devsubclassx/(:num)'] = "device/devsubclassx/$1";

$route['devparam'] = "device/devparam";
$route['devparamx/(:num)'] = "device/devparamx/$1";

$route['alltestsheet_app'] = "device/alltestsheet_app";
$route['alltestsheet_app/(:num)'] = "device/alltestsheet_app/$1";
$route['testsheet_app'] = "device/testsheet_app";
$route['testsheet_app/(:num)'] = "device/testsheet_app/$1";
$route['testappbox/(:num)'] = "device/testappbox/$1";
$route['testappit'] = "device/testappit";

$route['devpicsetting'] = "device/devpicsetting";
$route['devpicsetting/(:num)'] = "device/devpicsetting/$1";
$route['adddevpicsetting'] = "device/adddevpicsetting";
$route['deldevpicsetting'] = "device/deldevpicsetting";

$route['repairprog/(:num)/(:num)'] = "device/repairprog/$1/$2";
$route['addrepairticket'] = "device/addrepairticket";
$route['updateticketact/(:num)'] = "device/updateticketact/$1";
$route['addupdateticket'] = "device/addupdateticket";

$route['devrepair'] = "device/devrepair";
$route['devrepair/(:num)'] = "device/devrepair/$1";
$route['adddevrepair'] = "device/adddevrepair";
$route['editdevrepair'] = "device/editdevrepair";

$route['deviden'] = "device/deviden";
$route['deviden/(:num)'] = "device/deviden/$1";
$route['adddeviden'] = "device/adddeviden";
$route['editdeviden'] = "device/editdeviden";

//=================================================================================

$route['notif1'] = "joblist/notif1";
$route['notif2'] = "joblist/notif2";
$route['notif3'] = "pmjob/notif3";
$route['notif4'] = "device/notif4";
$route['notif5'] = "mtnbook/notif5";
$route['notif6'] = "joblist/notif6";
$route['notif7'] = "pmjob/notif7";
$route['notif8'] = "device/notif8";
$route['notif9'] = "user/notif9";
$route['notif10'] = "device/notif10";
$route['notif11'] = "user/notif11";
$route['notifa'] = "user/notifa";
$route['notifb'] = "user/notifb";
$route['notif_h1'] = "joblist/notif_h1";

//=================================================================================
$route['pmsheet_app'] = "pmjob/pmsheet_app";
$route['pmsheet_app/(:num)'] = "pmjob/pmsheet_app/$1";
$route['pmsheet_app/(:num)/(:num)'] = "pmjob/pmsheet_app/$1/$2";
$route['pmappbox/(:num)'] = "pmjob/pmappbox/$1";
$route['pmappit'] = "pmjob/pmappit";

$route['showresult'] = "pmjob/showresult";
$route['showresult/(:num)'] = "pmjob/showresult/$1";
$route['showresult/(:num)/(:any)/(:num)/(:num)'] = "pmjob/showresult/$1/$2/$3/$4";
$route['showresult/(:num)/(:any)/(:num)/(:num)/(:num)'] = "pmjob/showresult/$1/$2/$3/$4/$5";
$route['pmresultbox/(:num)'] = "pmjob/pmresultbox/$1";
$route['showtren/(:num)'] = "pmjob/showtren/$1";

$route['server_box'] = "user/server_box";
$route['project_box'] = "user/project_box";

$route['projectapproval'] = "joblist/projectapproval";
$route['projectapproval/(:num)'] = "joblist/projectapproval/$1";
$route['projectuserset'] = "joblist/projectuserset";
$route['projectmanual'] = "joblist/projectmanual";

$route['setpmdetjob/(:num)'] = "pmjob/setpmdetjob/$1";
$route['editpmjobx'] = "pmjob/editpmjob";
$route['delpmjob'] = "pmjob/delpmjob";

$route['setrepeaterpm'] = "pmjob/setrepeaterpm";
$route['setdurpm'] = "pmjob/setdurpm";
$route['settoolpm'] = "pmjob/settoolpm";
$route['deltoolpmjob/(:num)/(:num)'] = "pmjob/deltoolpmjob/$1/$2";
$route['setpartpm'] = "pmjob/setpartpm";
$route['delpartpmjob/(:num)/(:num)'] = "pmjob/delpartpmjob/$1/$2";
$route['setformpm'] = "pmjob/setformpm";
$route['delformpmjob/(:num)/(:num)'] = "pmjob/delformpmjob/$1/$2";

$route{'editdoc/(:any)/(:num)/(:num)'} = "pmjob/editdoc/$1/$2/$3";
$route{'editform1'} = "pmjob/editform1";
$route{'delform1'} = "pmjob/delform1";
$route{'editform2'} = "pmjob/editform2";
$route{'addform1'} = "pmjob/addform1";
$route{'addrow'} = "pmjob/addrow";

$route{'linkdoc/(:any)/(:num)/(:num)'} = "pmjob/linkdoc/$1/$2/$3";
$route['getpmparam/(:num)'] = "pmjob/getpmparam/$1";
$route['getpmparam2/(:num)'] = "pmjob/getpmparam2/$1";
$route{'setnewdevice'} = "pmjob/setnewdevice";
$route{'setnewparam'} = "pmjob/setnewparam";

$route{'logodoc/(:any)/(:num)/(:num)'} = "pmjob/logodoc/$1/$2/$3";
$route['pmaddlogo'] = "pmjob/pmaddlogo";
$route['pmdellogo/(:num)'] = "pmjob/pmdellogo/$1";

$route{'copydoc/(:any)/(:num)/(:num)'} = "pmjob/copydoc/$1/$2/$3";
$route['pmdetailbox/(:num)'] = "pmjob/pmdetailbox/$1";

$route{'importdoc/(:any)/(:num)/(:num)'} = "pmjob/importdoc/$1/$2/$3";
$route{'importdoc_exe/(:any)/(:num)/(:num)/(:any)/(:num)/(:num)'} = "pmjob/importdoc_exe/$1/$2/$3/$4/$5/$6";
$route['pmimport/(:num)/(:any)/(:num)/(:num)'] = "pmjob/pmimport/$1/$2/$3/$4";

$route{'deldoc/(:any)/(:num)/(:num)'} = "pmjob/deldoc/$1/$2/$3";
$route{'deldoc_exe/(:any)/(:num)/(:num)'} = "pmjob/deldoc_exe/$1/$2/$3";

$route{'newdoc'} = "pmjob/newdoc";
$route{'codedoc'} = "pmjob/codedoc";
$route{'codedoc/(:num)'} = "pmjob/codedoc/$1";
$route{'codedocx'} = "pmjob/codedocx";
$route{'adddevcode'} = "pmjob/adddevcode";
$route{'editdevcode'} = "pmjob/editdevcode";

$route{'createdoc'} = "pmjob/createdoc";

$route['pmrevival'] = "pmjob/pmrevival";
$route['pmrevival/(:num)'] = "pmjob/pmrevival/$1";
$route['pm_js_revival/(:any)'] = "pmjob/pm_js_revival/$1";
$route['revive_it/(:any)/(:num)/(:num)'] = "pmjob/revive_it/$1/$2/$3";

//$route['mechdata/devcode/(:any)'] = "approval/devcode/$1";
$route['devcode/(:any)'] = "approval/devcode/$1";

$route['devmainten/(:any)'] = "approval/devmainten/$1";
$route['fdevmainten'] = "approval/fdevmainten";

$route['devlockset/(:any)'] = "approval/devlockset/$1";
$route['fdevlockset'] = "approval/fdevlockset";

$route['devreplace/(:any)'] = "approval/devreplace/$1";
$route['fdevreplace'] = "approval/fdevreplace";

$route['devpertest/(:any)'] = "approval/devpertest/$1";
$route['devpertestin/(:num)/(:any)'] = "approval/devpertestin/$1/$2";
$route['submit_test'] = "approval/submit_test";

$route{'devposisi'} = "device/devposisi";
$route['devposisi/(:num)'] = "device/devposisi/$1";
$route['adddevposisi'] = "device/adddevposisi";
$route['editposisi'] = "device/editposisi";

$route{'devusage'} = "device/devusage";
$route['devusage/(:num)'] = "device/devusage/$1";
$route['adddevusage'] = "device/adddevusage";
$route['editdevusage'] = "device/editdevusage";

$route['devtest'] = "device/devtest";
$route['devtest/(:num)'] = "device/devtest/$1";
$route['viewtestform/(:num)'] = "device/viewtestform/$1";
$route['adddevtest'] ="device/adddevtest";
$route['editdevtest/(:num)'] = "device/editdevtest/$1";
$route['edittestpart'] = "device/edittestpart";
$route['adddevtestparam'] = "device/adddevtestparam";
$route['edittestparam'] = "device/edittestparam";
$route['deltestrow'] = "device/deltestrow";
$route['addtestpart'] = "device/addtestpart";

$route['devqr2'] = "device/devqr2";

$route['picsetting'] = "pmjob/picsetting";
$route['addpicsetting'] = "pmjob/addpicsetting";
$route['delpicsetting'] = "pmjob/delpicsetting";

$route['myproject'] = "joblist/myproject";
$route['piclist/(:num)'] = "joblist/piclist/$1";
$route['pmpiclist/(:num)'] = "pmjob/pmpiclist/$1";

$route['mypm'] = "pmjob/mypm";
$route['pmformlist/(:num)'] = "pmjob/pmformlist/$1";

$route['bugreport'] = "user/bugreport";
$route['bugreport/(:num)'] = "user/bugreport/$1";
$route['addbug'] = "user/addbug";

$route['mytaskabnormallity'] = "user/mytaskabnormallity";
$route['mytaskabnormallity/(:num)'] = "user/mytaskabnormallity/$1";

$route['myabnormallity'] = "user/myabnormallity";
$route['myabnormallity/(:num)'] = "user/myabnormallity/$1";

$route['abnormallity'] = "user/abnormallity";
$route['abnormallity/(:num)'] = "user/abnormallity/$1";
$route['addab'] = "user/addab";
$route['addabn/(:any)/(:num)'] = "approval/addabn/$1/$2";
$route['reuploadabn/(:num)'] = "approval/reuploadabn/$1/";
$route['addab_session'] = "user/addab_session";
$route['reupload_session'] = "user/reupload_session";
$route['viewabimage/(:num)'] = "user/viewabimage/$1";

$route['pmsummary'] = "pmjob/pmsummary";
$route['pmsummary/(:num)'] = "pmjob/pmsummary/$1";
$route['pmsummary/(:num)/(:any)/(:any)/(:any)'] = "pmjob/pmsummary/$1/$2/$3/$4";
$route['pmsummary/(:num)/(:any)/(:any)/(:any)/(:any)'] = "pmjob/pmsummary/$1/$2/$3/$4/$5";
$route['chartlist/(:any)/(:num)/(:num)'] = "pmjob/chartlist/$1/$2/$3";

$route['pmtoday'] = "pmjob/pmtoday";
$route['pmtoday/(:num)'] = "pmjob/pmtoday/$1";
$route['picarea/(:any)/(:num)/(:num)'] = "pmjob/picarea/$1/$2/$3";
$route['resultof/(:any)/(:num)/(:num)'] = "pmjob/resultof/$1/$2/$3";
$route['pmprogcount'] = "pmjob/pmprogcount";
$route['pmnowtable'] = "pmjob/pmnowtable";
$route['pmprogcountx'] = "pmjob/pmprogcountx";

$route['testsheet_img/(:num)'] = "approval/testsheet_img/$1";
$route['testsheet_img_exe'] = "approval/testsheet_img_exe";

$route['pmimg_upload/(:any)'] = "approval/pmimg_upload/$1";
$route['pmimg_upload_exe'] = "approval/pmimg_upload_exe";

$route['userlog'] = "user/userlog";
$route['userlog/(:num)'] = "user/userlog/$1";

$route['sendmasspage'] = "user/sendmasspage";
$route['sendmass'] = "user/sendmass";

$route['sendpmtom'] = "approval/sendpmtom";
$route['sendpmtod'] = "approval/sendpmtod";

$route['getpmtom/(:any)'] = "approval/getpmtom/$1";
$route['getpmtod/(:any)'] = "approval/getpmtod/$1";

$route['getprjtom/(:any)'] = "approval/getprjtom/$1";
$route['getprjtod/(:any)'] = "approval/getprjtod/$1";

$route['pmskipped'] = "pmjob/pmskipped";
$route['pmskipped/(:num)'] = "pmjob/pmskipped/$1";

$route['skippedpm'] = "approval/skippedpm";

$route['close_ab'] = "user/close_ab";
$route['ab_ticket/(:num)'] = "user/ab_ticket/$1";
$route['create_abticket/(:num)'] = "user/create_abticket/$1";
$route['add_abticket'] = "user/add_abticket";
$route['update_abticket/(:num)/(:num)'] = "user/update_abticket/$1/$2";
$route['up_abticket'] = "user/up_abticket";

$route['line_abticket/(:num)/(:num)'] = "approval/line_abticket/$1/$2";
$route['line_upabticket'] = "approval/line_upabticket";
$route['getallabticket'] = "approval/getallabticket";
$route['lineabimage/(:num)'] = "approval/lineabimage/$1";

$route['changepicmode'] = "pmjob/changepicmode";

$route['setpicpm'] = "pmjob/setpicpm";
$route['delpicpm/(:num)/(:num)'] = "pmjob/delpicpm/$1/$2";

$route['autoapprove_pm'] = "autoapp/autoapprove_pm";
//end of Joblist =====================================================================================================
$route['appmode/(:num)'] = "user/appmode/$1";
//start of mtnbook ===================================================================================================

$route['ctlog'] = "mtnbook/ctlog";
$route['ctlog/(:num)'] = "mtnbook/ctlog/$1";
$route['dtlog'] = "mtnbook/dtlog";
$route['dtlog/(:num)'] = "mtnbook/dtlog/$1";
$route['createdt'] = "mtnbook/createdt";

$route['setctnote'] = "mtnbook/setctnote";
$route['getdata_dt'] = "cron/getdata_dt";
$route['getdetailed/(:any)'] = "mtnbook/getdetailed/$1";
$route['getdetailed/(:any)/(:num)'] = "mtnbook/getdetailed/$1/$2";
$route['procesdt/(:num)'] = "mtnbook/procesdt/$1";
$route['generatedt'] = "mtnbook/generatedt";

$route['detaildt/(:num)'] = "mtnbook/detaildt/$1";
$route['editdetaildt/(:num)'] = "mtnbook/editdetaildt/$1";
$route['newcause'] = "mtnbook/newcause";
$route['editcause'] = "mtnbook/editcause";
$route['delcause'] = "mtnbook/delcause";
$route['editdt'] = "mtnbook/editdt";

$route['filedownload/(:any)/(:num)'] = "mtnbook/filedownload/$1/$2";

$route['prg_dt'] = "mtnbook/prg_dt";
$route['prg_dt/(:num)'] = "mtnbook/prg_dt/$1";
$route['delprg'] = "mtnbook/delprg";
$route['upload_prg'] = "mtnbook/upload_prg";
$route['upload_prg2'] = "mtnbook/upload_prg2";
$route['prgrev/(:num)'] = "mtnbook/prgrev/$1";
$route['upload_prgrev2'] = "mtnbook/upload_prgrev2";
$route['askappprg'] = "mtnbook/askappprg";

$route['dwg_dt'] = "mtnbook/dwg_dt";
$route['dwg_dt/(:num)'] = "mtnbook/dwg_dt/$1";
$route['deldwg'] = "mtnbook/deldwg";
$route['upload_dwg'] = "mtnbook/upload_dwg";
$route['upload_dwg2'] = "mtnbook/upload_dwg2";
$route['dwgrev/(:num)'] = "mtnbook/dwgrev/$1";
$route['upload_dwgrev2'] = "mtnbook/upload_dwgrev2";
$route['askappdwg'] = "mtnbook/askappdwg";

$route['opr_dt'] = "mtnbook/opr_dt";
$route['opr_dt/(:num)'] = "mtnbook/opr_dt/$1";
$route['createopr'] = "mtnbook/createopr";
$route['opr_dtx'] = "mtnbook/opr_dtx";

$route['opredit/(:num)'] = "mtnbook/opredit/$1";
$route['addoprrow'] = "mtnbook/addoprrow";
$route['opraddlink/(:num)'] = "mtnbook/opraddlink/$1";
$route['editoprrow'] = "mtnbook/editoprrow";
$route['deloprrow'] = "mtnbook/deloprrow";
$route['opraskapp'] = "mtnbook/opraskapp";
$route['opraddlogo'] = "mtnbook/opraddlogo";
$route['oprdellogo/(:num)'] = "mtnbook/oprdellogo/$1";
$route['editoprtitle'] = "mtnbook/editoprtitle";

$route['oprview/(:num)'] = "mtnbook/oprview/$1";
$route['oprprint/(:num)'] = "mtnbook/oprprint/$1";
$route['oprpdf/(:num)'] = "mtnbook/oprpdf/$1";
$route['oprrev/(:num)'] = "mtnbook/oprrev/$1";

$route['seq_dt'] = "mtnbook/seq_dt";
$route['seq_dt/(:num)'] = "mtnbook/seq_dt/$1";
$route['createseq'] = "mtnbook/createseq";
$route['seq_dtx'] = "mtnbook/seq_dtx";

$route['seqedit/(:num)'] = "mtnbook/seqedit/$1";
$route['editseqtitle'] = "mtnbook/editseqtitle";
$route['addseqrow'] = "mtnbook/addseqrow";
$route['editseqrow'] = "mtnbook/editseqrow";
$route['seqaddlink/(:num)'] = "mtnbook/seqaddlink/$1";
$route['delseqrow'] = "mtnbook/delseqrow";
$route['seqaskapp'] = "mtnbook/seqaskapp";

$route['seqview/(:num)'] = "mtnbook/seqview/$1";
$route['seqprint/(:num)'] = "mtnbook/seqprint/$1";
$route['seqpdf/(:num)'] = "mtnbook/seqpdf/$1";
$route['seqrev/(:num)'] = "mtnbook/seqrev/$1";

$route['download_log'] = "mtnbook/download_log";
$route['download_log/(:num)'] = "mtnbook/download_log/$1";

$route['logosetting'] = "mtnbook/logosetting";
$route['logosetting/(:num)'] = "mtnbook/logosetting/$1";
$route['logoadd'] = "mtnbook/logoadd";
$route['logoaddlink/(:num)'] = "mtnbook/logoaddlink/$1";
$route['editlogorow'] = "mtnbook/editlogorow";
$route['dellogorow'] = "mtnbook/dellogorow";

$route['mtnappreq'] = "mtnbook/mtnappreq";
$route['app_mtnlog'] = "mtnbook/app_mtnlog";
$route['oprviewapp/(:num)'] = "mtnbook/oprviewapp/$1";
$route['app_opr'] = "mtnbook/app_opr";
$route['seqviewapp/(:num)'] = "mtnbook/seqviewapp/$1";
$route['app_seq'] = "mtnbook/app_seq";

$route['addrefprg'] = "mtnbook/addrefprg";
$route['addrefdwg'] = "mtnbook/addrefdwg";
$route['addrefopr'] = "mtnbook/addrefopr";
$route['addrefseq'] = "mtnbook/addrefseq";
$route['unlinkrefdoc'] = "mtnbook/unlinkrefdoc";

$route['mymtnnotif'] = "mtnbook/mymtnnotif";
$route['mymtnnotif/(:num)'] = "mtnbook/mymtnnotif/$1";

//end of mtnbook =====================================================================================================

//Action Plan=========================================================================================================
$route['mtn_actplan'] = "mtn_actplan/mtn_actplan";
$route['mtn_actplan/(:num)'] = "mtn_actplan/mtn_actplan/$1";
$route['mtn_add_actplan'] = "mtn_actplan/mtn_add_actplan";
$route['mtn_edit_actplan'] = "mtn_actplan/mtn_edit_actplan";
$route['mtn_actplan_detail/(:num)'] = "mtn_actplan/mtn_actplan_detail/$1";
$route['mtn_add_actplan_phase'] = "mtn_actplan/mtn_add_actplan_phase";
$route['mtn_add_actplan_task'] = "mtn_actplan/mtn_add_actplan_task";
$route['mtn_edit_actplan_phase'] = "mtn_actplan/mtn_edit_actplan_phase";
$route['mtn_del_actplan_phase'] = "mtn_actplan/mtn_del_actplan_phase";
$route['mtn_del_actplan_task'] = "mtn_actplan/mtn_del_actplan_task";
$route['mtn_edit_actplan_task'] = "mtn_actplan/mtn_edit_actplan_task";
$route['mtn_actplan_getstart/(:num)/(:num)'] = "mtn_actplan/mtn_actplan_getstart/$1/$2";
$route['mtn_actplan_getend/(:num)/(:num)'] = "mtn_actplan/mtn_actplan_getend/$1/$2";
$route['mtn_actplan_getprog/(:num)/(:num)'] = "mtn_actplan/mtn_actplan_getprog/$1/$2";
$route['mtn_actplan_getallprog/(:num)'] = "mtn_actplan/mtn_actplan_getallprog/$1";
$route['mtn_gantt'] = "mtn_actplan/mtn_gantt";
//End of Action Plan==================================================================================================

$route['apabae'] = "user/apabae";
$route['trial'] = "user/trial";

//LINE
$route['maintenancejob_tom'] = "approval/maintenancejob_tom";
$route['maintenancejob_tod'] = "approval/maintenancejob_tod";
$route['maintenance_pm_tod'] = "approval/maintenance_pm_tod";
$route['maintenance_pm_tom'] = "approval/maintenance_pm_tom";
$route['maintenance_prj_tod'] = "approval/maintenance_prj_tod";
$route['maintenance_prj_tom'] = "approval/maintenance_prj_tom";


//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//TOOL KEEPING APP
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================

$route['order_box'] = "user/order_box";
$route['tool_box'] = "user/tool_box";

$route['userListing'] = "user/userListing";
$route['userListing/(:num)'] = "user/userListing/$1";
$route['adduser'] = "user/adduser";
$route['mainins'] = "tool/mainins";
$route['adduserexe'] = "user/adduserexe";
$route['edituser'] = "user/edituser";
$route['edituser/(:num)'] = "user/edituser/$1";
$route['edituserexe'] = "user/edituserexe";
$route['deleteuser/(:num)'] = "user/deleteuser/$1";
$route['reactive/(:num)'] = "user/reactive/$1";

$route['mailer'] = "login/mailer";
$route['search'] = "tool/search_user";

$route['rentaltool'] = "tool/rentaltool";
$route['rentaltool/(:num)/(:any)'] = "tool/rentaltool/$1/$2";
$route['rentaltool/(:num)'] = "tool/rentaltool/$1";

$route['tocart/(:num)'] = "tool/tocart/$1";
$route['tocart/(:num)/(:num)'] = "tool/tocart/$1/$2";
$route['tocart/(:num)/(:num)/(:any)'] = "tool/tocart/$1/$2/$3";

$route['delcart/(:num)'] = "tool/delcart/$1";
$route['delcart/(:num)/(:num)'] = "tool/delcart/$1/$2";
$route['delcart/(:num)/(:num)/(:any)'] = "tool/delcart/$1/$2/$3";

$route['checkout'] = "tool/checkout";

$route['newinvoice'] = "tool/newinvoice";
$route['newinvoice/(:num)'] = "tool/newinvoice/$1";

$route['procesinvoice_exe'] = "tool/procesinvoice_exe";
$route['procesinvoice/(:num)'] = "tool/procesinvoice/$1";
$route['canceltool/(:num)/(:num)/(:num)'] = "tool/canceltool/$1/$2/$3";
$route['misstool/(:num)/(:num)/(:num)'] = "tool/misstool/$1/$2/$3";

$route['closeinvoice_exe'] = "tool/closeinvoice_exe";
$route['closeinvoice/(:any)'] = "tool/closeinvoice/$1";
$route['losttool/(:num)/(:num)/(:any)'] = "tool/losttool/$1/$2/$3";
$route['brokentool/(:num)/(:num)/(:any)'] = "tool/brokentool/$1/$2/$3";

$route['ongoinvoice'] = "tool/ongoinvoice";
$route['ongoinvoice/(:num)'] = "tool/ongoinvoice/$1";

$route['errortool'] = "tool/errortool";
$route['errortool/(:num)'] = "tool/errortool/$1";

$route['allinvoice'] = "tool/allinvoice";
$route['allinvoice/(:num)'] = "tool/allinvoice/$1";

$route['detailinvoice/(:num)'] = "tool/detailinvoice/$1";
$route['detailtool/(:num)'] = "tool/detailtool/$1";
$route['detailtool/(:num)/(:num)'] = "tool/detailtool/$1/$2";

$route['alltool'] = "tool/alltool";
$route['alltool/(:num)'] = "tool/alltool/$1";

$route['setdatamiss/(:num)'] = "tool/setdatamiss/$1";
$route['setavailable/(:num)'] = "tool/setavailable/$1";
$route['setlate/(:num)'] = "tool/setlate/$1";

$route['addtool'] = "tool/addtool";
$route['addtoolexe'] = "tool/addtoolexe";

$route['edittool/(:num)'] = "tool/edittool/$1";
$route['edittoolexe'] = "tool/edittoolexe";

$route['mytool'] = "tool/mytool";
$route['myorderedtool'] = "tool/myorderedtool";
$route['todaytoolpm'] = "toolpm/todaytoolpm";

$route['jqnewinvoice'] = "tool/jqnewinvoice";
$route['jqongoinvoice'] = "tool/jqongoinvoice";
$route['jqbrokinvoice'] = "tool/jqbrokinvoice";
$route['myorderedtool'] = "tool/myorderedtool";

$route['toolproblematic'] = "tool/toolproblematic";

//PM tool
$route['toolpmset'] = "toolpm/toolpmset";
$route['toolpmset/(:num)'] = "toolpm/toolpmset/$1";
$route['toolpmset/(:num)/(:any)'] = "toolpm/toolpmset/$1/$2";

$route['turn_on/(:num)'] = "toolpm/turn_on/$1";
$route['turn_on/(:num)/(:num)'] = "toolpm/turn_on/$1/$2";
$route['turn_on/(:num)/(:num)/(:any)'] = "toolpm/turn_on/$1/$2/$3";

$route['turn_off/(:num)'] = "toolpm/turn_off/$1";
$route['turn_off/(:num)/(:num)'] = "toolpm/turn_off/$1/$2";
$route['turn_off/(:num)/(:num)/(:any)'] = "toolpm/turn_off/$1/$2/$3";

$route['setpmfreq'] = "toolpm/setpmfreq";
$route['setpmstart'] = "toolpm/setpmstart";

$route['toolschedule'] = "toolpm/toolschedule";
$route['toolschedule/(:num)'] = "toolpm/toolschedule/$1";

$route['toolresult'] = "toolpm/toolresult";
$route['toolresult/(:num)'] = "toolpm/toolresult/$1";

$route['detailtoolpm/(:num)'] = "toolpm/detailtoolpm/$1";
$route['detailtoolpm/(:num)/(:num)'] = "toolpm/detailtoolpm/$1/$2";

$route['todayschedule'] = "toolpm/todayschedule";
$route['todayschedule/(:num)'] = "toolpm/todayschedule/$1";

$route['alltrouble'] = "tool/alltrouble";
$route['alltrouble/(:num)'] = "tool/alltrouble/$1";

$route['report_2tool/(:num)'] = "tool/report_2tool/$1";
$route['submit_report'] = "tool/submit_report";
$route['revreport/(:num)'] = "tool/revreport/$1";
$route['update_report'] = "tool/update_report";

$route['reporttable'] = "tool/reporttable";
$route['reporttable/(:num)'] = "tool/reporttable/$1";

$route['trashtable'] = "tool/trashtable";
$route['trashtable/(:num)'] = "tool/trashtable/$1";

$route['closereport/(:num)/(:num)'] = "tool/closereport/$1/$2";
$route['demolish/(:num)/(:num)'] = "tool/demolish/$1/$2";

$route['report1'] = "login/report1";
$route['report2'] = "login/report2";
$route['picok/(:num)'] = "login/picok/$1";
$route['picnotok/(:num)'] = "login/picnotok/$1";
$route['manok/(:num)'] = "login/manok/$1";
$route['mannotok/(:num)'] = "login/mannotok/$1";

$route['setting'] = "tool/setting";
$route['applysetting'] = "tool/applysetting";

$route['pmform'] = "toolpm/pmform";
$route['addpmform'] = "toolpm/addpmform";
$route['viewpmform/(:num)'] = "toolpm/viewpmform/$1";
$route['editpmform/(:num)'] = "toolpm/editpmform/$1";
$route['edittestparam_2tool'] = "toolpm/edittestparam_2tool";
$route['addtestpart_2tool'] = "toolpm/addtestpart_2tool";
$route['deltestrow_2tool'] = "toolpm/deltestrow_2tool";

$route['linktopm/(:num)'] = "toolpm/linktopm/$1";
$route['linktopm/(:num)/(:num)'] = "toolpm/linktopm/$1/$2";
$route['linktopm/(:num)/(:num)/(:any)'] = "toolpm/linktopm/$1/$2/$3";
$route['edittooldoc'] = "toolpm/edittooldoc";
$route['setpmtool/(:num)'] = "toolpm/setpmtool/$1";

$route['updateticket'] = "cron/updateticket";
$route['toolinputform/(:num)'] = "cron/toolinputform/$1";

$route['submit_toolpm'] = "cron/submit_toolpm";
$route['viewtestresult_2tool/(:num)'] = "toolpm/viewtestresult_2tool/$1";

$route['autoupdatetool'] = "tool/autoupdatetool";



//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//HSE APP
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//CRON
$route['sendclosenotif'] = "hse_login/sendclosenotif";
$route['closenotif'] = "hse_login/closenotif";
$route['bubarnotif'] = "hse_login/bubarnotif";
$route['closespam'] = "hse_login/closespam";
$route['notifhse'] = "hse_login/notifhse"; //notif permit

//controller Configurasi
//apd
$route['editAPD/(:num)'] = "hse_configurasi/editAPD/$1";
$route['edit_APD'] = "hse_configurasi/edit_APD";
$route['addNewAPD'] = "hse_configurasi/addNewAPD";
$route['addNew_APD/(:num)'] = "hse_configurasi/addNew_APD/$1";
$route['addNew_APD'] = "hse_configurasi/addNew_APD";
$route['APD'] = "hse_configurasi/APD";
$route['APD/(:num)'] = "hse_configurasi/APD/$1";
//end apd

//energy
$route['editEnergy/(:num)'] = "hse_configurasi/editEnergy/$1";
$route['addNewEnergy'] = "hse_configurasi/addNewEnergy";
$route['addNew_Energy/(:num)'] = "hse_configurasi/addNew_Energy/$1";
$route['edit_Energy'] = "hse_configurasi/edit_Energy";
$route['addNew_Energy'] = "hse_configurasi/addNew_Energy";
$route['Energy/(:num)'] = "hse_configurasi/Energy/$1";
$route['Energy'] = "hse_configurasi/Energy";
//end energy

//funct
$route['editFunct/(:num)'] = "hse_configurasi/editFunct/$1";
$route['addNewFunct'] = "hse_configurasi/addNewFunct";
$route['edit_Funct'] = "hse_configurasi/edit_Funct";
$route['addNew_Funct/(:num)'] = "hse_configurasi/addNew_Funct/$1";
$route['addNew_Funct'] = "hse_configurasi/addNew_Funct";
$route['Funct/(:num)'] = "hse_configurasi/Funct/$1";
$route['Funct'] = "hse_configurasi/Funct";
//end funct

//loto
$route['editLoto/(:num)'] = "hse_configurasi/editLoto/$1";
$route['addNewLoto'] = "hse_configurasi/addNewLoto";
$route['edit_Loto'] = "hse_configurasi/edit_Loto";
$route['addNew_Loto/(:num)'] = "hse_configurasi/addNew_Loto/$1";
$route['addNew_Loto'] = "hse_configurasi/addNew_Loto";
$route['Loto'] = "hse_configurasi/Loto";
$route['Loto/(:num)'] = "hse_configurasi/Loto/$1";
//end loto

//override
$route['editOverride/(:num)'] = "hse_configurasi/editOverride/$1";
$route['addNewOverride'] = "hse_configurasi/addNewOverride";
$route['edit_Override'] = "hse_configurasi/edit_Override";
$route['addNew_Override/(:num)'] = "hse_configurasi/addNew_Override/$1";
$route['addNew_Override'] = "hse_configurasi/addNew_Override";
$route['Override/(:num)'] = "hse_configurasi/Override/$1";
$route['Override'] = "hse_configurasi/Override";
//end override\

//tool
$route['editTool/(:num)'] = "hse_configurasi/editTool/$1";
$route['addNewTool'] = "hse_configurasi/addNewTool";
$route['edit_Tool'] = "hse_configurasi/edit_Tool";
$route['addNew_Tool/(:num)'] = "hse_configurasi/addNew_Tool/$1";
$route['addNew_Tool'] = "hse_configurasi/addNew_Tool";
$route['Tool'] = "hse_configurasi/Tool";
$route['Tool/(:num)'] = "hse_configurasi/Tool/$1";
//end tool

//Area
$route['editArea/(:num)'] = "hse_configurasi/editArea/$1";
$route['edit_Area'] = "hse_configurasi/edit_Area";
$route['addNewArea'] = "hse_configurasi/addNewArea";
$route['addNew_Area/(:num)'] = "hse_configurasi/addNew_Area/$1";
$route['addNew_Area'] = "hse_configurasi/addNew_Area";
$route['Area'] = "hse_configurasi/Area";
$route['Area/(:num)'] = "hse_configurasi/Area/$1";
$route['hse_addcode_area'] = "hse_configurasi/hse_addcode_area";
$route['hse_editcode_area'] = "hse_configurasi/hse_editcode_area";
$route['hse_addgroup_area'] = "hse_configurasi/hse_addgroup_area";
$route['hse_editgroup_area'] = "hse_configurasi/hse_editgroup_area";

//end Area

//user set
$route['user_set'] = "hse_configurasi/user_set";
$route['user_set/(:num)'] = "hse_configurasi/user_set/$1";
$route['edituser_set/(:num)'] = "hse_configurasi/edituser_set/$1";
$route['edit_user_set'] = "hse_configurasi/edit_user_set";
//end user set

//end controller Configurasi

//JSA
$route['create_jsa'] = "hse_jsa/create";
$route['add_jsa'] = "hse_jsa/add_jsa";
$route['edit_jsa'] = "hse_jsa/edit_jsa";
$route['edit'] = "hse_jsa/edit";
$route['edit/(:num)'] = "hse_jsa/edit/$1";

$route['edited_jsa'] = "hse_jsa/edited_jsa";

$route['worker/(:any)'] = "hse_jsa/worker/$1";
$route['add_worker'] = "hse_jsa/add_worker";
$route['del_worker/(:num)/(:num)'] = "hse_jsa/del_worker/$1/$2";

$route['hazard/(:any)'] = "hse_jsa/hazard/$1";
$route['add_act_jsa'] = "hse_jsa/add_act_jsa";
$route['del_act/(:num)/(:num)'] = "hse_jsa/del_act/$1/$2";
$route['edit_act'] = "hse_jsa/edit_act";
$route['add_iden_jsa'] = "hse_jsa/add_iden_jsa";

$route['tool_hse/(:any)'] = "hse_jsa/tool/$1";
$route['add_tool'] = "hse_jsa/add_tool";

$route['permit_1/(:any)'] = "hse_jsa/permit_1/$1";

$route['save_permit'] = "hse_jsa/save_permit";
$route['myjsa'] = "hse_jsa/myjsa";
$route['myjsa/(:num)'] = "hse_jsa/myjsa/$1";
$route['cancel_jsa'] = "hse_jsa/cancel_jsa";
$route['delete_jsa'] = "hse_jsa/delete_jsa";

$route['vendorlist'] = "hse_jsa/vendorlist";
$route['vendorlist/(:num)'] = "hse_jsa/vendorlist/$1";

$route['appjsa'] = "hse_jsa/appjsa";
$route['appjsa/(:num)'] = "hse_jsa/appjsa/$1";
$route['check_permit/(:num)/(:num)'] = "hse_jsa/check_permit/$1/$2";
$route['just_permit/(:num)/(:num)'] = "hse_jsa/just_permit/$1/$2";
$route['justcheck/(:num)/(:num)'] = "hse_login/justcheck/$1/$2";

//===============================================================
$route['notiftodayjsa'] = "hse_jsa/notiftodayjsa";
$route['notifappjsa'] = "hse_jsa/notifappjsa";
$route['notifmyjsa'] = "hse_jsa/notifmyjsa";
//===============================================================

$route['test'] = 'testhere/test';
$route['test/(:num)'] = 'testhere/test/$1';

$route['closedjsa'] = "hse_jsa/closedjsa";
$route['closedjsa/(:num)'] = "hse_jsa/closedjsa/$1";

$route['re_create/(:num)'] = "hse_jsa/re_create/$1";
$route['re_createx/(:num)'] = "hse_jsa/re_createx/$1";

$route['view/(:num)'] = "hse_jsa/view/$1";

$route['submit_job'] = "hse_jsa/submit_job";

$route['edit_job/(:num)'] = "hse_jsa/edit_job/$1";
$route['editjob'] = "hse_jsa/editjob";
$route['delete_job'] = "hse_jsa/delete_job";

$route['add_vendor'] = "hse_jsa/add_vendor";
$route['edit_vendor/(:num)'] = "hse_jsa/edit_vendor/$1";
$route['editvendor'] = "hse_jsa/editvendor";

$route['add_vendorinduction'] = "hse_jsa/add_vendorinduction";
$route['vendorinduction'] = "hse_jsa/vendorinduction";
$route['vendorinduction/(:any)'] = "hse_jsa/vendorinduction/$1";
$route['penaltyvendor'] = "hse_jsa/penaltyvendor";
$route['penalty_vendor/(:num)'] = "hse_jsa/penalty_vendor/$1";

$route['penalty_list/(:num)'] = "hse_jsa/penalty_list/$1";
$route['penaltycount'] = "hse_jsa/penaltycount";
$route['penaltycount/(:num)'] = "hse_jsa/penaltycount/$1";
$route['upload_file'] = "hse_jsa/upload_file";
$route['edit_convendor'] = 'hse_jsa/edit_convendor';
$route['edited_convendor/(:num)'] = "hse_jsa/edited_convendor/$1";
$route['delete_convendor'] = 'hse_jsa/delete_convendor';

$route['send_app/(:num)/(:num)/(:num)'] = "hse_jsa/send_app/$1/$2/$3";
$route['qrcode_hse/(:num)'] = "hse_jsa/qrcode/$1";
$route['qrcodex/(:num)'] = "hse_jsa/qrcodex/$1";

$route['permit/(:num)/(:num)'] = "hse_jsa/permit/$1/$2";
$route['cek_permit'] = "hse_jsa/cek_permit";

$route['del_override/(:num)/(:num)'] = "hse_jsa/del_override/$1/$2";
$route['del_apd/(:num)/(:num)'] = "hse_jsa/del_apd/$1/$2";
$route['del_loto/(:num)/(:num)'] = "hse_jsa/del_loto/$1/$2";
$route['del_tool/(:num)/(:num)'] = "hse_jsa/del_tool/$1/$2";
$route['del_energy/(:num)/(:num)'] = "hse_jsa/del_energy/$1/$2";

$route['tochecker/(:num)/(:num)/(:num)/(:num)/(:num)'] = "hse_login/tochecker/$1/$2/$3/$4/$5";
$route['linechecker_hse/(:num)/(:num)/(:num)/(:num)/(:num)'] = "hse_login/linechecker/$1/$2/$3/$4/$5";
$route['checker/(:num)/(:num)/(:num)'] = "hse_login/checker/$1/$2/$3";
$route['linecheck/(:num)/(:num)'] = "hse_login/linecheck/$1/$2";
$route['check_session_hse'] = "hse_login/check_session";
$route['submitlinechecker/(:num)'] = "hse_login/submitlinechecker/$1";
$route['printx/(:num)'] = "hse_configurasi/laporan_pdf/$1"; //=========================================PDF

$route['box/(:num)'] = "hse_jsa/box/$1";//==============================AJAX
$route['workerbox/(:num)'] = "hse_jsa/workerbox/$1";//==============================AJAX
$route['notebox/(:num)'] = "hse_jsa/notebox/$1";//==============================AJAX

$route['monitor/(:num)'] = "hse_login/monitor/$1";
$route['report_hse/(:num)'] = "hse_login/report/$1";
$route['report_session_hse'] = "hse_login/report_session";

$route['reportx/(:num)'] = "hse_login/reportx/$1";
$route['report_sessionx'] = "hse_login/report_sessionx";

$route['close_hse/(:num)'] = "hse_login/close/$1";
$route['close_session_hse'] = "hse_login/close_session";

$route['pic_close/(:num)'] = "hse_login/pic_close/$1";

$route['closepic_hse/(:num)'] = "hse_login/closepic/$1";
$route['closepic_session_hse'] = "hse_login/closepic_session";

$route['sendnotif'] = "hse_login/sendnotif";

$route['po_notif'] = "hse_login/po_notif";

$route['c_notif'] = "hse_login/c_notif";
$route['p_notif'] = "hse_login/p_notif";
$route['s_notif'] = "hse_login/s_notif";

$route['mailer_hse'] = "hse_login/mailer";

$route['today_jsa'] = "hse_jsa/today_jsa";
$route['qrjsatoday'] = "hse_jsa/qrjsatoday";
$route['today_jsa/(:num)'] = "hse_jsa/today_jsa/$1";
$route['report_list/(:num)'] = "hse_jsa/report_list/$1";

$route['hse_daily_summary'] = "hse_jsa/hse_daily_summary";
$route['hse_daily_summary/(:num)'] = "hse_jsa/hse_daily_summary/$1";
$route['hse_hot/(:any)'] = "hse_jsa/hse_hot/$1";
$route['hse_high/(:any)'] = "hse_jsa/hse_high/$1";
$route['hse_conf/(:any)'] = "hse_jsa/hse_conf/$1";
$route['hse_dig/(:any)'] = "hse_jsa/hse_dig/$1";
$route['hse_elec/(:any)'] = "hse_jsa/hse_elec/$1";
$route['hse_gen/(:any)'] = "hse_jsa/hse_gen/$1";

$route['get_events'] = "hse_jsa/get_events";
$route['line'] = "hse_user/line";
$route['gas_cek'] = "hse_login/gas_cek";
$route['gas_hourly'] = "hse_login/gas_hourly";
$route['gas/(:num)'] = "hse_login/gas/$1";
$route['gas_s/(:num)'] = "hse_jsa/gas_s/$1";
$route['gas_session'] = "hse_login/gas_session";
$route['selected_date'] = "hse_jsa/selected_date";

$route['blood_cek'] = "hse_login/blood_cek";
$route['blood/(:num)'] = "hse_login/blood/$1";
$route['blood_p/(:num)'] = "hse_jsa/blood_p/$1";
$route['blood_pressure'] = "hse_login/blood_pressure";
$route['blood_cek'] = "hse_login/blood_cek";

$route['laporan_pdf/(:num)'] = "hse_configurasi/laporan_pdf/$1";

$route['phpinicek'] = "hse_login/phpinicek";
$route['autoclose_session'] = "hse_login/autoclose_session"; 
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//IOT APP 
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================

$route['downtimelog'] = 'iot_user/downtimelog';

$route['about'] = 'rawr_doc/rawr_guide_book';
$route['logmem'] = 'iot_mailer/logmem';
$route['cekmem'] = 'iot_mailer/cekmem';

//IOT
$route['ballrec/(:num)'] = 'iot_rawmat/ballrec/$1';
$route['iot_ballrec_chart/(:num)/(:num)'] = 'iot_rawmat/iot_ballrec_chart/$1/$2';
$route['iot_bm_flow'] = 'iot_rawmat/iot_bm_flow';
$route['iot_mat_table'] = 'iot_rawmat/iot_mat_table';
$route['iot_js_mat/(:num)'] = 'iot_rawmat/iot_js_mat/$1';
$route['iot_seal'] = "iot_rawmat/iot_seal";
$route['iot_js_seal_weight/(:num)'] = "iot_rawmat/iot_js_seal_weight/$1";
$route['iot_js_seal_slush/(:num)'] = "iot_rawmat/iot_js_seal_slush/$1";
$route['iot_js_seal_retslu/(:num)'] = "iot_rawmat/iot_js_seal_retslu/$1";

//IoT rawmaterial
$route['iot_ballmillov'] = "iot_rawmat/iot_ballmillov";
$route['iot_js_material'] = 'iot_rawmat/iot_js_material';
$route['iot_ajax_material'] = 'iot_rawmat/iot_ajax_material';
$route['iot_js_silo'] = 'iot_rawmat/iot_js_silo';
$route['iot_ajax_silo'] = 'iot_rawmat/iot_ajax_silo';
$route['iot_js_bm_flow'] = 'iot_rawmat/iot_js_bm_flow';
$route['iot_ajax_bm_flow'] = 'iot_rawmat/iot_ajax_bm_flow';
$route['iot_js_ampbm2'] = 'iot_rawmat/iot_js_ampbm2';
$route['iot_ajax_ampbm2'] = 'iot_rawmat/iot_ajax_ampbm2';
$route['iot_js_ampbm3'] = 'iot_rawmat/iot_js_ampbm3';
$route['iot_ajax_ampbm3'] = 'iot_rawmat/iot_ajax_ampbm3';

$route['iot_ajax_rawmat'] = 'iot_rawmat/iot_ajax_rawmat';

//IoT cycletime
$route['re_ajax_totalup'] = 'iot_cutting/re_ajax_totalup';
$route['re_ajax_totalup_daily/(:num)'] = 'iot_cutting/re_ajax_totalup_daily/$1';
$route['iot_js_cycmtd'] = 'iot_cutting/iot_js_cycmtd';
$route['iot_js_cycmtd/(:num)'] = 'iot_cutting/iot_js_cycmtd/$1';
$route['iot_js_dash'] = 'iot_cutting/iot_js_dash';
$route['ajax_mixing'] = 'iot_cutting/ajax_mixing';
$route['ajax_mixing_daily/(:num)'] = 'iot_cutting/ajax_mixing_daily/$1';
$route['iot_js_dash_daily/(:num)'] = 'iot_cutting/iot_js_dash_daily/$1';

$route['iot_cron_cyc_datadev/(:num)/(:num)'] = 'iot_cutting/iot_cron_cyc_datadev/$1/$2';

$route['iot_cycsetting'] = 'iot_cutting/iot_cycsetting';
$route['iot_cycsetting_exe'] = 'iot_cutting/iot_cycsetting_exe';

$route['ac/(:num)'] = 'iot_autoclave/ac/$1';
//load AC chart and table
$route['iot_chart_ac/(:num)/(:num)'] = 'iot_autoclave/iot_chart_ac/$1/$2';
$route['iot_js_ac/(:num)'] = 'iot_autoclave/iot_js_ac/$1';
$route['iot_js_boiler_online'] = 'iot_autoclave/iot_js_boiler_online';

//BOILER IOT
$route['boilerhour'] = 'iot_autoclave/boilerhour';
$route['boilerplc'] = 'iot_autoclave/boilerplc';
$route['boilerday_iot'] = 'iot_autoclave/boilerday';
$route['boiler_rt'] = 'iot_autoclave/boiler_rt';
$route['iot_ajax_bolier_rt'] = 'iot_autoclave/iot_ajax_bolier_rt';
$route['iot_js_boiler_gauge'] = 'iot_autoclave/iot_js_boiler_gauge';
$route['iot_ajax_boiler_gauge'] = 'iot_autoclave/iot_ajax_boiler_gauge';
$route['iot_js_bed'] = 'iot_autoclave/iot_js_bed';
$route['iot_ajax_bed'] = 'iot_autoclave/iot_ajax_bed';
$route['iot_js_feed'] = 'iot_autoclave/iot_js_feed';
$route['iot_ajax_feed'] = 'iot_autoclave/iot_ajax_feed';
$route['iot_js_fan'] = 'iot_autoclave/iot_js_fan';
$route['iot_ajax_fan'] = 'iot_autoclave/iot_ajax_fan';
$route['iot_js_dea'] = 'iot_autoclave/iot_js_dea';
$route['iot_ajax_dea'] = 'iot_autoclave/iot_ajax_dea';
//MORTAR
$route['cement'] = 'iot_mortar/cement';
$route['cement/(:num)'] = 'iot_mortar/cement/$1';

$route['lime'] = 'iot_mortar/lime';
$route['lime/(:num)'] = 'iot_mortar/lime/$1';

$route['batch'] = 'iot_mortar/batch';
$route['batch/(:num)'] = 'iot_mortar/batch/$1';

$route['cycdaily'] = 'iot_cutting/cycdaily';
$route['cycmonthly'] = 'iot_cutting/cycmonthly';

$route['iot_ct_cutting_error_log'] = 'iot_cutting/iot_ct_cutting_error_log';
$route['get_error_count'] = 'iot_cutting/get_error_count';
//Cycletime new format======================
//JS===============================
$route['iot_js_cyc_data/(:num)'] = 'iot_cutting/iot_js_cyc_data/$1';
//CRON renew=======================
$route['iot_cron_cyc_data/(:num)'] = 'cron/iot_cron_cyc_data/$1';
$route['iot_cron_cyc_data/(:num)/(:any)'] = 'cron/iot_cron_cyc_data/$1/$2';
//CRON MySQL Error
$route['check_cutting_ct'] = 'cron/check_cutting_ct';
//==========================================

$route['unload'] = 'iot_packing';
$route['test_m'] = 'iot_packing/test_m';

$route['rawr'] = 'iot_automated/RAWRList';
$route['followtopic/(:num)'] = 'iot_automated/followtopic/$1';
$route['unfollowtopic/(:num)'] = 'iot_automated/unfollowtopic/$1';
$route['pingme'] = 'iot_automated/pingme';
$route['followtopicline/(:num)'] = 'iot_automated/followtopicline/$1';

$route['iot_daily_calculator'] = 'iot_cron/iot_daily_calculator';
$route['iot_daily_calculator/(:num)'] = 'iot_cron/iot_daily_calculator/$1';

//=====================WKB MQTT -> MySQL=======================================
//CUTTING
$route['iot_cuttingwkb'] = 'iot_wkb/iot_cuttingwkb';

$route['iot_refeeding'] = 'iot_wkb/iot_refeeding';
$route['iot_cbrefeeder_lift/(:num)'] = 'iot_wkb/iot_cbrefeeder_lift/$1';
$route['iot_cbrefeeder_travel/(:num)'] = 'iot_wkb/iot_cbrefeeder_travel/$1';

$route['iot_js_refeeding_1'] = 'iot_wkb/iot_js_refeeding_1';
$route['iot_js_refeeding_2'] = 'iot_wkb/iot_js_refeeding_2';
$route['iot_ajax_refeeding_1'] = 'iot_wkb/iot_ajax_refeeding_1';
$route['iot_ajax_refeeding_2'] = 'iot_wkb/iot_ajax_refeeding_2';

$route['iot_tilting1'] = 'iot_wkb/iot_tilting1';
$route['iot_tilting1_fcw/(:num)'] = 'iot_wkb/iot_tilting1_fcw/$1';

$route['iot_js_tilting1_1'] = 'iot_wkb/iot_js_tilting1_1';
$route['iot_js_tilting1_2'] = 'iot_wkb/iot_js_tilting1_2';
$route['iot_js_tilting1_3'] = 'iot_wkb/iot_js_tilting1_3';
$route['iot_js_tilting1_4'] = 'iot_wkb/iot_js_tilting1_4';
$route['iot_js_tilting1_5'] = 'iot_wkb/iot_js_tilting1_5';
$route['iot_js_tilting1_6'] = 'iot_wkb/iot_js_tilting1_6';
$route['iot_js_tilting1_7'] = 'iot_wkb/iot_js_tilting1_7';

$route['iot_ajax_tilting1_1'] = 'iot_wkb/iot_ajax_tilting1_1';
$route['iot_ajax_tilting1_2'] = 'iot_wkb/iot_ajax_tilting1_2';
$route['iot_ajax_tilting1_3'] = 'iot_wkb/iot_ajax_tilting1_3';
$route['iot_ajax_tilting1_4'] = 'iot_wkb/iot_ajax_tilting1_4';
$route['iot_ajax_tilting1_5'] = 'iot_wkb/iot_ajax_tilting1_5';
$route['iot_ajax_tilting1_6'] = 'iot_wkb/iot_ajax_tilting1_6';
$route['iot_ajax_tilting1_7'] = 'iot_wkb/iot_ajax_tilting1_7';

$route['iot_trolley'] = 'iot_wkb/iot_trolley';
$route['iot_trolley_1/(:num)'] = 'iot_wkb/iot_trolley_1/$1';
$route['iot_trolley_2/(:num)'] = 'iot_wkb/iot_trolley_2/$1';

$route['iot_js_trolley_1'] = 'iot_wkb/iot_js_trolley_1';
$route['iot_js_trolley_2'] = 'iot_wkb/iot_js_trolley_2';
$route['iot_ajax_trolley_1'] = 'iot_wkb/iot_ajax_trolley_1';
$route['iot_ajax_trolley_2'] = 'iot_wkb/iot_ajax_trolley_2';

$route['iot_crosscutter'] = 'iot_wkb/iot_crosscutter';
$route['iot_crosscutter_t/(:num)'] = 'iot_wkb/iot_crosscutter_t/$1';
$route['iot_crosscutter_u/(:num)'] = 'iot_wkb/iot_crosscutter_u/$1';
$route['iot_crosscutter_v/(:num)'] = 'iot_wkb/iot_crosscutter_v/$1';

$route['iot_js_crosscutter_1'] = 'iot_wkb/iot_js_crosscutter_1';
$route['iot_js_crosscutter_2'] = 'iot_wkb/iot_js_crosscutter_2';
$route['iot_js_crosscutter_3'] = 'iot_wkb/iot_js_crosscutter_3';

$route['iot_ajax_crosscutter_1'] = 'iot_wkb/iot_ajax_crosscutter_1';
$route['iot_ajax_crosscutter_2'] = 'iot_wkb/iot_ajax_crosscutter_2';
$route['iot_ajax_crosscutter_3'] = 'iot_wkb/iot_ajax_crosscutter_3';

$route['iot_tilting2'] = 'iot_wkb/iot_tilting2';
$route['iot_tilting2_fcw/(:num)'] = 'iot_wkb/iot_tilting2_fcw/$1';
$route['iot_tilting2_tl/(:num)'] = 'iot_wkb/iot_tilting2_tl/$1';

$route['iot_js_tilting2_1'] = 'iot_wkb/iot_js_tilting2_1';
$route['iot_js_tilting2_2'] = 'iot_wkb/iot_js_tilting2_2';
$route['iot_js_tilting2_3'] = 'iot_wkb/iot_js_tilting2_3';
$route['iot_js_tilting2_4'] = 'iot_wkb/iot_js_tilting2_4';
$route['iot_js_tilting2_5'] = 'iot_wkb/iot_js_tilting2_5';
$route['iot_js_tilting2_6'] = 'iot_wkb/iot_js_tilting2_6';
$route['iot_js_tilting2_7'] = 'iot_wkb/iot_js_tilting2_7';
$route['iot_js_tilting2_8'] = 'iot_wkb/iot_js_tilting2_8';

$route['iot_ajax_tilting2_1'] = 'iot_wkb/iot_ajax_tilting2_1';
$route['iot_ajax_tilting2_2'] = 'iot_wkb/iot_ajax_tilting2_2';
$route['iot_ajax_tilting2_3'] = 'iot_wkb/iot_ajax_tilting2_3';
$route['iot_ajax_tilting2_4'] = 'iot_wkb/iot_ajax_tilting2_4';
$route['iot_ajax_tilting2_5'] = 'iot_wkb/iot_ajax_tilting2_5';
$route['iot_ajax_tilting2_6'] = 'iot_wkb/iot_ajax_tilting2_6';
$route['iot_ajax_tilting2_7'] = 'iot_wkb/iot_ajax_tilting2_7';
$route['iot_ajax_tilting2_8'] = 'iot_wkb/iot_ajax_tilting2_8';

//JS
//cutting cycletime
$route['iot_curct'] = "iot_wkb/iot_curct";
//overview for each machine
$route['iot_js_crosscutting_overview'] = "iot_wkb/iot_js_crosscutting_overview";
$route['iot_js_cuttingboardrefeeding_overview'] = "iot_wkb/iot_js_cuttingboardrefeeding_overview";
$route['iot_js_tilting2_overview'] = "iot_wkb/iot_js_tilting2_overview";
$route['iot_js_trolley_overview'] = "iot_wkb/iot_js_trolley_overview";

//PACKING
$route['iot_packingwkb'] = 'iot_wkb/iot_packingwkb';

$route['iot_js_packing_conveyor_conveyor1_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor1_current";
$route['iot_js_packing_conveyor_conveyor1_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor1_speed";
$route['iot_js_packing_conveyor_conveyor2_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor2_current";
$route['iot_js_packing_conveyor_conveyor2_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor2_speed";
$route['iot_js_packing_conveyor_conveyor3_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor3_current";
$route['iot_js_packing_conveyor_conveyor3_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor3_speed";
$route['iot_js_packing_conveyor_conveyor4_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor4_current";
$route['iot_js_packing_conveyor_conveyor4_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor4_speed";
$route['iot_js_packing_conveyor_conveyor5_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor5_current";
$route['iot_js_packing_conveyor_conveyor5_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor5_speed";
$route['iot_js_packing_conveyor_conveyor5_actualposition'] = "iot_wkb/iot_js_packing_conveyor_conveyor5_actualposition";
$route['iot_js_packing_conveyor_conveyor5_actualvelocity'] = "iot_wkb/iot_js_packing_conveyor_conveyor5_actualvelocity";
$route['iot_js_packing_conveyor_conveyor6_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor6_current";
$route['iot_js_packing_conveyor_conveyor6_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor6_speed";
$route['iot_js_packing_conveyor_conveyor6_actualposition'] = "iot_wkb/iot_js_packing_conveyor_conveyor6_actualposition";
$route['iot_js_packing_conveyor_conveyor6_actualvelocity'] = "iot_wkb/iot_js_packing_conveyor_conveyor6_actualvelocity";
$route['iot_js_packing_conveyor_conveyor7_current'] = "iot_wkb/iot_js_packing_conveyor_conveyor7_current";
$route['iot_js_packing_conveyor_conveyor7_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyor7_speed";
$route['iot_js_packing_conveyor_conveyor7_actualposition'] = "iot_wkb/iot_js_packing_conveyor_conveyor7_actualposition";
$route['iot_js_packing_conveyor_conveyor7_actualvelocity'] = "iot_wkb/iot_js_packing_conveyor_conveyor7_actualvelocity";

$route['iot_js_packing_conveyor_conveyoremptygrate1_current'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_current";
$route['iot_js_packing_conveyor_conveyoremptygrate1_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_speed";
$route['iot_js_packing_conveyor_conveyoremptygrate2_current'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_current";
$route['iot_js_packing_conveyor_conveyoremptygrate2_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_speed";
$route['iot_js_packing_conveyor_conveyoremptygrate3_current'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_current";
$route['iot_js_packing_conveyor_conveyoremptygrate3_speed'] = "iot_wkb/iot_js_packing_conveyor_conveyoremptygrate1_speed";

$route['iot_js_packing_emptygratetransport_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_emptygratetransport_liftingggear_actualposition";
$route['iot_js_packing_emptygratetransport_liftingggear_setposition'] = "iot_wkb/iot_js_packing_emptygratetransport_liftingggear_setposition";
$route['iot_js_packing_emptygratetransport_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_emptygratetransport_travelinggear_actualposition";
$route['iot_js_packing_emptygratetransport_travelinggear_setposition'] = "iot_wkb/iot_js_packing_emptygratetransport_travelinggear_setposition";

$route['iot_js_packing_emptypallets_countpalletscc2_counter'] = "iot_wkb/iot_js_emptypallets_countpalletscc2_counter";

$route['iot_js_packing_gratestakerbricks_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_gratestakerbricks_liftingggear_actualposition";
$route['iot_js_packing_gratestakerbricks_liftingggear_setposition'] = "iot_wkb/iot_js_packing_gratestakerbricks_liftingggear_setposition";
$route['iot_js_packing_gratestakerbricks_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_gratestakerbricks_travelinggear_actualposition";
$route['iot_js_packing_gratestakerbricks_travelinggear_setposition'] = "iot_wkb/iot_js_packing_gratestakerbricks_travelinggear_setposition";

$route['iot_js_packing_gratestakercake_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_gratestakercake_liftingggear_actualposition";
$route['iot_js_packing_gratestakercake_liftingggear_setposition'] = "iot_wkb/iot_js_packing_gratestakercake_liftingggear_setposition";
$route['iot_js_packing_gratestakercake_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_gratestakercake_travelinggear_actualposition";
$route['iot_js_packing_gratestakercake_travelinggear_setposition'] = "iot_wkb/iot_js_packing_gratestakercake_travelinggear_setposition";

$route['iot_js_packing_gripperbricks_grippingpressure_pressure'] = "iot_wkb/iot_js_packing_gripperbricks_grippingpressure_pressure";
$route['iot_js_packing_gripperbricks_hydraulicpressure_pressure'] = "iot_wkb/iot_js_packing_gripperbricks_hydraulicpressure_pressure";
$route['iot_js_packing_gripperbricks_liftinggear_position'] = "iot_wkb/iot_js_packing_gripperbricks_liftinggear_position";
$route['iot_js_packing_gripperbricks_travelinggear_position'] = "iot_wkb/iot_js_packing_gripperbricks_travelinggear_position";

$route['iot_js_packing_grippergrate_hydraulicpressure_position'] = "iot_wkb/iot_js_packing_grippergrate_hydraulicpressure_position";
$route['iot_js_packing_grippergrate_liftinggear_position'] = "iot_wkb/iot_js_packing_grippergrate_liftinggear_position";
$route['iot_js_packing_grippergrate_travelinggear_position'] = "iot_wkb/iot_js_packing_grippergrate_travelinggear_position";

$route['iot_js_lifting_liftinggearposition_position'] = "iot_wkb/iot_js_lifting_liftinggearposition_position";
$route['iot_js_lifting_travelinggearposition_position'] = "iot_wkb/iot_js_lifting_travelinggearposition_position";

$route['iot_js_packing_loaderlinecarriage_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_loaderlinecarriage_liftingggear_actualposition";
$route['iot_js_packing_loaderlinecarriage_liftingggear_setposition'] = "iot_wkb/iot_js_packing_loaderlinecarriage_liftingggear_setposition";
$route['iot_js_packing_loaderlinecarriage_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_loaderlinecarriage_travelinggear_actualposition";
$route['iot_js_packing_loaderlinecarriage_travelinggear_setposition'] = "iot_wkb/iot_js_packing_loaderlinecarriage_travelinggear_setposition";

$route['iot_js_packing_packaging_Countpalletscc7_counter'] = "iot_wkb/iot_js_packing_packaging_Countpalletscc7_counter";

$route['iot_js_packing_tilting_actualbrickscourse_counter'] = "iot_wkb/iot_js_packing_tilting_actualbrickscourse_counter";
$route['iot_js_packing_tilting_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_tilting_liftingggear_actualposition";
$route['iot_js_packing_tilting_liftingggear_setposition'] = "iot_wkb/iot_js_packing_tilting_liftingggear_setposition";
$route['iot_js_packing_tilting_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_tilting_travelinggear_actualposition";
$route['iot_js_packing_tilting_travelinggear_setposition'] = "iot_wkb/iot_js_packing_tilting_travelinggear_setposition";

$route['iot_js_packing_top_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_top_liftingggear_actualposition";
$route['iot_js_packing_top_liftingggear_setposition'] = "iot_wkb/iot_js_packing_top_liftingggear_setposition";
//actual
$route['iot_js_packing_travelinggearvelocity_actual_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_actual_actualposition";
$route['iot_js_packing_travelinggearvelocity_actual_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_actual_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_actual_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_actual_currency";
$route['iot_js_packing_travelinggearvelocity_actual_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_actual_deceleration";
//bricks
$route['iot_js_packing_travelinggearvelocity_bricks_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_actualposition";
$route['iot_js_packing_travelinggearvelocity_bricks_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_bricks_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_currency";
$route['iot_js_packing_travelinggearvelocity_bricks_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_deceleration";
//carriage
$route['iot_js_packing_travelinggearvelocity_carriage_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_carriage_actualposition";
$route['iot_js_packing_travelinggearvelocity_carriage_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_carriage_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_carriage_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_currency";
$route['iot_js_packing_travelinggearvelocity_carriage_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_carriage_currency";
//gratewithbricks
$route['iot_js_packing_travelinggearvelocity_gratewithbricks_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gratewithbricks_actualposition";
$route['iot_js_packing_travelinggearvelocity_gratewithbricks_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gratewithbricks_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_gratewithbricks_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_bricks_currency";
$route['iot_js_packing_travelinggearvelocity_gratewithbricks_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gratewithbricks_deceleration";
//grate
$route['iot_js_packing_travelinggearvelocity_grate_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_grate_actualposition";
$route['iot_js_packing_travelinggearvelocity_grate_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_grate_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_grate_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_grate_currency";
$route['iot_js_packing_travelinggearvelocity_grate_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_grate_deceleration";
//gripperempty
$route['iot_js_packing_travelinggearvelocity_gripperempty_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gripperempty_actualposition";
$route['iot_js_packing_travelinggearvelocity_gripperempty_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gripperempty_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_gripperempty_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gripperempty_currency";
$route['iot_js_packing_travelinggearvelocity_gripperempty_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_gripperempty_deceleration";
//hand
$route['iot_js_packing_travelinggearvelocity_hand_actualposition'] = "iot_wkb/iot_js_packing_travelinggearvelocity_hand_actualposition";
$route['iot_js_packing_travelinggearvelocity_hand_actualvelocity'] = "iot_wkb/iot_js_packing_travelinggearvelocity_hand_actualvelocity";
$route['iot_js_packing_travelinggearvelocity_hand_currency'] = "iot_wkb/iot_js_packing_travelinggearvelocity_hand_currency";
$route['iot_js_packing_travelinggearvelocity_hand_deceleration'] = "iot_wkb/iot_js_packing_travelinggearvelocity_hand_deceleration";
//bottom
$route['iot_js_packing_underlinebottom_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_underlinebottom_liftingggear_actualposition";
$route['iot_js_packing_underlinebottom_liftingggear_setposition'] = "iot_wkb/iot_js_packing_underlinebottom_liftingggear_setposition";
$route['iot_js_packing_underlinebot_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_underlinebot_travelinggear_actualposition";
$route['iot_js_packing_underlinebot_travelinggear_setposition'] = "iot_wkb/iot_js_packing_underlinebot_travelinggear_setposition";
//carriage
$route['iot_js_packing_underlinecarriage_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_underlinecarriage_liftingggear_actualposition";
$route['iot_js_packing_underlinecarriage_liftingggear_setposition'] = "iot_wkb/iot_js_packing_underlinecarriage_liftingggear_setposition";
$route['iot_js_packing_underlinecarriage_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_underlinecarriage_travelinggear_actualposition";
$route['iot_js_packing_underlinecarriage_travelinggear_setposition'] = "iot_wkb/iot_js_packing_underlinecarriage_travelinggear_setposition";
//center
$route['iot_js_packing_underlinecenter_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_underlinecenter_liftingggear_actualposition";
$route['iot_js_packing_underlinecenter_liftingggear_setposition'] = "iot_wkb/iot_js_packing_underlinecenter_liftingggear_setposition";
$route['iot_js_packing_underlinecenter_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_underlinecenter_travelinggear_actualposition";
$route['iot_js_packing_underlinecenter_travelinggear_setposition'] = "iot_wkb/iot_js_packing_underlinecenter_travelinggear_setposition";
//top
$route['iot_js_packing_underlinetop_liftingggear_actualposition'] = "iot_wkb/iot_js_packing_underlinetop_liftingggear_actualposition";
$route['iot_js_packing_underlinetop_liftingggear_setposition'] = "iot_wkb/iot_js_packing_underlinetop_liftingggear_setposition";
$route['iot_js_packing_underlinetop_travelinggear_actualposition'] = "iot_wkb/iot_js_packing_underlinetop_travelinggear_actualposition";
$route['iot_js_packing_underlinetop_travelinggear_setposition'] = "iot_wkb/iot_js_packing_underlinetop_travelinggear_setposition";

//Utility
$route['iot_elec_ov'] = 'iot_utility/iot_elec_ov';
$route['iot_js_400volt'] = 'iot_utility/iot_js_400volt';
$route['iot_ajax_400volt'] = 'iot_utility/iot_ajax_400volt';
$route['iot_js_voltunbalance'] = 'iot_utility/iot_js_voltunbalance';
$route['iot_ajax_voltunbalance'] = 'iot_utility/iot_ajax_voltunbalance';
$route['iot_js_400amp'] = 'iot_utility/iot_js_400amp';
$route['iot_ajax_400amp'] = 'iot_utility/iot_ajax_400amp';
$route['iot_js_ampunbalance'] = 'iot_utility/iot_js_ampunbalance';
$route['iot_ajax_ampunbalance'] = 'iot_utility/iot_ajax_ampunbalance';
$route['iot_js_pwr2_main'] = 'iot_utility/iot_js_pwr2_main';
$route['iot_ajax_pwr2_main'] = 'iot_utility/iot_ajax_pwr2_main';
$route['iot_js_solar_main'] = 'iot_utility/iot_js_solar_main';
$route['iot_ajax_solar_main'] = 'iot_utility/iot_ajax_solar_main';
$route['iot_js_qmc2'] = 'iot_utility/iot_js_qmc2';
$route['iot_ajax_qmc2'] = 'iot_utility/iot_ajax_qmc2';
$route['iot_js_qmc3'] = 'iot_utility/iot_js_qmc3';
$route['iot_ajax_qmc3'] = 'iot_utility/iot_ajax_qmc3';
$route['iot_js_qmc2unbalance'] = 'iot_utility/iot_js_qmc2unbalance';
$route['iot_ajax_qmc2unbalance'] = 'iot_utility/iot_ajax_qmc2unbalance';
$route['iot_js_qmc3unbalance'] = 'iot_utility/iot_js_qmc3unbalance';
$route['iot_ajax_qmc3unbalance'] = 'iot_utility/iot_ajax_qmc3unbalance';

$route['iot_solar_per'] = 'iot_utility/iot_solar_per';
$route['iot_amp'] = 'iot_utility/iot_amp';
$route['iot_power'] = 'iot_utility/iot_power';
$route['iot_sepam'] = 'iot_utility/iot_sepam';
$route['iot_solar'] = 'iot_utility/iot_solar';
$route['iot_electotal'] = 'iot_utility/iot_electotal';
$route['iot_elecprice'] = 'iot_utility/iot_elecprice';
$route['iot_electrical_daily'] = 'iot_utility/iot_electrical_daily';

$route['update_iot_config'] = 'iot_utility/update_iot_config';

$route['iot_sepam_record/(:num)'] = 'iot_utility/iot_sepam_record/$1';
$route['iot_sepam_table/(:num)/(:num)'] = 'iot_utility/iot_sepam_table/$1/$2';
$route['iot_pwr_record'] = 'iot_utility/iot_pwr_record';
$route['iot_main_pwr_table/(:num)'] = 'iot_utility/iot_main_pwr_table/$1';
$route['iot_pv_record'] = 'iot_utility/iot_pv_record';
$route['iot_main_pv_table/(:num)'] = 'iot_utility/iot_main_pv_table/$1';

//iot running hour calculator 
//CRON
$route['iot_boiler_hour_meter'] = "cron/iot_boiler_hour_meter";
$route['iot_boiler_hour_meter/(:any)'] = "cron/iot_boiler_hour_meter/$1";
$route['iot_ballmill_hour_meter'] = "cron/iot_ballmill_hour_meter";
$route['iot_ballmill_hour_meter/(:any)'] = "cron/iot_ballmill_hour_meter/$1";
$route['iot_ballmill_feeder_hour_meter'] = "cron/iot_ballmill_feeder_hour_meter";
$route['iot_ballmill_feeder_hour_meter/(:any)'] = "cron/iot_ballmill_feeder_hour_meter/$1";
//VIEW
$route['iot_hour_boiler'] = "iot_autoclave/iot_hour_boiler";
$route['iot_js_hour_boiler/(:num)'] = "iot_autoclave/iot_js_hour_boiler/$1";
$route['iot_hour_ballmill'] = "iot_rawmat/iot_hour_ballmill";
$route['iot_js_hour_balmill/(:num)'] = "iot_rawmat/iot_js_hour_balmill/$1";
$route['iot_hour_balmill_mat'] = "iot_rawmat/iot_hour_balmill_mat";
$route['iot_js_hour_balmill_mat/(:num)'] = "iot_rawmat/iot_js_hour_balmill_mat/$1";

//mailer group
$route['ping'] = 'iot_mailer/ping';
$route['downtime'] = 'iot_mailer/downtime';
$route['slowspeed1'] = 'iot_mailer/slowspeed1';
$route['slowspeed2'] = 'iot_mailer/slowspeed2';

//line
$route['send_planstop'] = "line/send_planstop";
$route['slowspeedline1'] = 'iot_mailer/slowspeedline1';
$route['slowspeedline2'] = 'iot_mailer/slowspeedline2';
$route['downtimeline'] = 'iot_mailer/downtimeline';
$route['downtimelinex2'] = 'iot_mailer/downtimelinex2';
$route['downtimelinex3'] = 'iot_mailer/downtimelinex3';
$route['bed650'] = 'iot_mailer/bed650';
$route['bed600'] = 'iot_mailer/bed600';
$route['bed550'] = 'iot_mailer/bed550';
$route['bed500'] = 'iot_mailer/bed500';
$route['drumlvl'] = 'iot_mailer/drumlvl';
$route['dealvl'] = 'iot_mailer/dealvl';
$route['log210'] = 'iot_mailer/log210';
$route['log220'] = 'iot_mailer/log220';
$route['log203'] = 'iot_mailer/log203';
$route['boilerp'] = 'iot_mailer/boilerp';
$route['cycletime'] = 'iot_mailer/cycletime';
$route['grate'] = 'iot_mailer/grate';
$route['mtnjob'] = 'iot_mailer/mtnjob';
$route['pmjob_iot'] = 'iot_mailer/pmjob';
$route['pmjob2_iot'] = 'iot_mailer/pmjob2';

$route['mtnjob2fx'] = 'iot_mailer/mtnjob2fx';
$route['pmjob2fx'] = 'iot_mailer/pmjob2fx';

$route['pingline'] = 'iot_mailer/pingline';
$route['hook'] = 'iot_mailer/hook';

$route['appset'] = "appsetting/appset";
$route['appset/(:num)'] = "appsetting/appset/$1";
$route['userset'] = "appsetting/userset";

//tambahan boiler
$route['boilerinput'] = 'autoclave/boilerinput';
$route['addboilerinput1'] = 'autoclave/addboilerinput1';
$route['addboilerinput2'] = 'autoclave/addboilerinput2';
$route['addboilerinput3'] = 'autoclave/addboilerinput3';

$route['boilerday'] = 'boiler/boilerday';
$route['boilerinput'] = 'boiler/boilerinput';
$route['waterquality'] = 'boiler/waterquality';
$route['waterquality/(:num)'] = 'boiler/waterquality/$1';
$route['getwaterqualities'] = 'boiler/waterqualities';

$route['prod_js_boilerph'] = 'boiler/prod_js_boilerph';
$route['prod_ajax_boilerph'] = 'boiler/prod_ajax_boilerph';
$route['prod_js_boilercd'] = 'boiler/prod_js_boilercd';
$route['prod_ajax_boilercd'] = 'boiler/prod_ajax_boilercd';
$route['prod_js_boilertb'] = 'boiler/prod_js_boilertb';
$route['prod_ajax_boilertb'] = 'boiler/prod_ajax_boilertb';

$route['wqconductivity'] = 'boiler/wqconductivity';
$route['wqconductivity/(:num)'] = 'boiler/wqconductivity/$1';

$route['wqturbidity'] = 'boiler/wqturbidity';
$route['wqturbidity/(:num)'] = 'boiler/wqturbidity/$1';

$route['wqacidity'] = 'boiler/wqacidity';
$route['wqacidity/(:num)'] = 'boiler/wqacidity/$1';
//tambahan rawmat
$route['rawcement'] = "rawmat/rawcement";
$route['rawcement/(:num)'] = "rawmat/rawcement/$1";
$route['rawlime'] = "rawmat/rawlime";
$route['rawlime/(:num)'] = "rawmat/rawlime/$1";
$route['rawsand'] = "rawmat/rawsand";
$route['rawsand/(:num)'] = "rawmat/rawsand/$1";
$route['rawcementchart'] = "rawmat/rawcementchart";
$route['rawlimechart'] = "rawmat/rawlimechart";
$route['rawsandchart'] = "rawmat/rawsandchart";


//stockmortar
$route['stockmortar'] = "stock/stockmortar";
$route['deletestock'] = "stock/deletestock";
$route['stockmortar/(:num)'] = "stock/stockmortar/$1";
$route['addstock'] = "stock/addstock";
$route['mortar_app/(:num)/(:num)'] = "stock/mortar_app/$1/$2";

$route['stockout'] = "stock/stockout";
$route['deletestockout'] = "stock/deletestockout";
$route['stockout/(:num)'] = "stock/stockout/$1";
$route['addstockout'] = "stock/addstockout";
$route['mortarout_app/(:num)/(:num)'] = "stock/mortarout_app/$1/$2";

$route['get_mortar_group'] = "stock/get_mortar_group";

$route['viscosity'] = "stock/viscosity";
$route['viscosity/(:num)'] = "stock/viscosity/$1";
$route['addvisco'] = "stock/addvisco";
$route['mortar_app/(:num)/(:num)'] = "stock/mortar_app/$1/$2";

//viscosity
//approval setting on form input

//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//Self Service APP 
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
$route["ss_upload_xlsx"] = "ss_main/ss_upload_xlsx";
$route["ss_import_attlog"] = "ss_main/ss_import_attlog";
$route["ss_attendance"] = "ss_main/ss_attendance";
$route["ss_attendance/(:num)"] = "ss_main/ss_attendance/$1";

//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
//CBM APP 
//================================================================================================================================================
//================================================================================================================================================
//================================================================================================================================================
$route["cbm_daily_rec"] = "CBM_salesvol/cbm_daily_rec";
$route["cbm_daily_rec/(:num)/(:num)/(:num)"] = "CBM_salesvol/cbm_daily_rec/$1/$2/$3";
$route["cbm_daily_rec/(:num)/(:num)/(:num)/(:num)"] = "CBM_salesvol/cbm_daily_rec/$1/$2/$3/$4";
$route["cbm_daily_record"] = "CBM_salesvol/cbm_daily_record";
$route["update_cbm_daily_report"] = "CBM_salesvol/update_cbm_daily_report";

$route["cbm_forecast"] = "CBM_salesvol/cbm_forecast";
$route["cbm_js_date_forecast/(:num)/(:num)"] = "CBM_salesvol/cbm_js_date_forecast/$1/$2";
$route["cbm_js_forecast_form"] = "CBM_salesvol/cbm_js_forecast_form";

$route["cbm_past_sales"] = "CBM_salesvol/cbm_past_sales";
$route["cbm_js_date_pastvol/(:num)/(:num)"] = "CBM_salesvol/cbm_js_date_pastvol/$1/$2";
$route["cbm_js_pastvol_form"] = "CBM_salesvol/cbm_js_pastvol_form";

$route["cbm_factory_sel"] = "CBM_salesvol/cbm_factory_sel";
$route["cbm_prod_sel/(:num)"] = "CBM_salesvol/cbm_prod_sel/$1";
$route["cbm_view_chart/(:num)/(:num)/(:num)"] = "CBM_salesvol/cbm_view_chart/$1/$2/$3";

$route["cbm_user_data"] = "CBM_salesvol/cbm_user_data";
$route["cbm_user_data/(:num)"] = "CBM_salesvol/cbm_user_data/$1";
$route["cbm_add_new_user"] = "CBM_salesvol/cbm_add_new_user";
$route["cbm_edit_user"] = "CBM_salesvol/cbm_edit_user";

$route["cbm_product_setting"] = "CBM_salesvol/cbm_product_setting";
$route["cbm_product_setting/(:num)"] = "CBM_salesvol/cbm_product_setting/$1";
$route["cbm_add_new_prod"] = "CBM_salesvol/cbm_add_new_prod";
$route["cbm_edit_prod"] = "CBM_salesvol/cbm_edit_prod";

$route["cbm_used_product"] = "CBM_salesvol/cbm_used_product";
$route["cbm_used_product/(:num)"] = "CBM_salesvol/cbm_used_product/$1";
$route["cbm_add_new_used"] = "CBM_salesvol/cbm_add_new_used";
$route["cbm_del_used_prod"] = "CBM_salesvol/cbm_del_used_prod";

$route["cbm_allchart"] = "CBM_salesvol/cbm_allchart";

$route["cbm_test"] = "CBM_salesvol/test1";
//SRMI REQUEST
$route["srmi_view_chart/(:num)/(:any)"] = "CBM_salesvol/srmi_view_chart/$1/$2";
$route["srmi_view_chartv2/(:any)/(:any)/(:any)"] = "CBM_salesvol/srmi_view_chartv2/$1/$2/$3";
$route["srmi_all_chart"] = "CBM_salesvol/srmi_all_chart";
$route["srmi_all_chartv2"] = "CBM_salesvol/srmi_all_chartv2";
$route["get_srmi_mtd/(:num)"] = "CBM_salesvol/get_srmi_mtd/$1";
$route["get_srmi_mtdv2/(:any)"] = "CBM_salesvol/get_srmi_mtdv2/$1"; 
$route["srmi_input_data"] = "CBM_salesvol/srmi_input_data";
$route["cbm_ajax_srmi/(:num)/(:any)"] = "CBM_salesvol/cbm_ajax_srmi/$1/$2";
$route["srmi_daily_record"] = "CBM_salesvol/srmi_daily_record";
$route["srmivolrec"] = "srmi_vol/srmivolrec";
$route["srmivol"] = "srmi_vol/srmivol";

$route["line_srmi"] = "CBM_line/line_srmi_all_chartv2";
$route["line_srmi_view_chartv2/(:any)/(:any)/(:any)"] = "CBM_line/line_srmi_view_chartv2/$1/$2/$3";
$route["line_get_srmi_mtdv2/(:any)"] = "CBM_line/line_get_srmi_mtdv2/$1"; 
$route["line_get_srmi_mtd/(:any)"] = "CBM_line/line_get_srmi_mtd/$1"; 

$route["line_srmi_map/(:any)/(:any)"] = "CBM_line/line_srmi_map/$1/$2";
//LINE

$route["renew_sum_forecast"] = "CBM_line/renew_sum_forecast";
$route["set_sum_forecast/(:any)"] = "CBM_line/set_sum_forecast/$1";
$route["set_sum_forecast"] = "CBM_line/set_sum_forecast";

$route["cbmsalesvol"] = "CBM_line/cbmsalesvol";
$route["cbmsales_report"] = "CBM_line/cbmsales_report";
$route["cbm_view_chart_line/(:num)/(:num)/(:num)"] = "CBM_line/cbm_view_chart_line/$1/$2/$3";
$route["cbmsales_reportv2"] = "CBM_line/cbmsales_reportv2";
$route["cbmsales_reportv2/(:any)"] = "CBM_line/cbmsales_reportv2/$1";
$route["cbm_view_chart_linev2/(:num)/(:num)/(:num)"] = "CBM_line/cbm_view_chart_linev2/$1/$2/$3";

//UPCOMING APP
$route['sr_view'] = 'sr_main/sr_view';

//for testing only
$route['test'] = 'testhere/test';
$route['test/(:num)'] = 'testhere/test/($1)';
$route['update_target'] = 'testhere/update_target';
$route['update_iot_confs'] = 'testhere/update_iot_confs';
$route['trial'] = 'trial/trial';
$route['update'] = 'trial/update';
$route['edit'] = 'trial/edit';
$route['delete'] = 'trial/delete';

$route['excel_srmi'] = 'CBM_salesvol/excel_srmi';
$route['form_srmi'] = 'CBM_salesvol/form_srmi';
$route['import_srmi'] = 'CBM_salesvol/import_srmi';


// XX TRIAL
$route['x_workplacelist'] = 'xtrial/workplacelist';
$route['addworkplace'] = 'xtrial/addworkplace';
$route['editworkplace'] = 'xtrial/editworkplace';
$route['delworkplace'] = 'xtrial/delworkplace';
$route['memberlist'] = 'xtrial/memberlist';
$route['addmember_page'] = 'xtrial/addmember_page';
$route['addmember'] = 'xtrial/addmember';
$route['editmember_page/(:num)'] = 'xtrial/editmember_page/$1';
$route['editmember'] = 'xtrial/editmember';
$route['delmember'] = 'xtrial/delmember';
$route['transaksi_rcm'] = 'xtrial/transaksi_rcm';
$route['transaksi_rcm/(:num)'] = 'xtrial/transaksi_rcm/$1';
$route['x_ajax_user/(:num)'] = 'xtrial/x_ajax_user/$1';
$route['open_new_x_issue/(:num)'] = 'xtrial/open_new_x_issue/$1';
$route['add_new_x_issue'] = 'xtrial/add_new_x_issue';
$route['x_histrans/(:num)'] = 'xtrial/x_histrans/$1';
$route['boxbayar/(:num)'] = 'xtrial/boxbayar/$1';
$route['bayar_x_issue'] = 'xtrial/bayar_x_issue';
$route['convertidr/(:num)'] = 'xtrial/convertidr/$1';
$route['kasbon'] = 'xtrial/kasbon';
$route['kasbon/(:num)'] = 'xtrial/kasbon/$1';
$route['x_hiskasbon/(:num)'] = 'xtrial/x_hiskasbon/$1';
$route['buat_kasbon'] = 'xtrial/buat_kasbon';
$route['bayar_kasbon_id'] = 'xtrial/bayar_kasbon_id';
$route['hismember_page/(:num)'] = 'xtrial/hismember_page/$1';

$route['x_ajax_dash'] = 'xtrial/x_ajax_dash';

$route['rep_pinjaman'] = 'xtrial/rep_pinjaman';
$route['rep_pinjaman/(:num)'] = 'xtrial/rep_pinjaman/$1';
$route['rep_kasbon'] = 'xtrial/rep_kasbon';
$route['rep_kasbon/(:num)'] = 'xtrial/rep_kasbon/$1';

$route['cash_flow/(:any)'] = 'xtrial/cash_flow/$1';
$route['user_img/(:num)'] = 'xtrial/user_img/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
