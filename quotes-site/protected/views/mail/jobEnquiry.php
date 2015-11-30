<p>
    Hi <?= $Name ?>,<br />
</p>
<p>
    Thank you for requesting a quote at Done & Dusted, your one stop quoting site for finding trusted local service providers in New Zealand.
</p>
<p>
    We have received your request and service providers will be in touch shortly with quotes.
    We will be in touch if more information is required for the job posted, allowing service providers
    to give you more accurate quotes.
</p>
<?php if (is_null($signupFromEnquiry)): ?>
    <p>
         Click on the link below or copy it and paste on your favourite browser to access your account and follow your enquiry status.
    </p>
    <p>
        <a href="http://www.donedusted.co.nz/login">http://www.donedusted.co.nz/login</a>
    </p>
<?php elseif (!$signupFromEnquiry): ?>
    <p>
        Click on the link below or copy it and paste on your favourite browser to verify your email and to access your account.
    </p>
    <p>
        <a href="http://www.donedusted.co.nz/login/verify/<?= @$Id ?>/<?= @$LinkHash ?>">http://www.donedusted.co.nz/login/verify/<?= @$Id ?>/<?= @$LinkHash ?></a>
    </p>
<?php else: ?>
    <p>
        Click on the link below or copy it and paste on your favourite browser to verify your email and to set up a password to access you account.
    </p>
    <p>
        <a href="http://www.donedusted.co.nz/login/password/<?= @$Id ?>/<?= @$LinkHash ?>">http://www.donedusted.co.nz/login/password/<?= @$Id ?>/<?= @$LinkHash ?></a>
    </p>
<?php endif; ?>
<p>
    We are looking forward to assisting you in finding the best services providers for you!
</p>
