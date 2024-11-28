<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>UKK Januardi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('style.css') }}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('css/color_2.css') }}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
        *, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

input {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}

      </style>
   </head>
   <body class="dashboard dashboard_2">
    @include('sweetalert::alert')

      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                   <div class="sidebar_user_info">
                      <div class="icon_setting"></div>
                      <div class="user_profle_side">
                         <div class="user_info">
                            <h6>{{ $data->full_name }}</h6>
                            <p><span class="online_animation"></span> Online</p>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="sidebar_blog_2">

                   <ul class="list-unstyled components">
                      <li class="active">
                         <a href="/home"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                      </li>
                      <li><a href="/home/table"><i class="fa fa-table purple_color2"></i> <span>Laporan</span></a></li>
                      <li><a href="/home/manageadmin"><i class="fa fa-user" style="color: red"></i> <span>Admin</span></a></li>
                      <li><a href="/home/manageassessor"><i class="fa fa-users" style="color: lightblue"></i> <span>Penguji</span></a></li>
                      <li><a href="/home/managemajor"><i class="fa fa-gears" style="color: gold"></i> <span>Jurusan</span></a></li>
                      <li><a href="/home/managestandard"><i class="fa fa-bars green_color"></i> <span>Standar Kompetensi</span></a></li>
                      <li>
                         <a href="/home/students">
                         <i class="fa fa-mortar-board purple_color"></i> <span>Siswa</span></a>
                      </li>
                   </ul>
                </div>
             </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">{{ $data->full_name }}</span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/home/profile">My Profile</a>
                                        <a class="dropdown-item" href="/home/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                        </div>
                     </div>
                  </div>
                  <form action="/home/students/update/{{ $student->id }}" method="post">
                    @csrf
                    <fieldset>
                        <legend><span class="number">1</span> General</legend>

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="full_name" value="{{ old('full_name', $student->user->full_name) }}" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $student->user->email) }}" required>

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $student->user->username) }}" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">

                        <label for="phone_number">Phone Number:</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $student->user->phone_number) }}" required>

                        <label for="is_active">Status Aktif:</label>
                        <select id="is_active" name="is_active" required>
                            <option value="1" {{ $student->user->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $student->user->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </fieldset>

                    <fieldset>
                        <legend><span class="number">2</span> Specific</legend>

                        <label for="nisn">NISN:</label>
                        <input type="text" id="nisn" name="nisn" value="{{ old('nisn', $student->nisn) }}" required>

                        <label for="grade_level">Kelas:</label>
                        <select id="grade_level" name="grade_level" required>
                            <option value="10" {{ $student->grade_level == 10 ? 'selected' : '' }}>X</option>
                            <option value="11" {{ $student->grade_level == 11 ? 'selected' : '' }}>XI</option>
                            <option value="12" {{ $student->grade_level == 12 ? 'selected' : '' }}>XII</option>
                        </select>

                        <label for="major">Jurusan:</label>
                        <select id="major" name="major_id" required>
                            <option value=""></option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}" {{ $student->major_id == $major->id ? 'selected' : '' }}>
                                    {{ $major->major_name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>

                    <input type="submit" class="btn btn-primary" style="width: 100%" value="Update Student">
                    </form>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- wow animation -->
      <script src="{{ asset('js/animate.js') }}"></script>
      <!-- select country -->
      <script src="{{ asset('js/bootstrap-select.js') }}"></script>
      <!-- owl carousel -->
      <script src="{{ asset('js/owl.carousel.js') }}"></script>
      <!-- chart js -->
      <script src="{{ asset('js/Chart.min.js') }}"></script>
      <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('js/utils.js') }}"></script>
      <script src="{{ asset('js/analyser.js') }}"></script>
      <!-- nice scrollbar -->
      <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="{{ asset('js/chart_custom_style1.js') }}js/chart_custom_style1.js"></script>
   </body>
</html>
