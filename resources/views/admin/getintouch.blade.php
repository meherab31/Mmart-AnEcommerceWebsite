<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get In Touch</title>
    @include('admin.css')
    <style>
        /* Custom CSS for responsiveness */
        .container-scroller {
            position: relative;
            overflow-x: hidden;
        }

        .main-panel {
            transition: width 0.25s ease, margin 0.25s ease;
            min-height: calc(100vh - 70px);
            padding-top: 20px;
            width: 0%;
        }
        .mt-4 {
            margin-top: 6rem !important;
        }
        .content-wrapper {
            background: #000000;
            width: 100%;
            overflow-x: auto;
        }

        .table-container {
            background-color: #ffffff;
            margin-bottom: 20px;
            /* Add margin to separate pagination from table */
        }

    </style>
</head>
<body>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <!-- partial:partials/_navbar.html -->
                @include('admin.header')


                <!-- Main content wrapper -->

                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="text-center mt-4 mb-4">All Contacts</h1>
                                    <div class="table-container">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Type</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contacts as $contact)
                                                    <tr>
                                                        <td>{{ $contact->name }}</td>
                                                        <td>{{ $contact->email }}</td>
                                                        <td>{{ $contact->subject }}</td>
                                                        <td>{{ $contact->message }}</td>
                                                        <td>{{ $contact->type }}</td>
                                                        <td>{{ $contact->created_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.js')
    </body>
</body>
</html>
