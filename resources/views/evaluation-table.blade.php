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
                        <a href="/index"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="/index/table"><i class="fa fa-table purple_color2"></i> <span>Penilaian</span></a>
                    </li>
                    <li><a href="/index/managestandard"><i class="fa fa-bars green_color"></i> <span>Standar Kompetensi</span></a></li>
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
                                       <a class="dropdown-item" href="/index/profile">My Profile</a>
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
                         <div class="page_title">
                            <h2>Laporan Ujian {{ $student->user->full_name }}</h2>
                         </div>
                      </div>
                   </div>
                   <!-- row -->
                   <div class="row">
                    <!-- table section -->
                    <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Standar Kompetensi</th>
                                                <th>Penguji</th>
                                                <th>Elemen Kompetensi</th>
                                                <th>Nilai</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($student->examinations->isNotEmpty())
                                                <form action="/index/table/exam/{{ $student->id }}" method="post">
                                                    @csrf
                                                    @foreach($examinationsByStandard as $standardId => $examinations)
                                                        @foreach($examinations as $examination)
                                                            <tr>
                                                                @if ($loop->first)
                                                                    <td rowspan="{{ $examinations->count() }}">
                                                                        {{ $examination->competencyElement->competencyStandard->unit_title }}
                                                                    </td>
                                                                    <td rowspan="{{ $examinations->count() }}">
                                                                        {{ $examination->assessor->user->full_name ?? 'N/A' }}
                                                                    </td>
                                                                @endif
                                                                <td>
                                                                    {{ $examination->competencyElement->criteria }}
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $score = $competencyScores[$examination->competencyElement->competencyStandard->id] ?? 0;
                                                                        echo $score . '%';
                                                                    @endphp
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $competencyLevel = $competencyLevels[$examination->competencyElement->competencyStandard->id] ?? 'Belum Dinilai';
                                                                        echo $competencyLevel;
                                                                    @endphp
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <label>
                                                                            <input type="radio" name="status[{{ $examination->id }}]" value="1" {{ $examination->status == 1 ? 'checked' : '' }}> Selesai
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="status[{{ $examination->id }}]" value="0" {{ $examination->status == 0 ? 'checked' : '' }}> Belum Selesai
                                                                        </label>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <input type="submit" class="btn btn-primary" value="Simpan Perubahan">
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="button" class="btn btn-success" style="margin-right: 10px" onclick="setAllCompetent()">Semua Selesai</button>
                                                                <button type="button" class="btn btn-danger" onclick="setAllNotCompetent()">Semua Belum Selesai</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </form>
                                            @else
                                                <tr>
                                                    <td colspan="6">Tidak ada data ujian untuk ditampilkan.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>

      <!-- jQuery -->
      <script>
        function setAllCompetent() {
            // Loop through all radio buttons and set them to "Selesai"
            document.querySelectorAll('input[type="radio"][value="1"]').forEach(function(radio) {
                radio.checked = true;
            });
        }

        function setAllNotCompetent() {
            // Loop through all radio buttons and set them to "Belum Selesai"
            document.querySelectorAll('input[type="radio"][value="0"]').forEach(function(radio) {
                radio.checked = true;
            });
        }
    </script>
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/datatables.min.js') }}"></script>
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
      <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
      </script>
   </body>
</html>
