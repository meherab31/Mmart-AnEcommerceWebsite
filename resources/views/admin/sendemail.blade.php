<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

        .content-wrapper {
            background: #000000;
            width: 100%;
            overflow-x: auto;
        }

        /* Email Section */
        .email-form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 150px;
            margin-bottom: 100px;
        }

        .email-form-container h3 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .email-form-container label {
            color: #555;
        }

        .email-form-container input[type="text"],
        .email-form-container input[type="email"],
        .email-form-container textarea,
        .email-form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .email-form-container input[type="text"]:focus,
        .email-form-container input[type="email"]:focus,
        .email-form-container textarea:focus {
            outline: none;
            border-color: #6c63ff;
        }

        .email-form-container button {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .email-form-container button:hover {
            background-color: #564bd9;
        }
    </style>
</head>

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
                <!-- Email form section -->
                <div class="email-form-container">
                    <h3>Send Email</h3>
                    <form id="emailForm" action="{{ url('email_sent', $order->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="email">To:</label>
                        <input type="email" id="email" name="email" value="{{ $order->email }}" readonly>

                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>

                        <label for="body">Body:</label>
                        <textarea id="body" name="body" rows="5" required></textarea>

                        <label for="attachment">Attachment:</label>
                        <input type="file" id="attachment" name="attachment">

                        <button value="Send Email" type="submit">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    @include('admin.js')

    <script>
        // JavaScript to handle file input label change
        document.getElementById('attachment').addEventListener('change', function() {
            var fileName = this.files[0].name;
            var label = document.querySelector('label[for="attachment"]');
            label.textContent = fileName;
        });
    </script>
</body>

</html>
