<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive-lg  data_table">
                <div>
                    <h4>Accepted Reports</h4>
                    {{-- <a class="btn btn-success" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addReport"> Create New
                        Product</a> --}}
                </div>
                <div class="search-filter" style="margin: 20px 0px;">
                    <input type="text" class="datepicker" id="from_date" wire:model="from_date">
                    <input type="text" class="datepicker" id="to_date" wire:model="to_date"> 
                </div>
                <div class="mt-2 list-inline ">
                    <a class="btn" href="{{ route('reports.export')}}" style="background: black; color: white">Excel</a>
                    <a class="btn" href="{{ route('reports.csv')}}" style="background: black; color: white">CSV</a>
                </div>
                <table class="table table-striped table-bordered data-table">
                    <thead>
                         <tr>
                             <th >Report ID</th>
                             <th >Date and Time</th>
                             <th >UID</th>
                             <th >Emergency Type</th>
                             <th >Resident Name</th>
                             <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         @if ($reports->count())
                              @foreach ($reports as $report)
                                  <tr>
                                      <td>{{ $report->report_id }}</td>
                                      <td>{{ $report->dateandTime }}</td>
                                      <td>{{ $report->uid }}</td>
                                      <td>{{ $report->emergency_type }}</td>
                                      <td>{{ $report->resident_name }}</td>
                                      <td><a href="#">view</a></td>
                                  </tr>
                              @endforeach
                         @else
                              <tr>
                                   <td colspan="5">No record found</td>
                              </tr>
                         @endif
                    </tbody>
                </table>
                <div class="justify-content-end ">
                    {{ $reports->links() }}
                 </div>
            </div>
        </div>
    </div>
</div>    



<script>
    $(document).ready(function(){
    
        $("#from_date").datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true,
            changeMonth: true,
            onSelect: function (selected) {
                 var dt = new Date(selected);
    
                 @this.set('from_date', selected);
    
                 dt.setDate(dt.getDate() + 1);
                 $("#to_date").datepicker("option", "minDate", dt);
            }
        });
    
        $("#to_date").datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true,
            changeMonth: true,
            onSelect: function (selected) {
                 var dt = new Date(selected);
    
                 @this.set('to_date', selected);
    
                 dt.setDate(dt.getDate() - 1);
                 $("#from_date").datepicker("option", "maxDate", dt);
            }
        });
    });
    </script>
