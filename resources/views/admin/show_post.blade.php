<!DOCTYPE html>
<html>

<head>
    <style>
        .title-deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
            margin: 50px;
        }

        .table-deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 100px;
        }

        .th-deg {
            background-color: skyblue;
            color: black;
        }

        .img-deg {
            height: 150px;
            width: 100%;
            padding: 20px;

        }
    </style>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif


            <h1 class="title-deg">All Post</h1>
            <table class="table-deg">

                <tr class="th-deg">
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>UserType</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>

                @foreach ($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td><img class="img-deg" src="postimage/{{$post->image}}" alt=""></td>
                    <td><a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete this ?')">Delete</a></td>
                </tr>
                @endforeach

            </table>
        </div>

        @include('admin.footer')

</body>

</html>