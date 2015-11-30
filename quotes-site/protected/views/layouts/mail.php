<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body style="margin: 0px; padding: 0px;">
    <table id="body" style="font-size:12px;color:#3C3C3C;background-color:#DFECDF; padding: 20px; margin: 0px; font-family:Arial, Helvetica, sans-serif; width:100%; height:100%;">
        <tbody>
            <tr>
                <td align="center" valign="top" cellspacing="0" cellpadding="0">
                    <table cellspacing="0" width="600" cellpadding="10" style="font-size:12px;color:#3C3C3C;padding:7px 7px 10px 7px;margin:40px 10px 40px 10px;background-color:#FFFFFF;border-width:1px;border-style:solid;border-color:#CFECF2;border-radius:5px;">
                        <tbody>
                            <tr>
                                <td style="color:#4D90FE;font-size:22px;border-bottom: 2px solid #dfdfdf;">
                                    <img src="http://www.donedusted.co.nz/images/logo.v2.png" title="Done & Dusted - Your one stop quoting site" style="height: 80px;" id="logoBanner" />
                                </td>
                            </tr>
                            <tr>
                                <td style="color:#777;font-size:16px;padding-top:5px;">
                                    <?php if (isset($data['Description'])) echo $data['Description'];  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $content ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="text-align:left;">
                                        <span style="font-size:12px;">
                                            Best regards,
                                        </span><br />
                                        <span style="font-size:12px;">
                                            The Done & Dusted Team
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px 20px; font-size: 11px; text-align:center;padding-top:10px;border-top:solid 1px #dfdfdf">
                                    ©2013 Done & Dusted | Customer Service +64 9 390 4DnD | http://www.donedusted.co.nz
                                    <br /> Level 2, 120 Mayoral Drive, Auckland 1010, New Zealand
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>