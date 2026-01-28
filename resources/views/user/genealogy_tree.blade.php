@extends('layouts.user')

@section('title', 'Genealogy Tree')
@section('styles')
    <!-- TREE -->
    <link id="style" href="{{asset('public/assets/css/tree.css')}}" rel="stylesheet" />
@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <div>
                                    <h1 class="page-title">Genealogy Tree</h1>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/user')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Genealogy Tree</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('layouts.error')

                        <div class="scrollBar">
                            <div class="gtree">
                                <ul>
                                    <li>
                                        <p class='popupLink'>
                                            <a style="cursor:pointer">
                                                <i class='fa fa-{{$user->gender}} fa-4x'></i><br />{{strtolower($user->username)}}<br />
                                            </a>
                                            <span class='txtBox'>
                                                Name : {{$user->name}}<br />
                                                DOJ: {{date('d-m-Y', strtotime($user->created_at))}}<br />
                                                Left: {{$user->total_left}}<br />
                                                Right: {{$user->total_right}}
                                            </span>
                                        </p>
                                        <ul>
                                        @php
                                            $mainQuery =  DB::table('login_users')->where('sponsor', $user->username)->where('username', '!=', $user->username)->select('id', 'username', 'name', 'gender', 'position', 'created_at', 'total_left', 'total_right')->orderBy('id', 'ASC');
                                            $tree = ""; $depth = 1; $top_level_on = 1; $exclude = array(); array_push($exclude, 0);
                                            $downlineCount = $mainQuery->count();
                                        @endphp
                                        @if($downlineCount == 0)
                                            @php
                                                for($i=0;$i<2;$i++){
                                                    $tree .= "<li>";
                                                    array_push($exclude, '');
                                                    $tree .= Helper::build_child('', $exclude, $user->username, $i);
                                                    $tree .= "</li>";
                                                }
                                            @endphp
                                        @elseif ($downlineCount == 1)
                                            @php
                                                $nav_query = $mainQuery->get();
                                            @endphp
                                            @foreach ($nav_query as $nav_row)
                                                @php
                                                    $goOn = 1;
                                                    for($x = 0; $x<count($exclude); $x++){
                                                        if($exclude[$x] == ($nav_row->id+999999)){
                                                            $goOn = 0;
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                @if($goOn == 1)
                                                    @if($nav_row->position == 'left')
                                                        @php
                                                        $tree .= "<li>
                                                            <p class='popupLink'>
                                                                <a href=".route('user.genealogy_tree_search', base64_encode($nav_row->username))." style='cursor:pointer'>
                                                                    <i class='fa fa-".$nav_row->gender." fa-4x'></i><br />
                                                                    ".strtolower($nav_row->username)."
                                                                </a>
                                                                <span class='txtBox'>
                                                                    Name : ".$nav_row->name."<br />
                                                                    DOJ : ".date('d-m-Y',strtotime($nav_row->created_at))."<br />
                                                                    Left : ".$nav_row->total_left."<br />
                                                                    Right : ".$nav_row->total_right."
                                                                </span>
                                                            </p>";

                                                            $tree .= Helper::build_child($nav_row->username, $exclude);
                                                            $tree .= "</li><a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br /><span class='mty'></span></li>";
                                                        @endphp
                                                    @elseif ($nav_row->position == 'right')
                                                        @php
                                                        $tree .= "<li><a class='mty' style='cursor:pointer'><i class='fa fa-user-plus fa-4x'></i></a><br /><span class='mty'></span></li><li>
                                                            <p class='popupLink'>
                                                                <a href=".route('user.genealogy_tree_search', base64_encode($nav_row->username)).">
                                                                    <i class='fa fa-".$nav_row->gender." fa-4x'></i><br />
                                                                    ".strtolower($nav_row->username)."
                                                                </a>
                                                                <span class='txtBox'>
                                                                    Name : ".$nav_row->name."<br />
                                                                    DOJ : ".date('d-m-Y',strtotime($nav_row->created_at))."<br />
                                                                    Left : ".$nav_row->total_left."<br />
                                                                    Right : ".$nav_row->total_right."
                                                                </span>
                                                            </p>";

                                                            $tree .= Helper::build_child($nav_row->username, $exclude);
                                                            $tree .= "</li>";

                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                        @elseif ($downlineCount == 2)
                                            @php
                                                $nav_query = $mainQuery->get();
                                            @endphp
                                            @foreach ($nav_query as $nav_row)
                                                @php
                                                    $goOn = 1;
                                                    for($x = 0; $x<count($exclude); $x++){
                                                        if($exclude[$x] == ($nav_row->id+999999)){
                                                            $goOn = 0;
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                @if($goOn == 1)
                                                    @php
                                                    $tree .= "<li class='".ucfirst($nav_row->position)."'>
                                                        <p class='popupLink'>
                                                            <a href=".route('user.genealogy_tree_search', base64_encode($nav_row->username)).">
                                                                <i class='fa fa-".$nav_row->gender." fa-4x'></i><br />
                                                                ".strtolower($nav_row->username)."
                                                            </a>
                                                            <span class='txtBox'>
                                                                Name : ".$nav_row->name."<br />
                                                                DOJ : ".date('d-m-Y',strtotime($nav_row->created_at))."<br />
                                                                Left : ".$nav_row->total_left."<br />
                                                                Right : ".$nav_row->total_right."
                                                            </span>
                                                        </p>";

                                                        $tree .= Helper::build_child($nav_row->username, $exclude);
                                                        $tree .= "</li>";

                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        @php
                                            echo $tree;
                                        @endphp
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')

@endsection
