<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- this meta for ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}- @yield('dashboard_bar')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('upload_photos/favicon')}}/{{App\Models\Favicon::first()->favicon_photo}}">
	<link href="{{asset('dashboard')}}/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="{{asset('dashboard')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{asset('dashboard')}}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="{{asset('dashboard')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="{{asset('dashboard')}}/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{asset('dashboard')}}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand-logo">
                <img class="logo-abbr" src="{{asset('upload_photos/logo-photo')}}/{{App\Models\Project_logo::first()->logo_photo}}" alt="">
                {{-- <img class="logo-compact" src="{{asset('dashboard')}}/images/logo-text.png" alt=""> --}}
                <h2 class="brand-title">{{env('APP_NAME')}}</h2>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->
		{{-- <div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">B</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Bashid Samim</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Breddie Ronan</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Ceorge Carson</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">D</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Darry Parker</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Denry Hunter</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">J</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Jack Ronan</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Jacob Tucker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>James Logan</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Joshua Weston</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">O</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oliver Acker</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('dashboard')}}/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dz-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)" class="dz-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="{{asset('dashboard')}}/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">Today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SEVER STATUS</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                {{-- dashboard_bar start here --}}
								@yield('dashboard_bar')
                                {{-- dashboard_bar end here --}}
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">

							{{-- <li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li> --}}

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{asset('upload_photos/profile_photos')}}/{{auth()->user()->profile_photo}}" width="20" alt="not found"/>
									<div class="header-info">
										<span class="text-black"><strong>{{auth()->user()->name}}</strong></span>
										<p class="fs-12 mb-0">Admin</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('profile')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{route('index')}}" target="blank" class="dropdown-item ai-icon">
                                        <i class="fa fa-eye text-primary" aria-hidden="true"></i>
                                        <span class="ml-2">Visite Website </span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="" href="{{route('home')}}" aria-expanded="false">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>

                    {{-- logo and offer folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">Logo And Offer Folder</span>
						</a>
                        <ul aria-expanded="false">
                            {{-- logo here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                <span class="nav-text">Project Logo</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                        $project_logo_id=App\Models\Project_logo::first()->id;
                                    @endphp
                                    <li><a href="{{route('logo.page',$project_logo_id)}}">index</a></li>
                                </ul>
                            </li>
                            {{-- favicon here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                <span class="nav-text">Favicon</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                        $favicon_id=App\Models\Favicon::first()->id;
                                    @endphp
                                    <li><a href="{{route('favicon.page',$favicon_id)}}">index</a></li>
                                </ul>
                            </li>

                            {{-- new offer here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                <span class="nav-text">New Offer</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                        $offer_data_id=App\Models\New_offer::first()->id;
                                    @endphp
                                    <li><a href="{{route('offer.page',$offer_data_id)}}">index</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- home folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">Home Folder</span>
						</a>
                        <ul aria-expanded="false">
                            {{-- Banner here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                <span class="nav-text">Banner</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('banner.create')}}">Create Banner</a></li>
                                    <li><a class="" href="{{route('banner.index')}}" aria-expanded="false">List</a></li>
                                </ul>
                            </li>
                            {{-- Feature here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Feature</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('feature.create')}}">Create</a></li>
                                    <li><a class="" href="{{route('feature.index')}}" aria-expanded="false">List</a></li>
                                </ul>
                            </li>
                            {{-- Product here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Product</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('product.create')}}">Create Product</a></li>
                                    <li><a class="" href="{{route('product.index')}}" aria-expanded="false">Product List</a></li>
                                </ul>
                            </li>
                            {{-- category here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Category</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('category.create')}}">Create Category</a></li>
                                    <li><a class="" href="{{route('category.index')}}" aria-expanded="false">List Category</a></li>
                                </ul>
                            </li>
                            {{-- Subcategory here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Subcategory</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('subcategory.create')}}">Create Subcategory</a></li>
                                    <li><a class="" href="{{route('subcategory.index')}}" aria-expanded="false">List Subcategory</a></li>
                                </ul>
                            </li>
                            {{-- Deal Area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Deal Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('deal_area.create')}}">Create</a></li>
                                    <li><a class="" href="{{route('deal_area.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>
                            {{-- Blog Area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Blog Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('blog_area.create')}}">Create</a></li>
                                    <li><a class="" href="{{route('blog_area.index')}}" aria-expanded="false">Index</a></li>
                                    <li><a class="" href="{{route('social_icon.create')}}" aria-expanded="false">Social Icon Create</a></li>
                                    <li><a class="" href="{{route('blog_comment_data')}}" aria-expanded="false">Blog Comment Data</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- about folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">About Folder</span>
						</a>
                        <ul aria-expanded="false">
                            {{-- Intro Area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Intro Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('intro_area.create')}}">Create</a></li>
                                    <li><a href="{{route('intro_area.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>
                            {{-- service_area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Service Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('service_area.create')}}">Create</a></li>
                                    <li><a href="{{route('service_area.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>
                            {{-- team_area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Team Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('team_area.create')}}">Create</a></li>
                                    <li><a href="{{route('team_area.index')}}" aria-expanded="false">Index</a></li>
                                    <li><a href="{{route('team_social_icon.create')}}" aria-expanded="false">Social Icon Create</a></li>
                                </ul>
                            </li>

                            {{-- feature_area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Feature Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('about_feature.create')}}">Create</a></li>
                                    <li><a href="{{route('about_feature.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>

                            {{-- testimonial_area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Testimonial Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('about_testimonial.create')}}">Create</a></li>
                                    <li><a href="{{route('about_testimonial.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>

                            {{-- Brand_area here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Brand Area</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('about_brand.create')}}">Create</a></li>
                                    <li><a href="{{route('about_brand.index')}}" aria-expanded="false">Index</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- contact folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">Contact Folder</span>
						</a>
                        <ul aria-expanded="false">
                            {{-- contact head here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Contact Head</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                       $contact_head_id=App\Models\Contact_head::first()->id;
                                    @endphp
                                    <li><a href="{{route('contact_head.page',$contact_head_id)}}">Contact Head Update</a></li>
                                </ul>
                            </li>
                            {{-- contact from here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Contact From</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('contact_from_data.show')}}">Contact From Data</a></li>
                                </ul>
                            </li>
                            {{-- contact embed map link here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Embed Map</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                        $contact_link_id=App\Models\Contact_map_link::first()->id;
                                    @endphp
                                    <li><a href="{{route('contact_embed.page',$contact_link_id)}}">Map link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- footer folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">Footer Folder</span>
						</a>
                        <ul aria-expanded="false">
                            {{-- footer describe here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                    <span class="nav-text">Footer Describe</span>
                                </a>
                                <ul aria-expanded="false">
                                    @php
                                       $footer_describe_id=App\Models\Footer_describe::first()->id;
                                    @endphp
                                    <li><a href="{{route('footer_describe_page',$footer_describe_id)}}">Update Describe</a></li>
                                </ul>
                            </li>

                            {{-- footer icon here --}}
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                <span class="nav-text">Social Icon</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="" href="{{route('footer_social_icon.create')}}" aria-expanded="false">Social Icon Create</a></li>
                            </ul>
                        </li>
                        </ul>
                    </li>

                    {{-- others folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-text">Others Folder</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- Shopping Charge Chart here --}}
                            <li>
                                <a class=" ai-icon" href="{{route('shopping')}}" aria-expanded="false">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    <span class="nav-text">Shopping Charge Chart</span>
                                </a>
                            </li>
                            {{-- Orders here --}}
                            <li>
                                <a class=" ai-icon" href="{{route('orders')}}" aria-expanded="false">
                                    <i class="fa fa-file-word-o" aria-hidden="true"></i>
                                    <span class="nav-text">Orders</span>
                                </a>
                            </li>
                            {{-- Generate Coupon here --}}
                            <li>
                                <a class=" ai-icon" href="{{route('coupon')}}" aria-expanded="false">
                                    <i class="fa fa-podcast" aria-hidden="true"></i>
                                    <span class="nav-text">Generate Coupon</span>
                                </a>
                            </li>
                            {{-- Variation Manager here --}}
                            <li>
                                <a class="ai-icon" href="{{route('variation.index')}}" aria-expanded="false">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                    <span class="nav-text">Variation Manager</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- admin info folder here --}}
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-text">Admin Info Folder</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- admin parsonal info here --}}
                            <li>
                                @php
                                    $admin_parsonal_info_id=App\Models\Admin_parsonal_info::first()->id;
                                @endphp
                                <a class=" ai-icon" href="{{route('admin.info',$admin_parsonal_info_id)}}" aria-expanded="false">
                                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                    <span class="nav-text">Admin Parsonal Info</span>
                                </a>
                            </li>
                            {{-- admin & customer account data --}}
                            <li>
                                <a class=" ai-icon" href="{{route('admin_customer_data')}}" aria-expanded="false">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    <span class="nav-text">Account Data(admin & customer)</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            {{-- main content start here --}}
            @yield('content')
            {{-- main content end here --}}
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Developed by <a href="{{route('home')}}">Ahosan Habib</a> {{date('Y')}}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{asset('dashboard')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('dashboard')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{asset('dashboard')}}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{asset('dashboard')}}/js/custom.min.js"></script>
	<script src="{{asset('dashboard')}}/js/deznav-init.js"></script>
	<script src="{{asset('dashboard')}}/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="{{asset('dashboard')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('dashboard')}}/vendor/select2/js/select2.full.min.js"></script>
	<script src="{{asset('dashboard')}}/vendor/chart.js/chart.min.js"></script>
    <script src="{{asset('dashboard')}}/js/icon_custom.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('dashboard')}}/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="{{asset('dashboard')}}/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('dashboard')}}/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>
    {{--js-script content code start here --}}
        @yield('js-script-content')
    {{--js-script content code end here --}}
</body>
</html>
