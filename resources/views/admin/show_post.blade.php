<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            border-collapse: separate; /* Boşluk için gerekli */
            border-spacing: 0 10px; /* Satırlar arasındaki boşluğu ayarlayın */
        }

        .th-deg {
            background-color: skyblue;
            color: black;
            padding: 10px 20px; /* Başlık hücrelerine padding */
        }

        .td-deg {
            padding: 10px 20px; /* Veri hücrelerine padding */
        }

        .img-deg {
            height: 150px;
            width: 350px;
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
                {{ session()->get('message') }}
            </div>
            @endif

            <h1 class="title-deg">All Post</h1>
            <table class="table-deg">
                <tr class="th-deg">
                    <th class="th-deg">Post Title</th>
                    <th class="th-deg">Description</th>
                    <th class="th-deg">Post By</th>
                    <th class="th-deg">Post Status</th>
                    <th class="th-deg">User Type</th>
                    <th class="th-deg">Image</th>
                    <th class="th-deg">Delete</th>
                </tr>
                @foreach ($post as $post)
                <tr>
                    <td class="td-deg">{{ $post->title }}</td>
                    <td class="td-deg">{{ $post->description }}</td>
                    <td class="td-deg">{{ $post->name }}</td>
                    <td class="td-deg">{{ $post->post_status }}</td>
                    <td class="td-deg">{{ $post->usertype }}</td>
                    <td class="td-deg"><img class="img-deg" src="postimage/{{ $post->image }}" alt=""></td>
                    <td class="td-deg"><a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                            onclick="confirmation(event)">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>

        @include('admin.footer')
    </div>

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure to delete this post?",
                text: "You won't be able to revert this delete",
                icon: "warning",
                buttons: ["Cancel", "Delete"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>

</html>
