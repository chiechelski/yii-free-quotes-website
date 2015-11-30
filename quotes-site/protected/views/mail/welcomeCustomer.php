<p>
    Hi <?= $Name ?>,<br />
</p>
<p>
    Thank you for signing up to Done & Dusted.
</p>
<p>
    Done & Dusted is your one stop quoting site for finding trusted local service providers in New Zealand. We are totally FREE for getting quotes and for registering your business, in case you have a service to offer.
</p>
<?php if (!$signupFromEnquiry): ?>
    <p>
        Click on the link below or copy it and paste on your favourite browser to verify your email.
    </p>
    <p>
        <a href="http://www.donedusted.co.nz/login/verify/<?= @$Id ?>/<?= @$LinkHash ?>">http://www.donedusted.co.nz/login/verify/<?= @$Id ?>/<?= @$LinkHash ?></a>
    </p>
<? else: ?>
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
