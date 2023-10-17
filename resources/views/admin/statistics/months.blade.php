@extends('admin.layouts.base')
@section('contents')

<div class="p-2 md:p-0">
    <form class="mt-28" action="{{ route('admin.restaurant.statistics.months', ['id' => $restaurant->id]) }}" method="GET">
        <label class="text-semibold text-secondary" for="month">Seleziona un mese:</label>
        <select class="bg-secondary rounded-md shadow-md text-primary" name="month" id="month" onchange="this.form.submit()">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ $selectedMonth == $i ? 'selected' : '' }}>
                    {{ $italianMonths[$i] }}
                </option>
            @endfor
        </select>
    </form>
    
    <canvas id="chartMonths" height="100px"></canvas>
</div>
    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
const labels = {{ json_encode($labels) }};
const data = {{ json_encode($data) }};
console.log(labels, data);

const chartData = {
    labels: labels,
    datasets: [{
        label: 'Ordini del mese',
        data: data,
        backgroundColor: '#00A082',
        borderColor: '#00A082',
        borderWidth: 1,
    }],
};

const config = {
    type: 'bar',
    data: chartData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1, // Imposta lo step dell'asse y
            },
        },
    },
};

document.addEventListener("DOMContentLoaded", function() {
    const myChart = new Chart(
        document.getElementById('chartMonths'),
        config
    );
});

</script>
