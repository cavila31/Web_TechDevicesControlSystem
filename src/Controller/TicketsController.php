<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersHasTicketsController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Filesystem\File;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 */
class TicketsController extends AppController
{
    var $allowCookie = true;
    var $cookieTerm = '0';

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view2']);
        
    }


    //HISTORIAL---------------------------------------------------------------
    public function index()
    {
        $user = $this->Auth->user('id');

$ticket = $this->Tickets
    ->find('all')

     // contain needs to use `Students` instead (the `CourseMemberships`
     // data can be found in the `_joinData` property of the tag),
     // or dropped alltogether in case you don't actually need that
     // data in your results
    ->contain(['Users'])

     // this will do the magic
    ->matching('Users')

    ->where([
        
        'UsersHasTickets.user_id' => $user,
        'UsersHasTickets.tipo' => '1'
    ]);

        $tickets = $this->paginate($ticket);    
        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
        
    }
    
    
    //REVISION----------------------------------------------------------------
    public function indexSolicitud()
    {

        if (($this->request->is('post'))) {
            
            
            if (!empty($this->request->data['inputId'])){
                
                $tickets = $this->paginate($this->Tickets->find()->contain(['Users'])->where(['Tickets.id' => ($this->request->data['inputId'])]));    
                $this->set(compact('tickets'));
                $this->set('_serialize', ['tickets']);
            }
            
            
            if (($this->request->data['selectEstado'])!="" && ($this->request->data['tipo_activo'])==""){
                
    
            $tipo=$this->request->data['selectEstado'];
            if ($tipo==0){
                $t='Pendiente';
            } else if ($tipo==1){
                $t='Aprobado';
            } else if ($tipo==2){
                $t='Vencido';
            } 
            
                $tickets = $this->paginate($this->Tickets->find()->contain(['Users'])->where(['Tickets.estado' => $t]));    
                $this->set(compact('tickets'));
                $this->set('_serialize', ['tickets']);
            }
            
            
            if (($this->request->data['tipo_activo'])!="" && ($this->request->data['selectEstado'])==""){
               
            $tipo=$this->request->data['tipo_activo'];
            if ($tipo==0){
                $t='Computadora';
            } else if ($tipo==1){
                $t='Disco Duro';
            } else if ($tipo==2){
                $t='Impresora';
            } else if ($tipo==3){
                $t='CPU';
            } else if ($tipo==4){
                $t='Monitor';
            } else if ($tipo==5){
                $t='Video Beam';
            } else if ($tipo==6){
                $t='Servidor';
            } else if ($tipo==7){
                $t='Tableta';
            }
                
                $tickets = $this->paginate($this->Tickets->find()->contain(['Users'])->where(['Tickets.tipo_activo' => $t] ));    
                $this->set(compact('tickets'));
                $this->set('_serialize', ['tickets']);
            }
            
            
            if (($this->request->data['selectEstado'])!="" && ($this->request->data['tipo_activo'])!=""){
            
    
            $estado=$this->request->data['selectEstado'];
            if ($estado==0){
                $e='Pendiente';
            } else if ($estado==1){
                $e='Aprobado';
            } else if ($estado==2){
                $e='Vencido';
            } 
            
            $tipo=$this->request->data['tipo_activo'];
            if ($tipo==0){
                $t='Computadora';
            } else if ($tipo==1){
                $t='Disco Duro';
            } else if ($tipo==2){
                $t='Impresora';
            } else if ($tipo==3){
                $t='CPU';
            } else if ($tipo==4){
                $t='Monitor';
            } else if ($tipo==5){
                $t='Video Beam';
            } else if ($tipo==6){
                $t='Servidor';
            } else if ($tipo==7){
                $t='Tableta';
            }
                $tickets = $this->paginate($this->Tickets->find()->contain(['Users'])->where(['Tickets.estado' => $e, 'Tickets.tipo_activo' => $t]));    
                $this->set(compact('tickets'));
                $this->set('_serialize', ['tickets']);
            }            
            
            if ((empty($this->request->data['inputId'])) && (($this->request->data['selectEstado'])=="") && (($this->request->data['tipo_activo'])=="")){
                $tickets = $this->paginate($this->Tickets->find()->contain(['Users']));    
                $this->set(compact('tickets'));
                $this->set('_serialize', ['tickets']);                
                
            }
        }
        else 
        {
        $tickets = $this->paginate($this->Tickets->find()->contain(['Users']));    
        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
        }
        
    }
    
    
    

    //RECHAZO Y APROBACION---------------------------------------------------
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('ticket', $ticket);
        $this->set('_serialize', ['ticket']);
        
        if (isset($this->request->data['Aprobar'])) {
            if ($this->request->is('post') && $ticket->estado!=="Vencido") {
                $ticket->estado = 'Aprobado';
                if ($this->Tickets->save($ticket)) {
                    $this->loadModel('Users');
                    
                    //salvar en la tabla m a n
                    $user =$this->Users->get($this->Auth->user('id'));
                    $ticketz = TableRegistry::get('Tickets');
                    $ticketz->Users->link($ticket, [$user]);
                    $t = $ticketz->get($ticket->id, ['contain' => ['Users']]);
                    $t->users[1]->_joinData->tipo = 2;
                    $t->dirty('users', true);
                    $t->codigo_QR = $ticket->id.'.png';
                    $ticketz->save($t, ['associated' => ['Users']]);
                    
                    //QR
                    $identificadorLocal = $ticket->id;
                    $qrData = file_get_contents('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://control-equipo-cloned-helenarratedsexy.c9users.io/tickets/view1/'.$ticket->id);
                    $file = new File(WWW_ROOT . 'img' .DS.'QRs'.DS.$identificadorLocal.'.png', true);
                    $file->write($qrData);
                    
                    
                    //Agrandar imagen
                    $newImage = imagecreatefrompng('http://control-equipo-cloned-helenarratedsexy.c9users.io/img/QRs/'.$ticket->id.'.png');
                    $canvas = imagecreatetruecolor(150, 200);
                    $white = imagecolorallocate($canvas, 255, 255, 255);
                    imagefilledrectangle($canvas,0,0,150,200,$white);
                    
                    // resample image and place it in canvas
                    imagecopyresampled($canvas, $newImage, 0, 0, 0, 0, 150, 150, 150, 150);
                    imagePNG($canvas, WWW_ROOT . 'img' .DS.'QRs'.DS.$identificadorLocal.'.png');

                    //Texto
                    $newImage = imagecreatefrompng('http://control-equipo-cloned-helenarratedsexy.c9users.io/img/QRs/'.$ticket->id.'.png');
                    $text = $identificadorLocal;
                    putenv('GDFONTPATH='.WWW_ROOT.DS.'fonts'.DS);
                    $font = 'OpenSans-Regular';
                    $black = imagecolorallocate($newImage, 0, 0, 0);

                    imagettftext($newImage, 24, 0, 55, 188, $black, $font, $text);
                    $resultado = imagePNG($newImage, WWW_ROOT . 'img' .DS.'QRs'.DS.$identificadorLocal.'.png');
                    
                    
                    $this->Flash->set('La aprobación se hizo exitosamente.', [
                        'element' => 'success'
                    ]);
                    $this->redirect(['action' => 'index_solicitud']);
                  //  $this->__mandarEmailGenerico($id, 'correo_aceptacion', 'Solicitud Aceptada- Registro Equipo Tecnológico ECCI',$t->users[0]->id, '');
                } else {
                    $this->Flash->set('No se pudo aprobar la solicitud.', [
                        'element' => 'error'
                    ]);
                }
            }
        } else if (isset($this->request->data['Rechazar'])) {
            if ($this->request->is('post')) {
                $this->redirect( ['controller' => 'Tickets', 'action' => 'correo', $id]);
            }
        }
    }
    
    public function correo($id = null)
    {
        $ticketz = TableRegistry::get('Tickets');
        $t = $ticketz->get($id, ['contain' => ['Users']]);
        $u = $t->users[0]->id;
        if (isset($this->request->data['contenido_correo'])){
          //  $this->__mandarEmailGenerico($id, 'correo_rechazo', 'Solicitud Rechazada- Registro Equipo Tecnológico ECCI',$u, $this->request->data['contenido_correo']);
            $result = $this->Tickets->delete($t);
            
            $this->Flash->set('El rechazo se hizo exitosamente.', [
                'element' => 'success'
            ]);
            $this->redirect(['action' => 'index']);
        }
    }
    
    function __mandarEmailGenerico($ticketId, $templateName, $subject, $userId, $mensaje)
    {
        if (!empty($ticketId)) {
            $ticket = $this->Tickets->get($ticketId);
            
            $this->loadModel('Users');
            $user = $this->Users->get($userId);

            $email = new Email();
            $email->template($templateName)->emailFormat('html')
                ->viewVars(['ticket' => $ticket, 'user' => $user, 'mensaje' => $mensaje])
                ->profile(['from' => 'registroequipoecci@gmail.com', 'transport' => 'gmail'])
                ->to($user->username)
                ->subject($subject)
                ->send();

            return true;
        }
        return false;
    }  
    
    
    
    
    //VISTAS GUARDA----------------------------------------------------------
    public function view1($id = null)
    {
        $this->loadModel('Users');
        $user =$this->Users->get($this->Auth->user('id'));
        
        if ($user->role==="Guarda"){
            $ticket = $this->Tickets->get($id, [
                'contain' => ['Users']
            ]);
    
            $this->set('ticket', $ticket);
            $this->set('_serialize', ['ticket']);
            
            
            $now = Time::now();
            $phpdate = strtotime( $ticket->fecha_expiracion );
            $mysqldate = date( 'Y-m-d', $phpdate );
            $today_date = date("Y-m-d",strtotime($now->year."-".$now->month."-".$now->day));
            
            if($today_date > $mysqldate){
                $this->redirect(['action' => 'view3']);
            }
        } else {
            $this->redirect(['action' => 'view2']);
        }
    }
    
    public function consulta()
    {
        $this->loadModel('Users');
        $user =$this->Users->get($this->Auth->user('id'));
        
        if ($user->role==="Guarda"){
            if (isset($this->request->data['id'])){
                
                if (ctype_digit($this->request->data['id'])){
                    return $this->redirect(
                        ['controller' => 'Tickets', 'action' => 'view1', $this->request->data['id'] ]
                    );
                } else {
                    $this->Flash->set('La entrada debe ser de tipo numérico.', [
                        'element' => 'error'
                    ]);
                }
                
            }
        } else {
            $this->redirect(['action' => 'view2']);
        }
    }
    
    
    //VISTAS ERROR-----------------------------------------------------------
    public function view2()
    {
        $this->Flash->set('Debe ser un usuario Oficial de Seguridad, para poder ingresar a esta página.', [
            'element' => 'info'
        ]);
        $this->Flash->set('No tiene permiso de ingresar a esta página.', [
            'element' => 'error'
        ]);
    }
    public function view3()
    {
        $this->Flash->set('Permiso de equipo expirado.', [
            'element' => 'error'
        ]);
        $this->Flash->set('El permiso de ingreso del equipo ha expirado. Debe pedir otra permiso en línea.', [
            'element' => 'info'
        ]);
    }



    //---------------------------------------------------------------------
    function renovar($id = null)
    {
        $ticket = $this->Tickets->get($id);

        $ticket->estado = 'Aprobado';
        
       if ($this->Tickets->save($ticket)) {
           $this->Flash->set('La boleta se ha renovado con éxito.', [
                             'element' => 'success']);
                                          }
        $this->setAction('index');                                  
    }
    
    public function download($id=null) {
        $QR =    $id.'.png';                     
        $filePath = WWW_ROOT . 'img' .DS.'QRs'.DS.$QR;
        $this->response->file($filePath, array(
            'download' => true,
            'name' => 'codigo_QR.png',
        ));
        return $this->response;
    }    

    public function notificarVencido(){
      
    $ticketz = TableRegistry::get('Tickets');

    $query = $ticketz->find('all')->contain(['Users'])
            ->matching('Users')->where(['UsersHasTickets.tipo' => '1']);
    
    foreach ($query as $row) {
        if ($row->estado != 'Vencido')
        {
         $row->estado = 'Vencido';
         $this->Tickets->save($row);
         $userId = $row->users[0]->id;
        // $this->__mandarEmailGenerico($row->id, 'correo_vencido','Boleta Vencida- Registro Equipo Tecnológico ECCI',$userId,'');
        }
    }
    
    }
    
    public function notificarEliminado(){
      
    $ticketz = TableRegistry::get('Tickets');

    $query = $ticketz->find('all')->contain(['Users'])
            ->matching('Users')->where(['UsersHasTickets.tipo' => '1']);
    
    foreach ($query as $row) {
        if ($row->estado == 'Vencido')
        {
         $userId = $row->users[0]->id;
        // $this->__mandarEmailGenerico($row->id, 'correo_eliminado','Boleta Eliminada- Registro Equipo Tecnológico ECCI',$userId,'');
         $this->Tickets->delete($row);
        }
  }
    
    }  
    
    
    
    
    
    //NUEVA SOLICITUD-------------------------------------------------------
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        $this->set('ticket',$ticket);
        if ($this->request->is('post')) {
            $now = Time::now();
            
            $tipo=$this->request->data['tipo_activo'];
            if ($tipo==0){
                $t='Computadora';
            } else if ($tipo==1){
                $t='Disco Duro';
            } else if ($tipo==2){
                $t='Impresora';
            } else if ($tipo==3){
                $t='CPU';
            } else if ($tipo==4){
                $t='Monitor';
            } else if ($tipo==5){
                $t='Video Beam';
            } else if ($tipo==6){
                $t='Servidor';
            } else if ($tipo==7){
                $t='Tableta';
            }
            
            $this->loadModel('Users');
            $this->loadModel('UsersHasTickets');
            $user =$this->Users->get($this->Auth->user('id'));
            
            
            $data = [
                'modelo' => $this->request->data['modelo'],
                'marca'=> $this->request->data['marca'],
                'serie'=> $this->request->data['serie'],
                'placa_universitaria' => $this->request->data['placa_universitaria'], 
                'tipo_activo' => $t, 
                'observaciones' => $this->request->data['observaciones'],
                'estado' => 'Pendiente', 
                'fecha_solicitud' => $now->year."/".$now->month."/".$now->day,
                'fecha_expiracion' => $ticket->fecha_expiracion=($now->year+1)."/1/1",
                
                'users' => [
                    [
                        'id'=> $user->id,
                        'username' => $user->username,
                        'password' => $user->password,
                        'nombre' => $user->nombre,
                        'cedula' => $user->cedula,
                        'foto_id'=> $user->foto_id,
                        'role' => $user->role,
                        'active' => $user->active,
                        'reset_password_token' => $user->reset_password_token,
                        '_joinData' => [
                            'tipo' => 1
                        ]
                    ],
                    // Other courses.
                ]
            ];
            $ticket = $this->Tickets->newEntity($data, [
                'associated' => ['Users._joinData']
            ]);

            if ($this->Tickets->save($ticket)) {
                $this->Flash->set('La solicitud se hizo exitosamente.', [
                    'element' => 'success'
                ]);
                $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->set('No se pudo crear la solicitud.', [
                    'element' => 'error'
                ]);

            }
        }
    }

}
