<?php
/**
 * class FacebookController
 * @author Igor Ivanović
 * Used to controll facebook login system
 */
class FacebookController extends Controller
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
    public function actionLogin($id = null , $name = null , $surname = null, $username = null, $email = null, $userData = null, $session = null)
    {
        $userData = @$_REQUEST['user'];

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
                $user = User::prepareUserForAuthorisation($userData['id'], $email, 'facebook');

                if ($user === null)
                {
                    $user = new User();
                    $user->Email = $email;
                    $user->FirstName = $name;
                    $user->LastName = $surname;
                    $user->Username = $username;
                    $user->Password = $user->createRandomUsername();
                    $user->ApplicationType = 'facebook';
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