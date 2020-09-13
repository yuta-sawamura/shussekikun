<script src="{{ secure_asset('/plugins/apex/apexcharts.min.js') }}"></script>

<script>
  var data = @json($data);
  var categories = @json($categories);
  var name = @json($name);
  var text = @json($text);
  var selector = @json($selector);
  var sBar = {
    chart: {
      height: 450,
      type: 'bar',
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
      }
    },
    dataLabels: {
      enabled: true
    },
    series: [{
      name: name,
      data: data
    }],
    tooltip: {
      enabled: false
    },
    xaxis: {
      categories: categories,
      title: {
        text: text
      }
    }
  }

  var chart = new ApexCharts(
    document.querySelector(selector),
    sBar
  );
  chart.render();
</script>
