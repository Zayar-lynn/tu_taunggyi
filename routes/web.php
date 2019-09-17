<?php
use Illuminate\Support\Facades\Auth;

Route::get('/','Controller@index');

Route::get('/admission-form',function(){
  return view('');
});
Route::get('/academics','AcademicController@index');

Route::get('/research','Controller@research');

Route::get('/contact','Controller@contact');
Route::get('/blog','BlogController@show_blog');
Route::get('/blog_detail/{id}','BlogController@blog_detail');

Route::get('/blog-post',function(){
  return view('user.blog-post');
});
Route::get('/events','EventController@show_event');

Route::get('/course-detail',function(){
  return view('user.course-detail');
});

Route::get('/login','Controller@show_login');

Route::post('/login','Controller@login');

// Route::get('/campus-life',function(){
//   return view('user.campus-life');
// });
Route::get('/our-departments','Controller@showDepartment');
Route::get('/show_data_detail/{id}','Controller@showDepartDetail');
Route::get('/dep_post_detail/{id}','Controller@dep_post_detail');

Route::get('/teachers-single/{id}','Controller@singleTeacher');
// Route::get('/gallery',function(){
//   return view('user.gallery');
// });
Route::get('/about','Controller@about');
Route::get('/admin',function (){
    return redirect('login');
});

Route::get('/our_teacher','Controller@our_teacher');

Route::get('/course','CourseController@show_course');
Route::get('/show_course_detail/{id}','CourseController@show_course_detail');
Route::get('galley','Controller@galleryData');

Route::post('/insert_contact','ContactController@store');

Route::get('/get_all_about','AboutController@get_all_about');
Route::get('/get_all_research_data','ResearchController@get_all_research');

// ----------------------------------------------------

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin/',function(){
//    return view('admin.site_admin.dashboard')->with(['url'=>'dashboard']);
// });
Route::get('logout','Auth\LoginController@logout')->middleware('auth');

Route::group(['middleware'=>['auth','admin']],function(){
  Route::get('/admin/company_profile',function(){
      return view('admin.site_admin.company_profile')->with(['url'=>'company_profile']);
  });
  // event
  Route::get('/admin/event','EventController@index');
  Route::post('/insert/event','EventController@store');
  Route::post('/get_all_event','EventController@get_all_event');
  Route::post('/delete/event/{id}','EventController@destroy');
  Route::post('/edit/event/{id}','EventController@edit');
  Route::post('/update/event','EventController@update');

// blog
  Route::get('/admin/blog','BlogController@index');
  Route::post('/insert/blog','BlogController@store');
  Route::post('/get_all_blog','BlogController@get_all_blog');
  Route::post('/delete/blog/{id}','BlogController@destroy');
  Route::post('/edit/blog/{id}','BlogController@edit');
  Route::post('/update/blog','BlogController@update');

  // department_post
  Route::get('/admin/department_post','DepartmentPostController@index');
  Route::post('/insert/department_post','DepartmentPostController@store');
  Route::post('/get_all_department_post','DepartmentPostController@get_all_department_post');
  Route::post('/delete/department_post/{id}','DepartmentPostController@destroy');
  Route::post('/edit/department_post/{id}','DepartmentPostController@edit');
  Route::post('/update/department_post','DepartmentPostController@update');
  Route::get('/admin/department_post/detail/{id}','DepartmentPostController@detail_department_post');

// teacher
  Route::get('/admin/teacher','TeacherController@index');
  Route::post('/insert/teacher','TeacherController@store');
  Route::get('/get_all_teacher','TeacherController@get_all_teacher');
  Route::delete('/delete/teacher/{id}','TeacherController@destroy');
  Route::get('/edit/teacher/{id}','TeacherController@edit');
  Route::post('/update/teacher','TeacherController@update');
  Route::get('/admin/teacher/detail/{id}','TeacherController@detail_teacher');

// deparment
  Route::get('/admin/department','AdminController@show_department');
  Route::post('/insert/department','DepartmentController@store');
  Route::get('/get_all_department','DepartmentController@get_all_department');
  Route::delete('/delete/department/{id}','DepartmentController@destroy');
  Route::get('/edit/department/{id}','DepartmentController@edit');
  Route::post('/update/department','DepartmentController@update');

// course
  Route::get('/admin/course','CourseController@index');
  Route::post('/insert/course','CourseController@store');
  Route::post('/get_all_course','CourseController@get_all_course');
  Route::post('/delete/course/{id}','CourseController@destroy');
  Route::post('/edit/course/{id}','CourseController@edit');
  Route::post('/update/course','CourseController@update');

// gallery
  Route::get('/admin/gallery','GalleryController@index');

// contact
  Route::get('/admin/contact','ContactController@index');
  Route::post('/get_all_contact','ContactController@get_all_contact');
  Route::post('/delete/contact/{id}','ContactController@destroy');

  // about
  Route::get('/admin/about','AboutController@index');
  Route::post('/get_all_about','AboutController@get_all_about');
  Route::post('/update/about','AboutController@update');

  // research
  Route::get('/admin/research','ResearchController@index');
  Route::post('/insert/research','ResearchController@store');
  Route::post('/get_all_research','ResearchController@get_all_research');
  Route::post('/delete/research/{id}','ResearchController@destroy');
  Route::post('/edit/research/{id}','ResearchController@edit');
  Route::post('/update/research','ResearchController@update');

  // major_admin
  Route::get('/admin/major_admin','MajorRegisterController@index');
  Route::post('/insert/major_admin','MajorRegisterController@majorregister');
  Route::post('/get_all_major_admin','MajorRegisterController@get_all_major_admin');
  Route::post('/delete/major_admin/{id}','MajorRegisterController@destroy');
  Route::post('/edit/major_admin/{id}','MajorRegisterController@edit');
  Route::post('/update/major_admin','MajorRegisterController@update');

  // mkkk
  Route::post('image_upload','GalleryController@store');
  Route::get('admin/gallery_data','GalleryController@getImageData');
  Route::get('gallery/edit/{id}','GalleryController@editImage');
  Route::post('image_upload/update','GalleryController@updateImage');
  Route::delete('image/delete/{id}','GalleryController@deleteImage');

  // intro text
  Route::get('/admin/intro','IntroController@index');
  Route::post('/get_intro_text','IntroController@get_intro_text');
  Route::post('/update/intro_text','IntroController@update');

  // finished student
  Route::get('/admin/finishedstudent','StudentController@show_finished_student');
  Route::post('/insert/finish_student','StudentController@insert_finished_student');
  Route::post('/get_all_finished_student','StudentController@get_all_finished_student');
  Route::post('/edit/finished_student/{id}','StudentController@edit_finished_student');
  Route::post('/update/finished_student','StudentController@update_finished_student');

  // currant student
  Route::get('/admin/currantstudent','StudentController@show_currant_student');
  Route::post('/insert/currant_student','StudentController@insert_currant_student');
  Route::post('get_all_currant_student','StudentController@get_all_currant_student');
  Route::post('/edit/currant_student/{id}','StudentController@edit_currant_student');
  Route::post('/update/currant_student','StudentController@update_currant_student');

  // our partner company
  Route::get('/admin/ourpartnercompany','OurpartnerController@index');
  Route::post('/insert/ourpartner','OurpartnerController@store');
  Route::post('/get_all_ourpartner','OurpartnerController@get_all_ourpartner');
  Route::post('/edit/ourpartner/{id}','OurpartnerController@edit');
  Route::post('/update/ourpartner','OurpartnerController@update');
  Route::post('/delete/ourpartner/{id}','OurpartnerController@destroy');

});
Route::get('/get_all_department','DepartmentController@get_all_department');


// testing

Route::group(['middleware'=>['auth','role']],function(){
  // Route::get('/major',function(){
  //   return view('admin.major_admin.event')->with(['url'=>'event']);
  // });

  // event
  Route::get('/major/event','MajorEventController@index');
  Route::post('/major/insert/event','MajorEventController@store');
  Route::post('/get_all_major_event','MajorEventController@get_all_major_event');
  Route::post('/major/delete/event/{id}','MajorEventController@destroy');
  Route::post('/major/edit/event/{id}','MajorEventController@edit');
  Route::post('/major/update/event','MajorEventController@update');
  Route::get('/major/event/detail/{id}','MajorEventController@detail_event');

  // blog
  Route::get('/major/blog','MajorBlogController@index');
  Route::post('/major/insert/blog','MajorBlogController@store');
  Route::post('/get_all_major_blog','MajorBlogController@get_all_major_blog');
  Route::post('/major/delete/blog/{id}','MajorBlogController@destroy');
  Route::post('/major/edit/blog/{id}','MajorBlogController@edit');
  Route::post('/major/update/blog','MajorBlogController@update');
  Route::get('/major/blog/detail/{id}','MajorBlogController@detail_blog');

  // course
  Route::get('/major/course','MajorCourseController@index');
  Route::post('/major/insert/course','MajorCourseController@store');
  Route::post('/get_all_major_course','MajorCourseController@get_all_major_course');
  Route::post('/major/delete/course/{id}','MajorCourseController@destroy');
  Route::post('/major/edit/course/{id}','MajorCourseController@edit');
  Route::post('/major/update/course','MajorCourseController@update');
  Route::get('/major/course/detail/{id}','MajorCourseController@detail_course');

  // video
  Route::get('major/department_video','MajorDepartmentVideoController@index');
  Route::post('/get_department_video','MajorDepartmentVideoController@get_department_video');
  Route::post('/major/update/department_video','MajorDepartmentVideoController@update');

});
