<title>Add Trainee</title>

<style>
    body {
        background-color: lightblue;
        font-size: 130%;
    }

    h1 {
        font-family: "Comic Sans Serif", sans-serif;
    }

    form {
        background-color: lightgrey;
        padding: 20px;
        border-radius: 10px;
        width: 80%;
        margin: 0 auto;
        box-shadow: 5px 5px 5px #888888;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-family: "Comic Sans Serif", sans-serif;
        color: grey;
    }

    input[type="number"],
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid grey;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: black;
        color: white;
        font-weight: 900;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: lightgrey;
        color: black;
    }
</style>
<script>
    $(document).ready(function() {
        // Function to validate the form before submitting
        function validateForm() {
            var nationalId = $('#national_id').val();
            var phone = $('#phone').val();

            // Perform an AJAX request to check uniqueness
            $.ajax({
                url: '{{ route("admin.addtrainee.check") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    national_id: nationalId,
                    phone: phone
                },
                success: function(response) {
                    if (response.exists) {
                        // Display error message if the national ID or phone already exists
                        $('#error-message').text('Trainee with the same national ID or phone number already exists.');
                    } else {
                        // Submit the form if the national ID and phone are unique
                        $('#trainee-form').submit();
                    }
                },
                error: function() {
                    // Display a general error message if something goes wrong
                    $('#error-message').text('Trainee\'s data already increases.');
                }
            });

            // Prevent the form from submitting
            return false;
        }

        // Attach the validation function to the form submit event
        $('#trainee-form').submit(validateForm);
    });
</script>


<body>

@if(session('success'))
    <div class="alert alert-success" style="color:green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form id="trainee-form" method="POST" action="{{ route('admin.addtrainee.submit') }}">
    <b><p style="color:green">We're gonna add our trainees from here</p></b>
    @csrf
    Id Number:
    <input type="number" name="national_id" id="national_id" value="{{ old('national_id') }}" required>
    Name:
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    Phone:
    <input type="number" name="phone" id="phone" value="{{ old('phone') }}" required>
    Ward:
    <input type="text" name="ward" id="ward" value="{{ old('ward') }}" required>
    Polling Station:
    <input type="text" name="polling_station" id="polling_station" value="{{ old('polling_station') }}" required><br>
    <button type="submit">Add Trainee</button>
    <div id="error-message" style="color: red;"></div>
</form>


</body>