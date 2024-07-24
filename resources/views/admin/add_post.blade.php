<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: #111; 
            color: white; 
            margin: 0; 
            font-family: Arial, sans-serif; 
        }

        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #333; 
        }

        .div_center {
            text-align: center;
            padding: 15px;
        }

        label {
            display: inline-block;
            width: 200px;
            text-align: right;
            margin-right: 10px;
            color: white; 
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
            background-color: #666; 
            color: white; 
            margin-left: 10px;
        }

        textarea {
            height: 100px;
            resize: vertical;
            background-color: #666 !important; 
            color: white !important; 
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: white;
            cursor: pointer;
        }

        .btn:hover {
            background-color: green;
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
                {{ session()->get('message') }}
            </div>
            @endif

            <h1 class="post_title">Add Post</h1>
            <div class="form-container">
                <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Post Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_center">
                        <label>Post Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div_center">
                        <label>Add Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn">
                    </div>
                </form>
            </div>
        </div>

        @include('admin.footer')
    </div>
</body>

</html>
