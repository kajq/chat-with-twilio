<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{   //Constructor que instancia la clase modelo de canal
    public function __construct()
    {
        $this->channel = new Channel();
    }
    //función inicial que pide los canales al modelo y carga la vista
    public function index()
    {        
        echo "Please login to enter this module";
    }
    //Función para mostrar login de administrador
    public function login()
    {
        $msj = null;
        return view('channels.login', compact('msj'));
    }
    //Función para validar el login de administrador
    public function valide_user(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $valide = $this->channel->valide_user($username,$password);
        if($valide == true){
            $username;
            $channels = $this->channel->getChannels();
            //dd($channels);
            return view('channels.index', compact('channels','username'));
        } else {
            $msj = "Error in the User or Password";
            return view('channels.login', compact('msj'));
        }
        
    }
    //Función que pide crear un canal al modelo enviandole los parametros de un formulario en channels.index
    public function createChannel(Request $request)
    {
        $channelname = $request->channelname; 
        $channels = $this->channel->postChannel($channelname);
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }
    //Función que cambia la vista del channel.index por channel.edit, y envia por paramtro los datos del canal
    public function editChannel(Request $request)
    {
        $sid = $request->sid; 
        $channel = $this->channel->getChannel($sid);
        return view('channels.edit', compact('channel'));
    }
    //Función que pide editar un canal al modelo enviandole los parametros desde un formulario en channels.edit
    public function updateChannel(Request $request)
    {
        $sid = $request->sid;
        $channelname = $request->channelname;

        $this->channel->updateChannel($sid, $channelname);
        
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }
    //Función que pide al modelo eliminar un canal enviando el id
    public function deleteChannel(Request $request)
    {
        $id = $request->sid; 
        $channels = $this->channel->deleteChannel($id);
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }
}
