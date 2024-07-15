<!DOCTYPE html>
<html>
<head>
  <title>Services Report</title>
  <style>
    .service-report {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px; /* Add some spacing between reports */
    }
    .service-details {
      margin-bottom: 5px; /* Add spacing within report details */
    }
    table {
      width: 100%; /* Adjust width for responsive layout if needed */
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      border-bottom: 1px solid #ddd;
    }
    th {
      text-align: left;
    }
    .total-cost {
      text-align: right; /* Align total cost to the right */
    }
    .report-footer {
      text-align: right; /* Align overall total cost to the right */
      margin-top: 10px; /* Add some spacing after report content */
    }
  </style>
</head>
<body>
  <h2>Report for Truck Service ({{ !empty($services->first()) ? $services->first()->plate_number : 'N/A' }})</h2>

  @if ($services->isEmpty())
    <p>No services found for this truck.</p>
  @else
    @foreach ($services as $service)
      <div class="service-report">
        <div class="service-details">
          <span>Service ID: {{ $service->serviceId }}</span>
          <span>Truck ID: {{ $service->truck_id }}</span>
        </div>
        <div class="service-details">
          <span>Service Date: {{ $service->service_date }}</span>
          <span>Next Service: {{ $service->next_service }}</span>
        </div>
        <div class="service-details">
          <span>Serviced By: {{ $service->serviced_by }}</span>
        </div>
        <table>
          <thead>
            <tr>
              <th>Service</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($service->services as $item)
              <tr>
                <td>{{ $item['service'] }}</td>
                <td>{{ $item['cost'] }}</td>
              </tr>
            @endforeach
            <tr class="total-cost">
              <th>Total Cost:</th>
              <td>{{ $service->total_cost }}</td>
            </tr>
          </tbody>
        </table>
      </div><br>
    @endforeach

    <p class="report-footer">Total Cost (Overall): {{ $services->sum('total_cost') }}</p>
  @endif
</body>
</html>
