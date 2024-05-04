<?php
include 'function.php';

$files = query("SELECT * FROM tb_files");
$totalFiles = getTotalFiles();
$filesSize = sumSize();
$cpuUsage = 0;
$memoryUsage = 0;

if (isset($_POST['submit'])) {
  if (uploadFile($_FILES) > 0) {
    header("Location: index.php");
  } else {
    header("Location: index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Bracket Plus">
  <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/bracketplus">
  <meta property="og:title" content="Bracket Plus">
  <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

  <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>R-Manager - Dashboard</title>

  <!-- vendor css -->
  <link href="./lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="./lib/rickshaw/rickshaw.min.css" rel="stylesheet">
  <link href="./lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="./css/bracket.css">

  <!-- Vendor JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <div class="br-logo"><a href=""><span>[</span>R-<i>MANAGER</i><span>]</span></a></div>
  <div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
      <li class="br-menu-item">
        <a href="index.html" class="br-menu-link active">
          <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
          <span class="menu-item-label">Dashboard</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
      <li class="br-menu-item">
        <a href="index.html" class="br-menu-link">
          <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
          <span class="menu-item-label">My Files</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
      <li class="br-menu-item">
        <a href="index.html" class="br-menu-link">
          <i class="menu-item-icon icon ion-share tx-24"></i>
          <span class="menu-item-label">Shared Files</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
      <li class="br-menu-item">
        <a href="index.html" class="br-menu-link">
          <i class="menu-item-icon icon ion-power tx-20"></i>
          <span class="menu-item-label">Sign Out</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
    </ul><!-- br-sideleft-menu -->
    <br>
  </div><!-- br-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="br-header">
    <div class="br-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="input-group hidden-xs-down wd-170 transition">
        <input id="searchbox" type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
        </span>
      </div><!-- input-group -->
    </div><!-- br-header-left -->
    <div class="br-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name hidden-md-down">Polymorphism</span>
            <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
            <span class="square-10 bg-success"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-250">
            <div class="tx-center">
              <a href=""><img src="https://via.placeholder.com/500" class="wd-80 rounded-circle" alt=""></a>
              <h6 class="logged-fullname">Polymorphism</h6>
              <p>polymorphx@mail.com</p>
            </div>
            <hr>
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
    </div><!-- br-header-right -->
  </div><!-- br-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline"></i>
      <div>
        <h4>Dashboard</h4>
        <p class="mg-b-0">Store and manage files online for free, try it now.</p>
        <!-- <p class="mg-b-0"><?php echo $error; ?></p> -->
      </div>
    </div>

    <div class="br-pagebody">
      <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
          <div class="bg-info rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i class="ion ion-speedometer tx-60 lh-0 tx-white op-7"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Memory Usage</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $memoryUsage; ?>%</p>
                <span class="tx-11 tx-roboto tx-white-8"><?php echo $memoryUsage; ?>% higher than yesterday</span>
              </div>
            </div>
            <div id="ch1" class="ht-50 tr-y-1"></div>
          </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="bg-purple rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i class="ion ion-document-text tx-60 lh-0 tx-white op-7"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Files</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $totalFiles['total']; ?></p>
                <span class="tx-11 tx-roboto tx-white-8"><?php echo $totalFiles['total']; ?> files yesterday</span>
              </div>
            </div>
            <div id="ch3" class="ht-50 tr-y-1"></div>
          </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="bg-teal rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">CPU Usage</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo $cpuUsage; ?>%</p>
                <span class="tx-11 tx-roboto tx-white-8"><?php echo $cpuUsage; ?>% average duration</span>
              </div>
            </div>
            <div id="ch2" class="ht-50 tr-y-1"></div>
          </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="bg-primary rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i class="ion ion-ios-box tx-60 lh-0 tx-white op-7"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Space Usage</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?php echo formatSizeUnits($filesSize['size']); ?></p>
                <span class="tx-11 tx-roboto tx-white-8"><?php echo formatSizeUnits($filesSize['size']); ?> of total files size</span>
              </div>
            </div>
            <div id="ch4" class="ht-50 tr-y-1"></div>
          </div>
        </div><!-- col-3 -->
      </div><!-- row -->
    </div><!-- br-pagebody -->

    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <h6 class="br-section-label">Recently Added Files</h6>
        <p class="br-section-text">Last updated at 20/04/2024</p>

        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="icon ion-android-add tx-16 pr-2"></i> Add a File</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload a file</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="">
                    <div class="custom-file">
                      <input type="file" id="file" name="file" class="custom-file-input">
                      <label class="custom-file-label" for="file">Select a file</label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End modal -->

        <div class="bd bd-gray-300 rounded table-responsive">
          <table class="table mg-b-0">
            <thead>
              <tr>
                <th></th>
                <th>File Name</th>
                <th>Format</th>
                <th>Size</th>
                <th>Created at</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($files as $file) : ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $file['nama_file']; ?></td>
                  <td><?php echo getFileFormat($file['nama_file']); ?></td>
                  <td><?php echo formatSizeUnits($file['ukuran_file']); ?></td>
                  <td><?php echo $file['created_at']; ?></td>
                  <form action="" method="get">
                    <td>
                      <a href="download.php?file_name=<?php echo $file['nama_file']; ?>" class="btn btn-primary btn-with-icon btn-sm">
                        <div class="ht-32 justify-content-between">
                          <span class="pd-x-15">Download</span>
                          <span class="icon wd-40"><i class="fa fa-download"></i></span>
                        </div>
                      </a>
                    </td>
                    <td>
                      <a href="delete.php?file_name=<?php echo $file['nama_file']; ?>&kd_file=<?php echo $file['kd_file']; ?>" class="btn btn-danger btn-with-icon btn-sm">
                        <div class="ht-32 justify-content-between">
                          <span class="pd-x-15">Delete</span>
                          <span class="icon wd-40"><i class="fa fa-trash"></i></span>
                        </div>
                      </a>
                    </td>
                    <td>
                      <a href="" class="btn btn-primary btn-with-icon btn-sm">
                        <div class="ht-32 justify-content-between">
                          <span class="pd-x-15">Share</span>
                          <span class="icon wd-40"><i class="fa fa-share"></i></span>
                        </div>
                      </a>
                    </td>
                  </form>
                </tr>
              <?php
                $i++;
              endforeach; ?>
            </tbody>
          </table>
        </div><!-- bd -->
      </div>
      <footer class="br-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2024. Rafif Banner. All Rights Reserved.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket%20Plus,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="./lib/jquery/jquery.min.js"></script>
    <script src="./lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./lib/moment/min/moment.min.js"></script>
    <script src="./lib/peity/jquery.peity.min.js"></script>
    <script src="./lib/rickshaw/vendor/d3.min.js"></script>
    <script src="./lib/rickshaw/vendor/d3.layout.min.js"></script>
    <script src="./lib/rickshaw/rickshaw.min.js"></script>
    <script src="./lib/jquery.flot/jquery.flot.js"></script>
    <script src="./lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="./lib/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="./lib/echarts/echarts.min.js"></script>
    <script src="./lib/select2/js/select2.full.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    <script src="./lib/gmaps/gmaps.min.js"></script>

    <script src="./js/bracket.js"></script>
    <script src="./js/map.shiftworker.js"></script>
    <script src="./js/ResizeSensor.js"></script>
    <script src="./js/dashboard.js"></script>
    <script>
      $(function() {
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function() {
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });

      $('#file').on("change", function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);
      });
    </script>
</body>

</html>