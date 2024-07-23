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
            margin-left: 150px;
        }

        .th-deg {
            background-color: skyblue;
            color: black;
        }

        .img-deg {
            height: 100px;
            margin: 80px;

        }
    </style>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <h1 class="title-deg">All Post</h1>
            <table class="table-deg">

                <tr class="th-deg">
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>UserType</th>
                    <th>Image</th>
                </tr>

                @foreach ($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td><img class="img-deg" src="postimage/{{$post->image}}" alt=""></td>
                </tr>
                @endforeach

            </table>
        </div>

        @include('admin.footer')

</body>

</html>