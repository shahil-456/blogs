
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="row g-4 mb-3">

                        <!-- <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" id="searchInput"
                                            placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div> -->
                        <style>
                            .choices__list--dropdown {
                                max-height: 260px;
                                overflow-y: auto;
                            }
                        </style>
                        <form>
                            <div class="row g-3">
                                <!--end col-->

                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="key">Keyword</label>
                                        <input id="keyword" type="text" class="form-control" name="keyword"
                                            placeholder="search customer name,mobile,email,invoice_no.....">
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="aa">Status</label>

                                        <select class="form-control" data-choices data-choices-search-false
                                            name="status" id="idStatus">
                                            <option value="">Status</option>
                                            <option value="all" selected>All</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="aa">Typist</label>
                                        <select name="typist" id="typist" class="form-select">
                                            <option value="">Select Typist</option>
                                            @foreach($typists as $value)
                                            <option value="{{ $value->id }}" {{ isset($lead) && $lead->typist_id == $value->id ?
                                        'selected' : '' }}>
                                                {{ $value->first_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="aa">Sales(Created By)</label>
                                        <select name="sales" id="sales" class="form-select">
                                            <option value="">Select Sales</option>
                                            @foreach($sales as $value)
                                            <option value="{{ $value->id }}" {{ isset($lead) && $lead->created_by == $value->id ?
                                        'selected' : '' }}>
                                                {{ $value->first_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="aa">Start Date</label>
                                        <input type="date" class="form-control" name="start_date"
                                            placeholder="Start Date">

                                    </div>
                                </div>

                                <div class="col-xxl-4 col-sm-4">
                                    <div class="input-light">
                                        <label for="aa">End Date</label>

                                        <input type="date" class="form-control" name="end_date" placeholder="End Date">

                                    </div>
                                </div>

                                <!--end col-->

                                <div class="col-xxl-2 col-sm-4">
                                    <label for=""></label>
                                    <button type="button" id="submit" class="btn btn-primary w-100" onclick="">
                                        <i class="ri-equalizer-fill me-1 align-bottom"></i> Filter
                                    </button>
                                </div>

                                <div class="col-xxl-2 col-sm-4"> <label for=""></label>

                                    <a href="javascript:void(0);"
                                        onclick="exportLeads($('#idStatus').val(), $('#typist').val(), $('input[name=customer]').val(), $('input[name=start_date]').val(), $('input[name=end_date]').val())"
                                        class="btn btn-success w-100">
                                        <i class="ri-download-2-line me-1 align-bottom"></i> Export
                                    </a>

                                </div>

                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" id="lead_table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Invoice No</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Customer Mobile</th>
                                    <th scope="col">Last Comment</th>
                                    <th scope="col">Typist</th>
                                    <th scope="col">Application No</th>
                                    <th scope="col">Transaction No</th>
                                    <th scope="col">Completion Date</th>
                                    @can('admin section')
                                    <th scope="col">Sales(Created By)</th>
                                    @endcan
                                    <th scope="col">Created at</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @include('leads.list')
                            </tbody>
                        </table>
                    </div>

                </div>

                 <div id="grf" class="row">
                    @include('leads.graph')

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')



<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js') }}"></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js') }}">
</script>

<script src="{{ URL::asset('build/js/pages/apexcharts-column.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script>
    function exportLeads(status = '', typist = '', customer = '', start_date = '', end_date = '',sales='') {
        const query = $.param({
            status: status,
            typist: typist,
            sales: sales,
            customer: customer,
            start_date: start_date,
            end_date: end_date
        });
        window.location.href = "{{ route('leads.export') }}?" + query;
    }
    $(document).ready(function() {
        $('#submit').on('click', function(e) {
            e.preventDefault();
            let keyword = $('#keyword').val();
            let status = $('#idStatus').val();
            let typist = $('#typist').val();
            let sales = $('#sales').val();
            let customer = $('input[name="customer"]').val();
            let start_date = $('input[name="start_date"]').val();
            let end_date = $('input[name="end_date"]').val();
            loadLeads(keyword, status,sales, typist, customer, start_date, end_date);
        });
        $('#keyword').on('keyup', function() {
            let searchQuery = $(this).val();
            loadLeads(searchQuery);
        });

        function loadLeads(keyword = '', status = '',sales='', typist = '', customer = '', start_date = '', end_date =
            '') {
            $.ajax({
                url: "{{ route('lead.reports') }}",
                type: 'GET',
                data: {
                    keyword: keyword,
                    status: status,
                    sales: sales,
                    typist: typist,
                    customer: customer,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(response) {
                    $('tbody').html(response.view1);
                    $('#grf').html(response.view2);

                },
                error: function() {
                    Toastify({
                        text: 'Something went wrong. Please try again.',
                        duration: 2000,
                        close: true,
                        className: "danger",
                    }).showToast();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#lead_table tbody').html(data.view1);
                    $('#grf').html(response.view2);

                }
            });
        });
    });
</script>
@endsection