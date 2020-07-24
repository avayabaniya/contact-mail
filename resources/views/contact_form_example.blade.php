<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Contact Form</title>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ route('send.contact.message') }}" id="contact-form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Number</label>
                <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contact number">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Subject</label>
                <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contact subject">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
            </div>

            <button id="contact-submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="{{ asset('contact_mail/js/contact-message.js') }}"></script>
</html>