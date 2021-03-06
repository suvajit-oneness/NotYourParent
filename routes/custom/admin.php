<?php

    namespace App\Http\Controllers\Admin;
    use Illuminate\Support\Facades\Route;

    Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('admin.dashboard');

    Route::group(['prefix' => 'article'], function() {
        Route::get('/',[ArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/add',[ArticleController::class, 'create'])->name('admin.article.add');
        Route::post('/store',[ArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/edit/{id}',[ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::put('/update/{id}',[ArticleController::class, 'update'])->name('admin.article.update');
        Route::get('/delete/{id}',[ArticleController::class, 'destroy'])->name('admin.article.delete');
        Route::post('/tag',[ArticleController::class, 'tagStore'])->name('admin.tag.store');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/',[CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/add',[CategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/store',[CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('admin.category.delete');
    });

    Route::group(['prefix' => 'knowledgebank'], function() {
        Route::get('/',[KnowledgebankController::class, 'index'])->name('admin.knowledgebank.index');
        Route::get('/add',[KnowledgebankController::class, 'create'])->name('admin.knowledgebank.add');
        Route::post('/store',[KnowledgebankController::class, 'store'])->name('admin.knowledgebank.store');
        Route::get('/edit/{id}',[KnowledgebankController::class, 'edit'])->name('admin.knowledgebank.edit');
        Route::put('/update/{id}',[KnowledgebankController::class, 'update'])->name('admin.knowledgebank.update');
        Route::get('/delete/{id}',[KnowledgebankController::class, 'destroy'])->name('admin.knowledgebank.delete');
    });

    Route::group(['prefix' => 'course'], function() {
        Route::get('/',[CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/add',[CourseController::class, 'create'])->name('admin.course.add');
        Route::post('/store',[CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('admin.course.edit');
        Route::put('/update/{id}',[CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/delete/{id}',[CourseController::class, 'destroy'])->name('admin.course.delete');
    });

    Route::group(['prefix' => 'settings/contact-us'], function() {
        Route::get('/',[AdminController::class, 'contactUs'])->name('admin.contactUs.index');
        Route::get('/edit/{id}',[AdminController::class, 'editContactUs'])->name('admin.contactUs.edit');
        Route::put('/update/{id}',[AdminController::class, 'updateContactUs'])->name('admin.contactUs.update');
    });

    Route::group(['prefix' => 'faq'], function() {
        Route::get('/',[FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/add',[FaqController::class, 'create'])->name('admin.faq.add');
        Route::post('/store',[FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/edit/{id}',[FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::put('/update/{id}',[FaqController::class, 'update'])->name('admin.faq.update');
        Route::get('/delete/{id}',[FaqController::class, 'destroy'])->name('admin.faq.delete');
    });

    Route::group(['prefix' => 'topic'], function() {
        Route::get('/',[TopicController::class, 'index'])->name('admin.topic.index');
        Route::get('/add',[TopicController::class, 'create'])->name('admin.topic.add');
        Route::post('/store',[TopicController::class, 'store'])->name('admin.topic.store');
        Route::get('/edit/{id}',[TopicController::class, 'edit'])->name('admin.topic.edit');
        Route::put('/update/{id}',[TopicController::class, 'update'])->name('admin.topic.update');
        Route::get('/delete/{id}',[TopicController::class, 'destroy'])->name('admin.topic.delete');
    });

    Route::group(['prefix' => 'language'], function() {
        Route::get('/',[LanguageController::class, 'index'])->name('admin.language.index');
        Route::get('/add',[LanguageController::class, 'create'])->name('admin.language.add');
        Route::post('/store',[LanguageController::class, 'store'])->name('admin.language.store');
        Route::get('/edit/{id}',[LanguageController::class, 'edit'])->name('admin.language.edit');
        Route::put('/update/{id}',[LanguageController::class, 'update'])->name('admin.language.update');
        Route::get('/delete/{id}',[LanguageController::class, 'destroy'])->name('admin.language.delete');
    });

    Route::group(['prefix' => 'testimonial'], function() {
        Route::get('/',[TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('/add',[TestimonialController::class, 'create'])->name('admin.testimonial.add');
        Route::post('/store',[TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('/edit/{id}',[TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::put('/update/{id}',[TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::get('/delete/{id}',[TestimonialController::class, 'destroy'])->name('admin.testimonial.delete');
    });

    Route::group(['prefix' => 'teacher'], function() {
        Route::get('/',[TeacherController::class, 'getAllTeachers'])->name('admin.teacher.index');
        Route::get('/add',[TeacherController::class, 'addNewTeacher'])->name('admin.teacher.add');
        Route::post('/store',[TeacherController::class, 'saveTeacher'])->name('admin.teacher.store');
        Route::get('/edit/{id}',[TeacherController::class, 'editTeacher'])->name('admin.teacher.edit');
        Route::put('/update/{id}',[TeacherController::class, 'updateTeacher'])->name('admin.teacher.update');
        Route::get('/delete/{id}',[TeacherController::class, 'deleteTeacher'])->name('admin.teacher.delete');
        Route::post('/updateStatus',[TeacherController::class, 'updateStatus'])->name('admin.teacher.updateStatus');
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('/',[UserController::class, 'getAllUsers'])->name('admin.user.index');
        Route::get('/students',[UserController::class, 'getAllStudents'])->name('admin.user.students');
        Route::get('/experts',[UserController::class, 'getAllTeachers'])->name('admin.user.teachers');

        Route::get('/create',[CrudController::class,'createUser'])->name('admin.user.create');
		Route::post('/save',[CrudController::class,'saveUser'])->name('admin.user.save');
		Route::post('/manage',[UserController::class,'manageUser'])->name('admin.user.manageUser');

        Route::get('/add',[UserController::class, 'addNewUser'])->name('admin.user.add');
        Route::post('/store',[UserController::class, 'saveUser'])->name('admin.user.store');
        Route::get('/edit/{id}',[UserController::class, 'editUser'])->name('admin.user.edit');
        Route::put('/update/{id}',[UserController::class, 'updateUser'])->name('admin.user.update');
        Route::get('/delete/{id}',[UserController::class, 'deleteUser'])->name('admin.user.delete');
        Route::post('/updateStatus',[UserController::class, 'updateStatus'])->name('admin.user.updateStatus');
    });
    // job post
    Route::group(['prefix' => 'jobcat'], function() {
        Route::get('/',[JobCategoryController::class, 'index'])->name('admin.jobcat.index');
        Route::get('/add',[JobCategoryController::class, 'create'])->name('admin.jobcat.add');
        Route::post('/store',[JobCategoryController::class, 'store'])->name('admin.jobcat.store');
        Route::get('/edit/{id}',[JobCategoryController::class, 'edit'])->name('admin.jobcat.edit');
        Route::put('/update/{id}',[JobCategoryController::class, 'update'])->name('admin.jobcat.update');
        Route::get('/delete/{id}',[JobCategoryController::class, 'destroy'])->name('admin.jobcat.delete');

    });
    Route::group(['prefix' => 'job'], function() {
        Route::get('/',[JobController::class, 'index'])->name('admin.job.index');
        Route::get('/add',[JobController::class, 'create'])->name('admin.job.add');
        Route::post('/store',[JobController::class, 'store'])->name('admin.job.store');
        Route::get('/edit/{id}',[JobController::class, 'edit'])->name('admin.job.edit');
        Route::put('/update/{id}',[JobController::class, 'update'])->name('admin.job.update');
        Route::get('/delete/{id}',[JobController::class, 'destroy'])->name('admin.job.delete');

    });

    Route::group(['prefix' => 'settings'], function() {
        Route::get('/howItWorks',[CrudController::class, 'howToWorkIndex'])->name('admin.howItWorks.index');
        Route::get('/howItWorks/edit/{id}',[CrudController::class, 'howToWorkEdit'])->name('admin.howitworks.edit');
        Route::put('/howItWorks/update/{id}',[CrudController::class, 'howToWorkUpdate'])->name('admin.howItWorks.update');

        Route::get('/aboutUs', [CrudController::class, 'aboutUsIndex'])->name('admin.aboutUs.index');
        Route::get('/aboutUs/edit/{id}',[CrudController::class, 'aboutUsEdit'])->name('admin.aboutUs.edit');
        Route::put('/aboutUs/update/{id}',[CrudController::class, 'aboutUsUpdate'])->name('admin.aboutUs.update');

        Route::get('/terms-and-conditions',[CrudController::class, 'termsAndConditionsIndex'])->name('admin.termsAndConditions.index');
        Route::get('/terms-and-conditions/edit/{id}',[CrudController::class, 'termsAndConditionsEdit'])->name('admin.termsAndConditions.edit');
        Route::put('/terms-and-conditions/update/{id}',[CrudController::class, 'termsAndConditionsUpdate'])->name('admin.termsAndConditions.update');

        Route::get('/privact-policy',[CrudController::class, 'privacyPolicyIndex'])->name('admin.privacyPolicy.index');
        Route::get('/privact-policy/edit/{id}',[CrudController::class, 'privacyPolicyEdit'])->name('admin.privacyPolicy.edit');
        Route::put('/privact-policy/update/{id}',[CrudController::class, 'privacyPolicyUpdate'])->name('admin.privacyPolicy.update');
    });

    // Route::group(['prefix' => 'sessions'], function() {
    //     Route::get('/',[AdminController::class, 'purchasedVideoSessions'])->name('admin.sessions.index');
    // });

    Route::get('referred_to/user/{userId}',[UserController::class,'getReferredToList'])->name('admin.referral.referred_to');
	Route::get('user/points/{userId}',[UserController::class,'getUserPoints'])->name('admin.user.points');
    Route::get('/commission',[AdminController::class, 'getCommission'])->name('admin.commission.index');
    Route::get('/commission/edit/{id}',[AdminController::class, 'editCommission'])->name('admin.commission.edit');
    Route::put('commission/update/{id}',[AdminController::class, 'updateCommission'])->name('admin.commission.update');

?>
