
<!DOCTYPE HTML>
<html>
<head> 

<body>
    @extends('Bootstrap.StudentNavbar')
    @section('UserNavbar')
    @endsection
    @if(session('message'))
     {{ session('message') }}
   @endif

    <div class="a">
        <script>
        window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Attendance"
            },
            axisY: {
                title: "Total Days"
            },
            
            data: [{        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "attendance",
                dataPoints: [
                          
        
                    { y:{{ $attendance->total_class }}, label: 'Total class' },
                    { y: {{ $attendance->present_days }},  label: "Present Days" },
                    { y: {{ $attendance->absent_days }},  label: "Absent Days" },
                
                    
                ]
            }]
        });
        chart.render();
        
        }
        </script>
        </head>
        </div>
<div id="chartContainer" style="height: 300px; width:70%;position:absolute;left:20%;top:33vh;padding:14px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>