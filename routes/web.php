<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        
    //TEST TICKET GENERATOR
    Route::get('/ticket', [App\Http\Controllers\TicketController::class, 'Ticket'])->name('ticket');
    Route::get('/allTicket', [App\Http\Controllers\TicketController::class, 'allTicket'])->name('allTicket');
    Route::post('/addTicket', [App\Http\Controllers\TicketController::class, 'addTicket'])->name('addTicket');
      
  
//No Login
Route::get('/carikaryawan/{nip}', [App\Http\Controllers\TransKaryawanController::class, 'carikaryawan'])->name('carikaryawan');
 


Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/kamera', function () {
    return view('testkamera');
});
// cek loggin user unutk ajax
Route::get('/auth/check', function () {
    return (Auth::check()) ? True : False;
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cari', [App\Http\Controllers\DepartementController::class, 'searchDepartement'])->name('autocomplete');
  
// autocomplete  searchDepartement
// 
Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'calendar'])->name('calendar');
 
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::get('/getDepartementByDivisi/{id}', [App\Http\Controllers\DepartementController::class, 'getDepartementByDivisi'])->name('getDepartementByDivisi');
    Route::get('/getUserByDepartemen/{departemen}', [App\Http\Controllers\UserController::class, 'getUserByDepartemen'])->name('getUserByDepartemen');

});

Route::group(['middleware' => ['permission:admin|dev']], function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->name('user');
    Route::post('/addUser', [App\Http\Controllers\UserController::class, 'addUser'])->name('addUser');
    Route::get('/getUserById/{id}', [App\Http\Controllers\UserController::class, 'getUserById'])->name('getUserById');
    Route::get('/getUserByUserId/{id}', [App\Http\Controllers\UserController::class, 'getUserByUserId'])->name('getUserByUserId');
   
    

    Route::get('/allUser', [App\Http\Controllers\UserController::class, 'allUser'])->name('allUser');
    Route::get('/divisi', [App\Http\Controllers\DivisiController::class, 'divisi'])->name('divisi');
    Route::get('/allDivisi', [App\Http\Controllers\DivisiController::class, 'allDivisi'])->name('allDivisi');
     
    Route::post('/addDivisi', [App\Http\Controllers\DivisiController::class, 'addDivisi'])->name('addDivisi');
    Route::get('/getDivisiById/{id}', [App\Http\Controllers\DivisiController::class, 'getDivisiById'])->name('getDivisiById');
    Route::get('/delDivisi/{id}', [App\Http\Controllers\DivisiController::class, 'delDivisi'])->name('delDivisi');
    
    Route::get('/departement', [App\Http\Controllers\DepartementController::class, 'departement'])->name('departement');
    Route::get('/allDepartement', [App\Http\Controllers\DepartementController::class, 'allDepartement'])->name('allDepartement');
    Route::get('/getDepartementById/{id}', [App\Http\Controllers\DepartementController::class, 'getDepartementById'])->name('getDepartementById');
    Route::post('/addDepartement', [App\Http\Controllers\DepartementController::class, 'addDepartement'])->name('addDepartement');
    Route::get('/delDepartement/{id}', [App\Http\Controllers\DepartementController::class, 'delDepartement'])->name('delDepartement');
 

    
    Route::get('/script', [App\Http\Controllers\ScriptController::class, 'script'])->name('script');
    Route::get('/scriptView/{param}', [App\Http\Controllers\ScriptController::class, 'scriptView'])->name('scriptView');
    Route::get('/scriptController/{param}', [App\Http\Controllers\ScriptController::class, 'scriptController'])->name('scriptController');
    Route::get('/scriptRoute/{param}', [App\Http\Controllers\ScriptController::class, 'scriptRoute'])->name('scriptRoute');

            
    //Make Table
    Route::get('/maketable', [App\Http\Controllers\MakeTableController::class, 'MakeTable'])->name('maketable');
    Route::get('/allMakeTable', [App\Http\Controllers\MakeTableController::class, 'allMakeTable'])->name('allMakeTable');
    Route::post('/addMakeTable', [App\Http\Controllers\MakeTableController::class, 'addMakeTable'])->name('addMakeTable');
    Route::get('/getMakeTableById/{id}', [App\Http\Controllers\MakeTableController::class, 'getMakeTableById'])->name('getMakeTableById');
    Route::get('/delMakeTable/{id}', [App\Http\Controllers\MakeTableController::class, 'delMakeTable'])->name('delMakeTable');
    

            
    //USER ROLE 
    Route::get('/userrole', [App\Http\Controllers\UserRoleController::class, 'UserRole'])->name('userrole');
    Route::get('/allUserRole', [App\Http\Controllers\UserRoleController::class, 'allUserRole'])->name('allUserRole');
    Route::post('/addUserRole', [App\Http\Controllers\UserRoleController::class, 'addUserRole'])->name('addUserRole');
    Route::get('/getUserRoleById/{id}', [App\Http\Controllers\UserRoleController::class, 'getUserRoleById'])->name('getUserRoleById');
    Route::get('/delUserRole/{id}/{model_id}', [App\Http\Controllers\UserRoleController::class, 'delUserRole'])->name('delUserRole');
    Route::get('/roleByUserId/{id}', [App\Http\Controllers\UserRoleController::class, 'roleByUserId'])->name('roleByUserId');
      
            
    //TEST SCRIP ROLE PERMISSION GENERATOR
    Route::get('/rolepermission', [App\Http\Controllers\RolePermissionController::class, 'RolePermission'])->name('rolepermission');
    Route::get('/allRolePermission', [App\Http\Controllers\RolePermissionController::class, 'allRolePermission'])->name('allRolePermission');
    Route::post('/addRolePermission', [App\Http\Controllers\RolePermissionController::class, 'addRolePermission'])->name('addRolePermission');
    Route::get('/getRolePermissionById/{id}', [App\Http\Controllers\RolePermissionController::class, 'getRolePermissionById'])->name('getRolePermissionById');
    Route::get('/delRolePermission/{id}/{permission}', [App\Http\Controllers\RolePermissionController::class, 'delRolePermission'])->name('delRolePermission');
    
    Route::get('/allPermissionByRole/{id}', [App\Http\Controllers\RolePermissionController::class, 'allPermissionByRole'])->name('allPermissionByRole');
     
            
    //TEST JENIS TRAINING SCRIP GENERATOR
    Route::get('/jenistraining', [App\Http\Controllers\JenisTrainingController::class, 'JenisTraining'])->name('jenistraining');
    Route::get('/allJenisTraining', [App\Http\Controllers\JenisTrainingController::class, 'allJenisTraining'])->name('allJenisTraining');
    Route::post('/addJenisTraining', [App\Http\Controllers\JenisTrainingController::class, 'addJenisTraining'])->name('addJenisTraining');
    Route::get('/getJenisTrainingById/{id}', [App\Http\Controllers\JenisTrainingController::class, 'getJenisTrainingById'])->name('getJenisTrainingById');
    Route::get('/delJenisTraining/{id}', [App\Http\Controllers\JenisTrainingController::class, 'delJenisTraining'])->name('delJenisTraining');
        
    
    });
    

Route::group(['middleware' => ['permission:admin|dev|group1|user']], function () {
    //EXAMPLE CONTOH
    Route::get('/autocomplete', [App\Http\Controllers\ContohController::class, 'autocomplete'])->name('autocomplete');
    Route::get('/cari', [App\Http\Controllers\ContohController::class, 'cariData'])->name('cari');
    Route::get('/uploadfile', [App\Http\Controllers\ContohController::class, 'uploadfile'])->name('uploadfile');
    Route::post('/uploadfile_proses', [App\Http\Controllers\ContohController::class, 'uploadfileProses'])->name('uploadfileProses');
    Route::get('/deletefile/{id}', [App\Http\Controllers\ContohController::class, 'deletefile'])->name('deletefile');

    Route::get('/email', [App\Http\Controllers\ContohController::class, 'email'])->name('email');
    Route::post('/kirimemail', [App\Http\Controllers\ContohController::class, 'kirimemail'])->name('kirimemail');
   
    
    



    //TEST SCRIP GENERATOR
    Route::get('/testscrip', [App\Http\Controllers\TestScripController::class, 'TestScrip'])->name('testscript');
    Route::get('/allTestScrip', [App\Http\Controllers\TestScripController::class, 'allTestScrip'])->name('allTestScrip');
    Route::post('/addTestScrip', [App\Http\Controllers\TestScripController::class, 'addTestScrip'])->name('addTestScrip');
    Route::get('/getTestScripById/{id}', [App\Http\Controllers\TestScripController::class, 'getTestScripById'])->name('getTestScripById');
    Route::get('/delTestScrip/{id}', [App\Http\Controllers\TestScripController::class, 'delTestScrip'])->name('delTestScrip');
            
    //TEST SCRIP GENERATOR Project
    Route::get('/project', [App\Http\Controllers\ProjectController::class, 'Project'])->name('project');
    Route::get('/allProject', [App\Http\Controllers\ProjectController::class, 'allProject'])->name('allProject');
    Route::post('/addProject', [App\Http\Controllers\ProjectController::class, 'addProject'])->name('addProject');
    Route::get('/getProjectById/{id}', [App\Http\Controllers\ProjectController::class, 'getProjectById'])->name('getProjectById');
    Route::get('/delProject/{id}', [App\Http\Controllers\ProjectController::class, 'delProject'])->name('delProject');
    Route::get('/projectByDivAndDept', [App\Http\Controllers\ProjectController::class, 'projectByDivAndDept'])->name('projectByDivAndDept');
    Route::get('/projectByDivAndDeptAndStatus/{id}', [App\Http\Controllers\ProjectController::class, 'projectByDivAndDeptAndStatus'])->name('projectByDivAndDeptAndStatus');
   
    
    
    //TEST SCRIP GENERATOR delProjectActivityAct
    Route::get('/projectactivity', [App\Http\Controllers\ProjectActivityController::class, 'ProjectActivity'])->name('projectactivity');
    Route::get('/allProjectActivity', [App\Http\Controllers\ProjectActivityController::class, 'allProjectActivity'])->name('allProjectActivity');
    Route::post('/addProjectActivity', [App\Http\Controllers\ProjectActivityController::class, 'addProjectActivity'])->name('addProjectActivity');
    Route::get('/getProjectActivityById/{id}', [App\Http\Controllers\ProjectActivityController::class, 'getProjectActivityById'])->name('getProjectActivityById');
    Route::get('/delProjectActivity/{id}', [App\Http\Controllers\ProjectActivityController::class, 'delProjectActivity'])->name('delProjectActivity');
    Route::get('/projectActivityByProject/{kd_project}', [App\Http\Controllers\ProjectActivityController::class, 'projectActivityByProject'])->name('projectActivityByProject');
    Route::get('/delProjectActivityAct/{id}', [App\Http\Controllers\ProjectActivityController::class, 'delProjectActivityAct'])->name('delProjectActivityAct');
  

    Route::get('/program', [App\Http\Controllers\Rep01Controller::class, 'getProgram'])->name('program');
    Route::get('/skill/{program}/{th}', [App\Http\Controllers\Rep01Controller::class, 'getSkillByProgram'])->name('skill');
    Route::get('/modul/{program}/{skill}', [App\Http\Controllers\Rep01Controller::class, 'getmodulBySkill'])->name('modul');
    Route::get('/skillnoth/{program}', [App\Http\Controllers\Rep01Controller::class, 'getSkillByProgramNoTh'])->name('getSkillByProgramNoTh');
  

    
    Route::get('/modulmember/{program}/{skill}/{modul}', [App\Http\Controllers\Rep01Controller::class, 'getUserByModul'])->name('modulmember');
    
    Route::get('/skillbyprogram/{program}/', [App\Http\Controllers\TransGleadsSkillController::class, 'getTransGleadsSkillbyProgram'])->name('getTransGleadsSkillbyProgram');
   
    Route::get('/program', [App\Http\Controllers\Rep01Controller::class, 'getProgram'])->name('program');
   
    
    //ITEMsACTION SCRIP GENERATOR
    Route::get('/itemsaction', [App\Http\Controllers\ItemsActionController::class, 'ItemsAction'])->name('itemsaction');
    Route::get('/allItemsAction', [App\Http\Controllers\ItemsActionController::class, 'allItemsAction'])->name('allItemsAction');
    Route::post('/addItemsAction', [App\Http\Controllers\ItemsActionController::class, 'addItemsAction'])->name('addItemsAction');
    Route::get('/getItemsActionById/{id}', [App\Http\Controllers\ItemsActionController::class, 'getItemsActionById'])->name('getItemsActionById');
    Route::get('/delItemsAction/{id}', [App\Http\Controllers\ItemsActionController::class, 'delItemsAction'])->name('delItemsAction');
    
    
    //TEST SCRIP GENERATOR
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'Item'])->name('item');
    Route::get('/allItem', [App\Http\Controllers\ItemController::class, 'allItem'])->name('allItem');
    Route::post('/addItem', [App\Http\Controllers\ItemController::class, 'addItem'])->name('addItem');
    Route::get('/getItemById/{id}', [App\Http\Controllers\ItemController::class, 'getItemById'])->name('getItemById');
    Route::get('/delItem/{id}', [App\Http\Controllers\ItemController::class, 'delItem'])->name('delItem');
    Route::get('/getItemByUser/{user}', [App\Http\Controllers\ItemController::class, 'getItemByUser'])->name('getItemByUser');
    
    Route::get('/usulan', [App\Http\Controllers\UsulanController::class, 'usulan'])->name('usulan');
    Route::get('/allUsulan', [App\Http\Controllers\UsulanController::class, 'allUsulan'])->name('allUsulan');
    Route::get('/getUsulanById/{id}', [App\Http\Controllers\UsulanController::class, 'getUsulanById'])->name('getUsulanById');
    Route::post('/addUsulan', [App\Http\Controllers\UsulanController::class, 'addUsulan'])->name('addUsulan');
    Route::get('/delUsulan/{id}', [App\Http\Controllers\UsulanController::class, 'delUsulan'])->name('delUsulan');
    Route::get('/usulanByStatus/{status}', [App\Http\Controllers\UsulanController::class, 'usulanByStatus'])->name('usulanByStatus');
   

    // Report

    Route::get('/rep01', [App\Http\Controllers\Rep01Controller::class, 'rep01'])->name('rep01');
    
    Route::get('/repUserTraining', [App\Http\Controllers\RepUserTrainingController::class, 'repUserTraining'])->name('repUserTraining');
    Route::get('/getTrainingByUser/{nik}', [App\Http\Controllers\RepUserTrainingController::class, 'getTrainingByUser'])->name('getTrainingByUser');
    Route::get('/cetakUserTraining/{nik}', [App\Http\Controllers\RepUserTrainingController::class, 'cetakUserTraining'])->name('cetakUserTraining');
  
    Route::get('/repUsulan', [App\Http\Controllers\RepUsulanController::class, 'RepUsulan'])->name('RepUsulan');
   
    
    
        //TEST SCRIP GENERATOR
        Route::get('/desaintraining', [App\Http\Controllers\DesainTrainingController::class, 'DesainTraining'])->name('desaintraining');
        Route::get('/allDesainTraining', [App\Http\Controllers\DesainTrainingController::class, 'allDesainTraining'])->name('allDesainTraining');
        Route::post('/addDesainTraining', [App\Http\Controllers\DesainTrainingController::class, 'addDesainTraining'])->name('addDesainTraining');
        Route::get('/getDesainTrainingById/{id}', [App\Http\Controllers\DesainTrainingController::class, 'getDesainTrainingById'])->name('getDesainTrainingById');
        Route::get('/delDesainTraining/{id}', [App\Http\Controllers\DesainTrainingController::class, 'delDesainTraining'])->name('delDesainTraining');
        Route::get('/cetakDesainTraining/{id}', [App\Http\Controllers\DesainTrainingController::class, 'cetakDesainTraining'])->name('cetakDesainTraining');
     
        
        // Route::get('/role', [App\Http\Controllers\RoleController::class, 'role'])->name('role');
        // Route::get('/allrole', [App\Http\Controllers\RoleController::class, 'allrole'])->name('allrole');
                
        //TEST SCRIP GENERATOR ROLE
        Route::get('/role', [App\Http\Controllers\RoleController::class, 'Role'])->name('role');
        Route::get('/allRole', [App\Http\Controllers\RoleController::class, 'allRole'])->name('allRole');
        Route::post('/addRole', [App\Http\Controllers\RoleController::class, 'addRole'])->name('addRole');
        Route::get('/getRoleById/{id}', [App\Http\Controllers\RoleController::class, 'getRoleById'])->name('getRoleById');
        Route::get('/delRole/{id}', [App\Http\Controllers\RoleController::class, 'delRole'])->name('delRole');
        
        
        //TEST SCRIP GENERATOR PERMISSION
        Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'Permission'])->name('permission');
        Route::get('/allPermission', [App\Http\Controllers\PermissionController::class, 'allPermission'])->name('allPermission');
        Route::post('/addPermission', [App\Http\Controllers\PermissionController::class, 'addPermission'])->name('addPermission');
        Route::get('/getPermissionById/{id}', [App\Http\Controllers\PermissionController::class, 'getPermissionById'])->name('getPermissionById');
        Route::get('/delPermission/{id}', [App\Http\Controllers\PermissionController::class, 'delPermission'])->name('delPermission');
        



                
        //TEST SCRIP GENERATOR
        Route::get('/gleadsmodul', [App\Http\Controllers\GleadsModulController::class, 'GleadsModul'])->name('gleadsmodul');
        Route::get('/allGleadsModul', [App\Http\Controllers\GleadsModulController::class, 'allGleadsModul'])->name('allGleadsModul');
        Route::post('/addGleadsModul', [App\Http\Controllers\GleadsModulController::class, 'addGleadsModul'])->name('addGleadsModul');
        Route::get('/getGleadsModulById/{id}', [App\Http\Controllers\GleadsModulController::class, 'getGleadsModulById'])->name('getGleadsModulById');
        Route::get('/delGleadsModul/{id}', [App\Http\Controllers\GleadsModulController::class, 'delGleadsModul'])->name('delGleadsModul');
        Route::get('/getGleadsModulByProgram/{program}', [App\Http\Controllers\GleadsModulController::class, 'getModulByProgram'])->name('getGleadsModulByProgram');
      
        Route::get('/gleadsmodul/{program}', [App\Http\Controllers\GleadsModulController::class, 'GleadsModulProgram'])->name('GleadsModulProgram');
      
        

                
        //DOKUMEN SCRIP GENERATOR
        Route::get('/dokumenlink', [App\Http\Controllers\DokumenLinkController::class, 'DokumenLink'])->name('dokumenlink');
        Route::get('/allDokumenLink', [App\Http\Controllers\DokumenLinkController::class, 'allDokumenLink'])->name('allDokumenLink');
        Route::post('/addDokumenLink', [App\Http\Controllers\DokumenLinkController::class, 'addDokumenLink'])->name('addDokumenLink');
        Route::get('/getDokumenLinkById/{id}', [App\Http\Controllers\DokumenLinkController::class, 'getDokumenLinkById'])->name('getDokumenLinkById');
        Route::get('/delDokumenLink/{id}', [App\Http\Controllers\DokumenLinkController::class, 'delDokumenLink'])->name('delDokumenLink');
        Route::get('/dokumenLinkByCriteria/{criteria}', [App\Http\Controllers\DokumenLinkController::class, 'dokumenLinkByCriteria'])->name('dokumenLinkByCriteria');
        


        Route::get('/changepassword', [App\Http\Controllers\ChangePasswordController::class, 'changepassword'])->name('changepassword');
        Route::get('/allChangePassword', [App\Http\Controllers\ChangePasswordController::class, 'allChangePassword'])->name('allChangePassword');
        Route::get('/getUserlogin', [App\Http\Controllers\ChangePasswordController::class, 'getUserlogin'])->name('getUserlogin');
        Route::post('/addChangePassword', [App\Http\Controllers\ChangePasswordController::class, 'addChangePassword'])->name('addChangePassword');

                
        //TEST EVENT KALENDAR GENERATOR
        Route::get('/event', [App\Http\Controllers\EventController::class, 'Event'])->name('event');
        Route::get('/allEvent', [App\Http\Controllers\EventController::class, 'allEvent'])->name('allEvent');
        Route::post('/addEvent', [App\Http\Controllers\EventController::class, 'addEvent'])->name('addEvent');
        Route::get('/getEventById/{id}', [App\Http\Controllers\EventController::class, 'getEventById'])->name('getEventById');
        Route::get('/delEvent/{id}', [App\Http\Controllers\EventController::class, 'delEvent'])->name('delEvent');
        

                
        //TEST JOB FAMILY GENERATOR
        Route::get('/jobfamily', [App\Http\Controllers\JobFamilyController::class, 'JobFamily'])->name('jobfamily');
        Route::get('/allJobFamily', [App\Http\Controllers\JobFamilyController::class, 'allJobFamily'])->name('allJobFamily');
        Route::post('/addJobFamily', [App\Http\Controllers\JobFamilyController::class, 'addJobFamily'])->name('addJobFamily');
        Route::get('/getJobFamilyById/{id}', [App\Http\Controllers\JobFamilyController::class, 'getJobFamilyById'])->name('getJobFamilyById');
        Route::get('/delJobFamily/{id}', [App\Http\Controllers\JobFamilyController::class, 'delJobFamily'])->name('delJobFamily');
        

        Route::get('/getTicketById/{id}', [App\Http\Controllers\TicketController::class, 'getTicketById'])->name('getTicketById');
        Route::get('/delTicket/{id}', [App\Http\Controllers\TicketController::class, 'delTicket'])->name('delTicket');
          
        Route::get('/tickethandle', [App\Http\Controllers\TicketController::class, 'TicketHadle'])->name('tickethandle');
 
        //GELADS -PROGRAM
      
        Route::get('/transgleadsprogram', [App\Http\Controllers\TransGleadsProgramController::class, 'TransGleadsProgram'])->name('transgleadsprogram');
        Route::get('/allTransGleadsProgram', [App\Http\Controllers\TransGleadsProgramController::class, 'allTransGleadsProgram'])->name('allTransGleadsProgram');
        Route::post('/addTransGleadsProgram', [App\Http\Controllers\TransGleadsProgramController::class, 'addTransGleadsProgram'])->name('addTransGleadsProgram');
        Route::get('/getTransGleadsProgramById/{id}', [App\Http\Controllers\TransGleadsProgramController::class, 'getTransGleadsProgramById'])->name('getTransGleadsProgramById');
        Route::get('/delTransGleadsProgram/{id}', [App\Http\Controllers\TransGleadsProgramController::class, 'delTransGleadsProgram'])->name('delTransGleadsProgram');
        
        
        //GELADS -SKILL
        Route::get('/transgleadsskill', [App\Http\Controllers\TransGleadsSkillController::class, 'TransGleadsSkill'])->name('transgleadsskill');
        Route::get('/allTransGleadsSkill', [App\Http\Controllers\TransGleadsSkillController::class, 'allTransGleadsSkill'])->name('allTransGleadsSkill');
        Route::post('/addTransGleadsSkill', [App\Http\Controllers\TransGleadsSkillController::class, 'addTransGleadsSkill'])->name('addTransGleadsSkill');
        Route::get('/getTransGleadsSkillById/{id}', [App\Http\Controllers\TransGleadsSkillController::class, 'getTransGleadsSkillById'])->name('getTransGleadsSkillById');
        Route::get('/delTransGleadsSkill/{id}', [App\Http\Controllers\TransGleadsSkillController::class, 'delTransGleadsSkill'])->name('delTransGleadsSkill');
        
        Route::get('/getAllDivisi', [App\Http\Controllers\DivisiController::class, 'getAllDivisi'])->name('getAllDivisi');
        Route::get('/getDivisiByGroup', [App\Http\Controllers\DivisiController::class, 'getDivisiByGroup'])->name('getDivisiByGroup');
      
        
});