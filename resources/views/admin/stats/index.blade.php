@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4 text-center">
      <div class="row justify-content-center mb-4">
            <div class="col">
                  <h1 class="mb-2 text-warning">
                  Statistiche
                  </h1>
            </div>
      </div>
      <div class="row">
            {{-- tabella ordini mesi --}}
            <div class="col-lg-6 col-12 mb-4">
                  <canvas id="monthOrderChart"></canvas>
            </div>
      
            {{-- tabella profitti mesi --}}
            <div class="col-lg-6 col-12 mb-4">
                  <canvas id="monthProfitChart"></canvas>
            </div>
      </div>
      
      <div class="row">
            {{-- tabella ordini anni --}}
            <div class="col-lg-6 col-12 mb-4">
                  <canvas id="yearOrderChart"></canvas>
            </div>

            {{-- tabella profitti anni --}}
            <div class="col-lg-6 col-12 mb-4">
                  <canvas id="yearProfitChart"></canvas>
            </div>
      </div>

      

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      {{-- script tabella ordini anni --}}
      <script>
            (async function () {
                  const data = {{ Js:: from($chartData)}};

                  console.log(data)

                  new Chart(
                        document.getElementById('yearOrderChart'),
                        {
                              type: 'bar',
                              options: {
                                    maintainAspectRatio: false,
                                    aspectRatio: 1
                              },
                              data: {
                                    labels: data.year,
                                    datasets: [
                                          {
                                                label: 'Numero ordini ricevuti per anno',
                                                data: data.ordersYear
                                          }
                                    ]
                              }
                        }
                  );
            })();
      </script> 

      {{-- script tabella profitti anni --}}
      <script>
            (async function () {
                  const data = {{ Js:: from($chartData)}};

                  console.log(data)

                  new Chart(
                        document.getElementById('yearProfitChart'),
                        {
                              type: 'bar',
                              options: {
                                    maintainAspectRatio: false,
                                    aspectRatio: 1
                              },
                              data: {
                                    labels: data.year,
                                    datasets: [
                                          {
                                                label: 'Guadagno in euro per anno',
                                                data: data.profitYear,
                                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                          }
                                    ]
                              }
                        }
                  );
            })();
      </script> 

      {{-- script tabella ordini mesi --}}
      <script>
            (async function () {
                  const data = {{ Js:: from($chartData)}};

                  console.log(data)

                  new Chart(
                        document.getElementById('monthOrderChart'),
                        {
                              type: 'bar',
                              options: {
                                    maintainAspectRatio: false,
                                    aspectRatio: 1
                              },
                              data: {
                                    labels: data.month,
                                    datasets: [
                                          {
                                                label: 'Numero ordini ricevuti per mese',
                                                data: data.ordersMonth
                                          }
                                    ]
                              }
                        }
                  );
            })();
      </script> 

      {{-- script tabella profitti mesi --}}
      <script>
            (async function () {
                  const data = {{ Js:: from($chartData)}};

                  console.log(data)

                  new Chart(
                        document.getElementById('monthProfitChart'),
                        {
                              type: 'bar',
                              options: {
                                    maintainAspectRatio: false,
                                    aspectRatio: 1
                              },
                              data: {
                                    labels: data.month,
                                    datasets: [
                                          {
                                                label: 'Guadagno in euro per mese',
                                                data: data.profitMonth,
                                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                          }
                                    ]
                              }
                        }
                  );
            })();
      </script> 
</div>
@endsection