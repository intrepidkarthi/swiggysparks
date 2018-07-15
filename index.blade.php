 @extends('admin/app')
 @section('content')



  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>
          <i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
          <i class="fa fa-home fa-lg"></i>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <a href="/order" style="text-decoration: none;">
        <div class="widget-small primary coloured-icon">
          <i class="icon fa fa-motorcycle fa-3x"></i>
          <div class="info">
            <h4>Number Of Orders</h4>
            <p>
              <b>{{$order_count}}</b>
            </p>
          </div>
        </div>
      </a>
      </div>
      <div class="col-md-6 col-lg-3">
          <a href="revenue.html" style="text-decoration: none;">
        <div class="widget-small info coloured-icon">
          <i class="icon fa fa-money fa-3x"></i>
          <div class="info">
            <h4>Revenue</h4>
            <p>
              <b>{{$revenue}}</b>
            </p>
          </div>
        </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
          <i class="icon fa fa-files-o fa-3x"></i>
          <div class="info">
            <h4>Cancellations</h4>
            <p>
              <b>{{$cancel_count}}</b>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
          <i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>ATV</h4>
            <p>
              <b>{{$atv}}</b>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Monthly Orders</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="tile">
                  <h3 class="tile-title">Most Canclled Orders</h3>
                <ul>
                    <li>Dosa</li>
                    <li>Idly</li>
                    <li>Pizza</li>
                    <li>Pasta</li>
                    <li>Burger</li>
                  </ul>
                </div>
          </div>
          <div class="col-md-6">
              <div class="tile">
                  <h3 class="tile-title">Items Ordered Togther</h3>
                  <ul>
                    <li>Dosa</li>
                    <li>Idly</li>
                    <li>Pizza</li>
                    <li>Pasta</li>
                    <li>Burger</li>
                  </ul>
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="widget-small primary coloured-icon">
                  <i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Number Of delayed Orders</h4>
                    <p>
                      <b>{{$totaldelays}}</b>
                    </p>
                  </div>
                </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="tile" style="height: 750px; overflow-y:scroll; " >
          <h3 class="tile-title">Delay in Pickup</h3>
          <table class="table table-striped" >
            <tr>
              <th>DeleveryBoy Id</th>
              <th>Restaurant Id</th>
              <th>Delayed Time</th>
            </tr>
           @foreach($DELAYED as $del)

            <tr>
              <td>{{$del->d_boy_id}}</td>
              <td>{{$del->rest_id}}</td>
              <td>{{$del->time}}</td>
            </tr>
            @endforeach
           
              
          </table>
        </div>
      </div>
    </div>




    <div class="row">
      <div class="col-md-4">
       
        
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Sales Alert</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, labore.</p><hr>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, labore.</p><hr>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, labore.</p><hr>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, labore.</p><hr>
                    </div>
            </div>
          </div>
        

        </div>
      
      
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
              <div class="widget-small danger coloured-icon">
          <i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>Restaurant Rating</h4>
            <a href="/restrating">
              <button class="btn btn-danger" style="border-radius: 20px;">Click for Details</button>
            </a>
          </div>
        </div>
          </div>
        </div>
       <div class="row">
          <div class="col-md-12">
              <div class="widget-small danger coloured-icon">
          <i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>Delivery Guy Rating</h4>
            <a href="/delrating">
              <button class="btn btn-danger" style="border-radius: 20px;">Click for Details</button>
            </a>
          </div>
        </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Area Wise Order</h3>
                    <table class="table table-striped">
                        <tr>
                          <th>Area</th>
                          <th>Number Of Order</th>
                        </tr>
                        <tr>
                          <td>Indiranagar</td>
                          <td>200</td>
                        </tr>
                        <tr>
                          <td>Kormangala</td>
                          <td>190</td>
                        </tr>
                        
                        
                      </table>
                  </div>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="tile" style="height: 470px; overflow-y: scroll">
              <h3 class="tile-title">Delay in delivery</h3>
              <table class="table table-striped" >
                <tr>
                  <th>Restaurant Id</th>
                  <th>Deleveboy Id</th>
                  <th>Delay Time</th>
                </tr>
                @foreach($DEL_DELAY as $del_delay)
                <tr>
                  <td>{{$del_delay->rest_id}}</td>
                  <td>{{$del_delay->d_boy_id}}</td>
                  <td>{{$del_delay->time}}</td>
                </tr>
                @endforeach
                  
              </table>
            </div>
      </div>
    </div>

@foreach($GRAPH_DATA as $gd)
    
    <p style="display: none;"> {{array_push($DATA,$gd->count,$gd->hour)}}</p>
  

@endforeach
 


  
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="../admin/js/jquery-3.2.1.min.js"></script>
  <script src="../admin/js/popper.min.js"></script>
  <script src="../admin/js/bootstrap.min.js"></script>
  <script src="../admin/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="../admin/js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <script type="text/javascript" src="../admin/js/plugins/chart.js"></script>
  <script type="text/javascript">
    var users=<?php echo json_encode($DATA);?>;
    var mapdata=[users];
 
    var data = {
      labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"],
      
      datasets: [
       
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: users,
        }
      ]
    };
    var pdata = [
      {
        value: 300,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Complete"
      },
      {
        value: 50,
        color: "#F7464A",
        highlight: "#FF5A5E",
        label: "In-Progress"
      }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
  </script>
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>

  <!--Connecting Postgresql Database and geeting data-->


@endsection