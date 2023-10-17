@extends('admin.layouts.base');
@section('contents')

<div class="p-2 md:p-0">
<canvas id="myChart" height="100px"></canvas>
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var orders =  {{ Js::from($data) }};
    console.log(orders, labels);

    const data = {
        labels: labels,
        datasets: [{
            label: 'Ordini in quest\'anno',
            backgroundColor: '#00A082',
            borderColor: '#00A082',
            data: orders,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };


    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    });
    

</script>