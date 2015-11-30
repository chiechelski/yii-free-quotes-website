<?php
/**
 * class FacebookController
 * @author Igor Ivanović
 * Used to controll facebook login system
 */
class GoogleController extends Controller
{

    /**
     * This method authenticate logged in facebook user
     * @param type $id string(int)
     * @param type $name string
     * @param type $surname string
     * @param type $username string
     * @param type $email string
     * @param type $session string
     */
    public function actionLogin()
    {
        $session = @$_REQUEST['session'];

        $userData = @$_REQUEST['user'];
        $email = @$userData['email'];

        $userType = @$_REQUEST['type'];

        if (!Yii::app()->request->isAjaxRequest)
        {
            echo json_encode(array('error'=>'this is not ajax request'));
            die();
        }
        else
        {
            if (empty($email))
            {
                echo json_encode(array('error'=>'email is not provided'));
                die();
            }

            if ($session == Yii::app()->session->sessionID)
            {
                $user = User::prepareUserForAuthorisation($userData['id'], $email, 'google');

                if ($user === null)
                {
                    $user = new User();
                    $user->Email = $email;
                    $user->FirstName = $userData['given_name'];
                    $user->LastName = $userData['family_name'];
                    // $user->CompanyName = $userData['family_name'];
                    $user->Username = $userData['id'];
                    $user->Password = $user->createRandomUsername();
                    $user->ApplicationType = 'google';
                    $user->ApplicationId = $userData['id'];

                    if (empty($userType))
                        $userType = 'supplier';

                    $user->UserType = $userType;

                    $user->insert();

                    $user->InitialPassword = $user->Password;
                }
                elseif (!empty($user->ApplicationId))
                {
                    $user->ApplicationId = $userData['id'];
                    $user->update();
                }

                $identity = new LoginForm;

                $identity->attributes = array('username' => $user->Username, 'password' => $user->InitialPassword);

                // validate user input and redirect to the previous page if valid
                if ($identity->validate() && $identity->login())
                {
                    if ($user->UserType == 'customer')
                        echo json_encode(array('error' => '0', 'redirect' => '/customer/overview'));
                    else
                        echo json_encode(array('error' => '0', 'redirect' => '/business/profile'));

                    die();
                }
                else
                {
                    echo json_encode(array('error'=>'user not logged in'));
                    die();
                }
            }
            else
            {
                echo json_encode(array('error'=>'session id is not the same'));
                die();
            }
        }
    }




}