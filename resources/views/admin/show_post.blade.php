<!DOCTYPE html>
<html>

<head>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            border-collapse: separate;
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
                    <th class="th-deg">Edit</th>
                </tr>
                @foreach ($post as $post)
                <tr>
                    <td class="td-deg">{{ $post->title }}</td>
                    <td class="td-deg">{{ $post->description }}</td>
                    <td class="td-deg">{{ $post->name }}</td>
                    <td class="td-deg">{{ $post->post_status }}</td>
                    <td class="td-deg">{{ $post->usertype }}</td>
                    <td class="td-deg"><img class="img-deg" src="{{ asset('postimage/'.$post->image) }}" alt="Post Image"></td>
                    <td class="td-deg">
                        <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger" onclick="return confirmation(event)">Delete</a>
                    </td>
                    <td class="td-deg">
                        <a href="{{ url('edit_post', $post->id) }}" class="btn btn-success">Edit</a>
                    </td>
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
            Swal.fire({
                title: "Are you sure to delete this post?",
                text: "You won't be able to revert this delete",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
            return false; // Prevent the default anchor action
        }
    </script>
</body>

</html>
