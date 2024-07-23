<!DOCTYPE html>
<html>

<head>
    <style>
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
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


            <h1 class="post_title"> Add Post</h1>
            <div>
                <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Post <Title></Title></label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_center">
                        <label>Post Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div_center">
                        <label>Add image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>