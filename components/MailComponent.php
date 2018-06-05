<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\controllers\SiteController;
use SendGrid;
use app\models\EmailTemplates;

/*
    * MailComponent is used for sending all mail inside the application
 */
class MailComponent extends Component
{

    // Function is used for sending mail with forgot password link to the particular user.
    public function Forgotpasswordmail($to, $from, $name, $link)
    {
        $sendGrid = Yii::$app->sendGrid;
        $status   = '';
        // get forgot password mail
        $forgot_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 1
            ]
        )->One();

        if (! empty($forgot_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $forgot_mail_templates->body);
            $body = str_replace(
                "&lt;&lt;password_btn&gt;&gt;",
                '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
			    <tbody class="mcnButtonBlockOuter">
			        <tr>
			            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
			                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #0076BC;">
			                    <tbody>
			                        <tr>
			                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
			                                <a class="mcnButton " title="Reset Your Password" href="'.$link.'" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Reset Your Password</a>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
			            </td>
			        </tr>
			    </tbody>
			</table>',
                $body
            );

            $message = $sendGrid->compose();
            $status  = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($forgot_mail_templates->subject)->setHtmlBody($body)->send($sendGrid);
        }//end if

        return $status;

    }//end Forgotpasswordmail()


    // Function is used for sending mail with forgot password link to the particular user.
    public function Verifymail($to, $from, $name, $link)
    {
        $sendGrid = Yii::$app->sendGrid;

        $status = '';
        // get forgot password mail
        $verify_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 2
            ]
        )->One();

        if (! empty($verify_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $verify_mail_templates->body);
            $body = str_replace(
                "&lt;&lt;verify_mail_btn&gt;&gt;",
                '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
			    <tbody class="mcnButtonBlockOuter">
			        <tr>
			            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
			                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #0076BC;">
			                    <tbody>
			                        <tr>
			                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
			                                <a class="mcnButton " title="Verify Email" href="'.$link.'" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Verify Email</a>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
			            </td>
			        </tr>
			    </tbody>
			</table>',
                $body
            );

            $message = $sendGrid->compose();
			//return $message;
            $status  = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($verify_mail_templates->subject)->setHtmlBody($body);
			//return $status;
			$status->send($sendGrid);
        }//end if

        return $status;

    }//end Verifymail()


    // Function is used for sending mail with forgot password link to the particular user.
    public function Resendpasswordmail($to, $from, $name, $link)
    {
        $sendGrid = Yii::$app->sendGrid;
        $status   = '';
        // get forgot password mail
        $forgot_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 3
            ]
        )->One();

        if (! empty($forgot_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $forgot_mail_templates->body);
            $body = str_replace(
                "&lt;&lt;password_btn&gt;&gt;",
                '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
			    <tbody class="mcnButtonBlockOuter">
			        <tr>
			            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
			                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #0076BC;">
			                    <tbody>
			                        <tr>
			                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
			                                <a class="mcnButton " title="Reset Your Password" href="'.$link.'" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Reset Your Password</a>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
			            </td>
			        </tr>
			    </tbody>
			</table>',
                $body
            );

            $message = $sendGrid->compose();
            $status  = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($forgot_mail_templates->subject)->setHtmlBody($body)->send($sendGrid);
        }//end if

        return $status;

    }//end Resendpasswordmail()


    // Function is used for sending mail to the user when email is deactivated.
    public function Deactivateusermail($to, $from, $name)
    {
        $sendGrid = Yii::$app->sendGrid;
        $status   = '';
        // get forgot password mail
        $deactivate_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 4
            ]
        )->One();

        if (! empty($deactivate_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $deactivate_mail_templates->body);

            $message = $sendGrid->compose();
            $status  = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($deactivate_mail_templates->subject)->setHtmlBody($body)->send($sendGrid);
        }

        return $status;

    }//end Deactivateusermail()


    // Function is used for sending mail to the user when email is deactivated.
    public function Passwordchangemail($to, $from, $name)
    {
        $sendGrid = Yii::$app->sendGrid;
        $status   = '';
        // get forgot password mail
        $password_change_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 5
            ]
        )->One();

        if (! empty($password_change_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $password_change_mail_templates->body);

            $message = $sendGrid->compose();
            $status  = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($password_change_mail_templates->subject)->setHtmlBody($body)->send($sendGrid);
        }

        return $status;

    }//end Passwordchangemail()


    // Function is used for sending report.
    public function ReportMail($to, $from, $name, $reportsDetails, $subject)
    {
        $sendGrid = Yii::$app->sendGrid;
        $status   = '';
        // get forgot password mail
        $password_change_mail_templates = EmailTemplates::find()->where(
            [
                'email_type_id' => 6
            ]
        )->One();

        if (! empty($password_change_mail_templates)) {
            // removing place holders in mail body
            $body = str_replace("&lt;&lt;name&gt;&gt;", $name, $password_change_mail_templates->body);

            $body = str_replace("&lt;&lt;report_heading&gt;&gt;", $reportsDetails['report_heading'], $body);

            $message = $sendGrid->compose();

            $status = $message->setFrom($from)->setTo($to)->setReplyTo($from)->setSubject($subject)->setHtmlBody($body)->attach($reportsDetails['report_file'])->send($sendGrid);
        }

        return $status;

    }//end ReportMail()


}//end class
