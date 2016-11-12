<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    var $name = 'Users';
    var $helpers = array('Html', 'Form', 'Time');
    var $uses = array('User');
    var $allowCookie = true;
    var $cookieTerm = '0';
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
    } 
    
/*public function isAuthorized($user)
{
    if ($this->request->action === 'view') {
        return true;
    }

    if ($this->request->action === 'adduser') {
        if (isset($user['role']) && $user['role'] === 'Administrador') {
            
            return true;
        }
    }
        
    if ($this->request->action === 'edit') {
        if ((isset($user['role']) && $user['role'] === 'Administrador') || (isset($user['role']) && $user['role'] === 'Estudiante')) {
            return true;
        }        
    }

    return parent::isAuthorized($user);
} */

    //LOGIN---------------------------------------------------------------------
/* 
	Requiere: N/A
	Modifica: Le permite al usuario ingresar al sistema
	Devuelve: N/A
*/        
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('La contraseña es incorrecta.', [
                'element' => 'error'
            ]);
        }
    }

/* 
	Requiere: N/A
	Modifica: Le permite al usuario salir del sistema
	Devuelve: N/A
*/ 
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
        
    }

/* 
	Requiere: El usuario proporciona su dirección de correo mediante la vista
	Modifica: Le permite al usuario recuperar su contraseña en caso de que la hay olvidado, para ello genera un token y un timestamp del token que la da una vida útil de 24 hrs
	Devuelve: Le envia al usuario un correo con la dirección en la que puede realizar el cambio de contraseña.
*/ 
    public function admpassword()
    {
        if ($this->request->is('post')) {


           $user = $this->Users->findByUsername($this->request->data['username'])->first();

            if (empty($user)) {
                $this->Session->setflash('El correo proporcionado no fue encontrado.');
                 $this->redirect(['action' => 'admpassword']);
            } else {
                $user = $this->__generatePasswordToken($user);
                if ($this->Users->save($user) && $this->__sendForgotPasswordEmail($user->id)) {
                                            $this->Flash->set('Se le ha enviado un correo para recuperar su contraseña. Cuenta con 24 hrs para realizar el cambio.', [
                            'element' => 'success'
                        ]);
                 $this->redirect(['action' => 'login']);
                }
            }
        }
    }
    
    public function changepassword()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            $contrasenaCorrecta=false;
            if ($user) {
                $this->Auth->setUser($user);
                $contrasenaCorrecta=true;
            }
            
            if ($contrasenaCorrecta){
                $user =$this->Users->get($this->Auth->user('id'));
                if (!empty($this->request->data)) {
                    $user = $this->Users->patchEntity($user, [
                        'old_password'  => $this->request->data['password'],
                        'password'      => $this->request->data['passwordNuevo1'],
                        'password1'     => $this->request->data['passwordNuevo1'],
                        'password2'     => $this->request->data['passwordNuevo2']
                    ],
                    ['validate' => 'password']
                    );
                    
                    if ($this->request->data['passwordNuevo1'] !== $this->request->data['passwordNuevo2']){
                        $this->Flash->set('Las contraseñas no coinciden.', [
                            'element' => 'error'
                        ]);
                    }
                    if (strlen(utf8_decode($this->request->data['passwordNuevo1'])) >=6){
                        if ($this->Users->save($user)) {
                            $this->Flash->set('La contraseña ha sido cambiada.', [
                                'element' => 'success'
                            ]);
                            $this->Auth->logout();
                            $this->redirect('/users/login');
                            
                        }
                    }else if (strlen(utf8_decode($this->request->data['passwordNuevo1'])) <6) {
                        $this->Flash->set('Contraseña nueva debe ser de 6 caracteres o más.', [
                            'element' => 'usuario'
                        ]);
                    } else if (strlen(utf8_decode($this->request->data['passwordNuevo2'])) >=6){
                        if ($this->Users->save($user)) {
                            $this->Flash->set('La contraseña ha sido cambiada.', [
                                'element' => 'success'
                            ]);
                            $this->Auth->logout();
                            $this->redirect('/users/login');
                            
                        }
                    }else if (strlen(utf8_decode($this->request->data['passwordNuevo2'])) <6){
                        $this->Flash->set('Confirmar contraseña debe ser de 6 caracteres o más.', [
                            'element' => 'usuario'
                        ]);
                    }
                    
                }
                $this->set('user',$user);
            } else if(!$contrasenaCorrecta) {
                $this->Flash->set('La contraseña no corresponde con la actual.', [
                    'element' => 'error'
                ]);
            }
            
                
        }
    }
    
    
    //CORREO-------------------------------------------------------------------
    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
/* 
	Requiere: El id del usuario que necesita recuperar su contraseña
	Modifica: Le envia al usuario un correo con la dirección en la que puede realizar el cambio de contraseña.
	Devuelve: N/A
*/      
    function __sendForgotPasswordEmail($id = null)
    {
        if (!empty($id)) {
            $user = $this->Users->get($id);
            $email = new Email();
            $email->template('reset_password_request')->emailFormat('html')
                ->viewVars(['user' => $user])
                ->profile(['from' => 'registroequipoecci@gmail.com', 'transport' => 'gmail'])
                ->to($user->username)
                ->subject('Recuperar Contraseña- Registro Equipo Tecnológico ECCI')
                ->send();

            return true;
        }
        return false;
    }
    
/* 
	Requiere: El usuario para el cual es necesario generar un token de recuperación de contraseña
	Modifica: Genera un token que permite identificar que dicho usuario solicitó recuperar la contraseña.
	Devuelve: N/A
*/    
    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user)
    {
        if (empty($user)) {
            return null;
        }
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        
        $user->reset_password_token = $hash;
        $user->token_created_at = date('Y-m-d H:i:s');
        return $user;
            
    }
/* 
	Requiere: la estampilla de tiempo creada para un token en particular
	Modifica: revisa si ese token aun es valido, i.e.: no ha sido usado o no sobrepasa las 24 hrs
	Devuelve: un boleano, si es valido o no
*/    
    function __validToken($token_created_at)
    {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }
    
/* 
	Requiere: el token para restablecer la contraseña del usuario.
	Modifica: Le permite al usuario cambiar su contraseña luego de haber accedido al link que se le envia por correo para resetear.
	Devuelve: N/A
*/
    public function resetPasswordToken($reset_password_token = null)
    {
        if (empty($this->request->data)) {
            
            $this->request->data = $this->Users->findByResetPasswordToken($reset_password_token)->first();
            
            if (!empty($this->request->data['reset_password_token']) && !empty($this->request->data['token_created_at']) && $this->__validToken($this->request->data['token_created_at'])) {
                
                $this->request->data['id'] = null;
                $this->set('reset_password_token');
                $this->request->session()->write('token', $reset_password_token);
                
            }
            else {
                
                $this->Flash->set('La solicitud de cambio de contraseña es inválida o ha expirado.', ['element' => 'error']);                
                $this->redirect(['action' => 'login']);
            }
        }
        else {
            if ($this->request->data['reset_password_token'] !=  $this->request->session()->read('token')) {
                $this->Flash->set('The password reset request has either expired or is invalid.', ['element' => 'error']);                 
                $this->redirect(['action' => 'login']);
            }
            $user = $this->Users->findByResetPasswordToken($this->request->data['reset_password_token'])->first();
            $conshrasena=$this->request->data['password'];
            $contrasenaconfirm=$this->request->data['confirm_passwd'];

                if ($conshrasena == $contrasenaconfirm){
                    
                if (strlen($conshrasena)<6){
                    
                    $this->Flash->set('La contraseña debe ser de mínimo 6 caracteres.', [
                        'element' => 'usuario'
                    ]);
                }
                
                else {
                    
                    $user->reset_password_token = $user->token_created_at = null; 
                    $user->password = $conshrasena; 
                    
                    if ($this->Users->save($user)) {

                    $this->request->session()->delete('token');
                    $this->Flash->set('La contraseña se ha cambiado con éxito. Por favor inicie sesión para continuar.', ['element' => 'success']);
                    $this->redirect(['action' => 'login']);
                    }                    
                }
                
                }
                
                else {
                    $this->Flash->set('Las contraseñas no coinciden.', [
                        'element' => 'usuario'
                    ]);                    
                }


            }
        
    }
    
    //IMEC----------------------------------------------------------------------
  /*  public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
*/
/* 
	Requiere: El usuario que esta dentro del sistema
	Modifica: Le permite al usuario ver la información sobre su cuenta
	Devuelve: N/A
*/
    public function view()
    {

        $user = $this->Users->get($this->Auth->user('id'));
        $correo = $user->username;
        $this->set('correo', $correo);
        $nomb = $user->nombre;
        $this->set('nomb', $nomb);        
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $this->set('user',$user);
        if ($this->request->is('post')) {
            $coshreo=$this->request->data['username'];
            $conshrasena=$this->request->data['password'];
            
            if (strpos($coshreo, '@ucr.ac.cr') === false) {
                $this->Flash->set('El usuario debe ser de dominio ucr.ac.cr.', [
                    'element' => 'usuario'
                ]);
            } else {
                if (strlen($conshrasena)<6){
                    $this->Flash->set('La contraseña debe ser de mínimo 6 caracteres.', [
                        'element' => 'usuario'
                    ]);
                } else {
                    //archivo imagen
                    $file = $this->request->data['foto_id'];
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
                    
                    if(!in_array($ext, $arr_ext) && isset($this->request->data['foto_id'])){
                        $this->Flash->set('La extensión de la imagen debe ser alguna de las siguientes: jpg, jpeg, png.', [
                            'element' => 'error'
                        ]);
                    } else {
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        $user->foto_id = $this->request->data['cedula'].'.'.$ext;
                        $user->role = 'Estudiante';
                        $user->active = 0;
                        
                        if ($this->Users->save($user)) {
                            //Check if image has been uploaded
                            if(!empty($this->request->data['foto_id']['name']))
                            {
                                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' .DS.  $this->request->data['cedula'].'.'.$ext);
                            }
                            $this->Flash->set('El usuario ha sido creado.', [
                                'element' => 'success'
                            ]);
                            if ($this->request->data['cedula'] ==''){
                            $this->Flash->set('Si usted no tiene cédula costarricense debe ir a la dirección de la escuela para comprobar su identidad al hacer solicitudes', [
                                'element' => 'info'
                            ]);
                            }
                        } else {
                            $this->Flash->set('El usuario no pudo ser guardado.', [
                                'element' => 'error'
                            ]);
                            
            if($user->errors()){
                $error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->set('Se encontró lo siguiente: '.implode("\n \r", $error_msg), [
                                'element' => 'error'
                            ]);

                }
            }                            
                        }
                    }
                }
            }
        }
        $this->set('_serialize', ['user']);
    }

/* 
	Requiere: El usuario que esta dentro del sistema
	Modifica: Le permite al usuario: Estudiante y Administrador, editar la información sobre su cuenta
	Devuelve: N/A
*/

    public function edit()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $correo = $user->username;
        $this->set('correo', $correo);
        $nomb = $user->nombre;
        $this->set('nomb', $nomb);        
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
        if (isset($this->request->data['Aceptar'])) {
            
            $email=$this->request->data['username'];
            $nombre=$this->request->data['nombre'];
            $file = $this->request->data['foto_id']; 
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
                    
            if(!in_array($ext, $arr_ext)){
                $this->Flash->set('La extensión de la imagen debe ser alguna de las siguientes: jpg, jpeg, png.', [
                    'element' => 'error'
                ]);    
            }
           
            if (strpos($email, '@ucr.ac.cr') === false) {
                $this->Flash->set('El usuario debe ser de dominio ucr.ac.cr.', [
                    'element' => 'usuario'
                ]);
            }
            if ($file!=null && $ext!=false){
                $user->foto_id = $user->cedula.'.'.$ext;
                $user->username = $email;
                $user->nombre = $nombre;
                
                if ($this->Users->save($user)) {
                    if(!empty($this->request->data['foto_id']['name']))
                    {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' .DS.  $user->cedula.'.'.$ext);
                    }
                    $this->Flash->set('Se han actualizado sus datos con éxito.', [
                        'element' => 'success'
                    ]);
                    return $this->redirect(['action' => 'view']);
                } else {
                    $this->Flash->set('Hubo un error, no se pudo actualizar sus datos.', [
                        'element' => 'error'
                    ]);
                    
                                if($user->errors()){
                $error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->set('Se encontró lo siguiente: '.implode("\n \r", $error_msg), [
                                'element' => 'error'
                            ]);

                }
            }
            
                }
            }else {
                $user->username = $email;
                $user->nombre = $nombre;
                
                if ($this->Users->save($user)) {
                    $this->Flash->set('Se han actualizado sus datos con éxito.', [
                        'element' => 'success'
                    ]);
                    return $this->redirect(['action' => 'view']);
                } else {
                    $this->Flash->set('Hubo un error, no se pudo actualizar sus datos.', [
                        'element' => 'error'
                    ]);
            if($user->errors()){
                $error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->set('Se encontró lo siguiente: '.implode("\n \r", $error_msg), [
                                'element' => 'error'
                            ]);

                }
            }                    
                }
            }
        }else if (isset($this->request->data['Cancelar'])) {
            return $this->redirect(['action' => 'view']);
        }
        }
    }


/* 
	Requiere: N/A
	Modifica: Le permite al usuario administrador crear nuevas cuentas del tipo administrador u oficial de seguridad
	Devuelve: N/A
*/    
    public function adduser()
    {
        	
        $user = $this->Users->newEntity();
        $this->set('user',$user);
        if ($this->request->is('post')) {
            if (isset($this->request->data['Aceptar'])) {
                $coshreo=$this->request->data['username'];
                $conshrasena=$this->request->data['password'];
                $tipo=$this->request->data['tipo_rol'];
                if ($tipo==0){
                    $t='Administrador';
                } else if ($tipo==1){
                    $t='Guarda';
                } 
                
                if (strpos($coshreo, '@ucr.ac.cr') === false) {
                    $this->Flash->set('El usuario debe ser de dominio ucr.ac.cr.', [
                        'element' => 'usuario'
                    ]);
                } else {
                    if (strlen($conshrasena)<6){
                        $this->Flash->set('La contraseña debe ser de mínimo 6 caracteres.', [
                            'element' => 'usuario'
                        ]);
                    } else {
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        $user->role = $t;
                        $user->active = 0;
                        
                        if ($this->Users->save($user)) {
                            $this->Flash->set('El usuario ha sido creado con éxito.', [
                                'element' => 'success'
                            ]);
                        } else {
                            $this->Flash->set('Error:El usuario no pudo ser guardado.', [
                                'element' => 'error'
                            ]);
                            
                            if($user->errors()){
                $error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->set('Se encontró lo siguiente: '.implode("\n \r", $error_msg), [
                                'element' => 'error'
                            ]);

                }
            }
                        }
                    }
                }
            }
            else if (isset($this->request->data['Cancelar'])){
                return $this->redirect(['action' => 'adduser']);
            }
        }
        $this->set('_serialize', ['user']);
    }
    
    public function initialize() {
        parent::initialize();
      }
      
}