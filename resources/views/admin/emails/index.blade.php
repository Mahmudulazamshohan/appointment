<!DOCTYPE html>
    <html lang="en-US">
    	<head>
    		<meta charset="utf-8">
    	</head>
    	<body>
    		<h2>Appointment Confirmation!</h2>
    		<p>Dear <strong>{{ $name }}</strong>,</p>
    		<p>This is informing you that, your appointment date is <strong>{{ $booking_date }}</strong> at <strong>{{ $booking_time }}</strong> and this is currently
    			@if ($status == 0)
    				<strong>Pending</strong>
    			@else
    				<strong>Not Found</strong>
    			@endif
    		</p>
    	</body>
    </html>