@extends('admin.admin_dashboard')
@section('admin')


@php
$activenews = App\Models\NewsPost::where('status',1)->get();
$inactivenews = App\Models\NewsPost::where('status',0)->get();
$breakingnews = App\Models\NewsPost::where('breaking_news',1)->get();
@endphp

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('add.news.post') }}" class="btn btn-blue waves-effect waves-light">Add News Post</a>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <br>

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                    <i class="fe-heart font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"> <span data-plugin="counterup">{{ count($allnews) }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">All News Post</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                    <i class="fe-thumbs-up font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($activenews) }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Active News</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                    <i class="fe-thumbs-down font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($inactivenews) }}</span> </h3>
                                    <p class="text-muted mb-1 text-truncate">InActive News</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($breakingnews) }}</span> </h3>
                                    <p class="text-muted mb-1 text-truncate">Breaking News</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->







        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image </th>
                                    <th>Title </th>
                                    <th>Category </th>
                                    <th>Share </th>
                                    <th>User </th>
                                    <th>Date </th>
                                    <th>Status </th>
                                    <th>Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($allnews as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->image) }} " style="width: 30px; height:30px"></td>
                                    <td>{{ Str::limit($item->news_title,20)  }}</td>
                                    <td>{{ $item['category']['category_name']   }}</td>
                                    <td>
                                        @php
                                        $link = url('/')."/".$item['category']['category_slug']."/"."details"."/".$item->id."/".$item->news_title_slug;
                                        @endphp

                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($link) }}" target="_blank">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Share on WhatsApp" width="30">
                                        </a>

                                        <!-- Facebook -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($link) }}" target="_blank">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Share on Facebook" width="30">
                                        </a>

                                        <!-- Twitter -->
                                        <a href="https://x.com/intent/tweet?url={{ urlencode($link) }}&text={{ $item->news_title }}" target="_blank">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/X_logo_2023.svg/256px-X_logo_2023.svg.png?20230819000805" alt="Share on X" width="30">
                                        </a>

                                        <style>
                                            #tooltip {
                                                    {
                                                    $item->id
                                                }
                                            }

                                                {
                                                visibility: hidden;
                                                background-color: black;
                                                color: #fff;
                                                text-align: center;
                                                border-radius: 5px;
                                                padding: 5px;
                                                position: absolute;
                                                z-index: 1;
                                            }
                                        </style>




                                        <input type="text" size="1" value="{{ $link }}" id="shareUrl{{ $item->id }}" readonly>
                                        <div id="tooltip{{ $item->id }}">Copied!</div>
                                        <a href="Javascript:void(0)"> <img src="https://www.shareicon.net/download/2015/09/12/100116_copy.ico" height="30px" width="30px" id="copyIcon{{ $item->id }}"></a>
                                        <script>
                                            document.getElementById('copyIcon{{ $item->id }}').addEventListener('click', function() {
                                                var copyText = document.getElementById('shareUrl{{ $item->id }}');
                                                copyText.select();
                                                copyText.setSelectionRange(0, 99999); // For mobile devices
                                                document.execCommand('copy');

                                                var tooltip = document.getElementById('tooltip{{ $item->id }}');
                                                tooltip.style.visibility = 'visible';
                                                setTimeout(function() {
                                                    tooltip.style.visibility = 'hidden';
                                                }, 2000);
                                            });
                                        </script>

                                    </td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->post_date)->diffForHumans()  }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-pill bg-success">Active</span>

                                        @else
                                        <span class="badge badge-pill bg-danger">InActive</span>
                                        @endif


                                    </td>
                                    <td>
                                        <a href="{{ route('edit.news.post',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

                                        <a href="{{ route('delete.news.post',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>


                                        @if($item->status == 1)
                                        <a href="{{ route('inactive.news.post',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" title="Inactive"><i class="fa-solid fa-thumbs-down"></i> </a>
                                        @else
                                        <a href="{{ route('active.news.post',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->



    </div> <!-- container -->

</div> <!-- content -->

@endsection