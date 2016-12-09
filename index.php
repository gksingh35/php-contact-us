<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Bootstrap JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Contact Us</h1>
				<form id="frmContact" name="contact" class="form-horizontal" action="" method="post">
				<fieldset>
					<!-- Name input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="name">Name</label>
						<div class="col-md-9">
							<input id="name" name="name" type="text" placeholder="Your name" class="form-control" required>
						</div>
					</div>

					<!-- Email input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="email">Your E-mail</label>
						<div class="col-md-9">
							<input id="email" name="email" type="email" placeholder="Your email" class="form-control" required>
						</div>
					</div>

					<!-- Subject -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="subject">Subject</label>
						<div class="col-md-9">
							<select id="subject" name="subject" class="form-control" required>
								<option value="0" selected="">Choose One:</option>
								<option value="service">General Customer Service</option>
								<option value="suggestions">Suggestions</option>
								<option value="product">Product Support</option>
							</select>
						</div>
					</div>

					<!-- Message body -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="message">Your message</label>
						<div class="col-md-9">
							<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" required></textarea>
						</div>
					</div>

					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 text-right">
							<button type="submit" id="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
					</div>
				</fieldset>
				</form>

				<!-- contactModal -->
		        <div id="contactModal" class="modal fade" role="dialog">
		            <div class="modal-dialog">
		                <!-- Modal content-->
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal">&times;</button>
		                        <h4 class="modal-title">Contact Us</h4>
		                    </div>
		                    <div class="modal-body">
		                        <span id="msgResult"></span>
		                    </div>
		                    <div class="modal-footer">
		                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
        $('form#frmContact').on('submit', function(ev) {
            $('#contactModal').modal({
                show: 'false'
            });

            var mr = $("#msgResult");

            $.ajax({
                url: 'send_mail.php',
                type: 'post',
                dataType: 'json',
                data: $('form#frmContact').serialize(),
                success: function(data) {
                    if (data.code == '200') {
                        mr.html("<h1 class='text-success'>Thank you for contacting us.</h1><h3 class='text-success'>You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.</h3>");
                    } else {
                        mr.html("<h3 class='text-danger'>Message could not be sent. Please try after sometime.</h3>");
                    }

                    $('#contactModal').modal('show');
                    $("form#frmContact").trigger("reset");
                }
            });

            ev.preventDefault();
        });
    </script>
</body>
</html>
