<?php
  ## CONFIG ##

# LIST EMAIL ADDRESS
$recipient = "codebrigadelk@gmail.com";
$email= uniqid();
# SUBJECT (Subscribe/Remove)
$subject = "You got a new subscriber!";

# RESULT PAGE
// $location = "../index.html";

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = $recipient;

# MAIL BODY
$body = "Your new subscriber's Email: ".$email." \n";
# add more fields here if required

## SEND MESSGAE ##

mail( $recipient, $subject, $body, "From: $sender" ) or die ("Mail could not be sent.");
?>