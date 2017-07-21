@extends('layouts.master')
@section('title', 'Crear partido')
@section('content')
@include('cabecera',array('section'=>'Inicio'))



<div class="contenedor row">
      @include('config/configuracion')
      <div class="col-md-10 col-md-offset-1">
            <h2>Enviar mensaje</h2>
            <br>
            {{-- Muestra errores --}}
                  @if (count($errors) > 0)
                        <ul>
                        @foreach ($errors->all() as $error)
                              <div class="alert alert-danger">
                                    <a href="#" class="alert-link">{{ $error }}</a>
                              </div>
                        @endforeach
                        </ul>
                @endif


                <div class="row form-group">
                      <div class="col-md-4">
                            <style>select:invalid { color: gray; }</style>
                            <select class="form-control" id="equipoLocal" placeholder="equipoLocal" name="equipoLocal" required>
                            <option value="Equipo" disabled selected hidden>Equipo</option>



                            </select>
                      </div>
                </div>
      </div>
</div>












  {{-- <div class="container-fluid">
    <div class="row">
		<div class="col-md-3">
        	 <div class="row chats-row">
                <div class="col-md-12">
                    <a href="#" class="list-group-item open-request">
                       <p>Name:  Matthew Townsen</p>
                       <p>Email:  mtownsen@teamsupport.com</p>
                       <p>Time:  2:47 PM</p>
                       <p>Message:  It's all broken</p>
                       <button class="btn btn-default">Accept</button>
                    </a>
                    <a href="#" class="list-group-item chat-request">Robert Johnson - Muroc Industries</a>
        	    </div>
                <div class="col-md-12">
                    <a href="#" class="list-group-item">Travis Pitts - TeamSupport</a>
                    <a href="#" class="list-group-item list-group-item-success">Heather Townsen - MyCCA</a>
                    <a href="#" class="list-group-item active">Eric Harrington - TeamSupport</a>
                </div>
        	 </div>
		</div>
        <div class="col-md-9 current-chat">
            <div class="row chat-toolbar-row">
                <div class="col-sm-12">
                    <div class="btn-group chat-toolbar" role="group" aria-label="...">
                        <button id="chat-leave" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-remove-sign"></i> Leave Chat
                        </button>
                        <button id="chat-invite" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-plus"></i> Invite
                        </button>
                        <button id="chat-customer" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-user"></i> Open Customer
                        </button>
                        <button id="chat-create-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-pencil"></i> Create Ticket
                        </button>
                        <button id="chat-add-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-plus"></i> Add to Ticket
                        </button>
                        <button id="chat-open-ticket" class="btn btn-default ticket-option" type="button">
                          <i class="glyphicon glyphicon-open"></i> Open Ticket
                        </button>
                    </div>
                </div>
            </div>
            <div class="row current-chat-area">
                <div class="col-md-12">
                      <ul class="media-list">
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="https://app.teamsupport.com/dc/1078/UserAvatar/1839999/48/1470773165634">
                                    </a>
                                    <div class="media-body">
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                        Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        <br>
                                       <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                        <hr>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="https://app.teamsupport.com/dc/1078/UserAvatar/2733968/48/1470773158079">
                                    </a>
                                    <div class="media-body">
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                        Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        <br>
                                       <small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="https://app.teamsupport.com/dc/1078/UserAvatar/1839999/48/1470773165634">
                                    </a>
                                    <div class="media-body">
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                        Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        <br>
                                       <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle" src="https://app.teamsupport.com/dc/1078/UserAvatar/2733968/48/1470773158079">
                                    </a>
                                    <div class="media-body">
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                        Duis vel condimentum massa.
                                        Donec sit amet ligula enim. Duis vel condimentum massa.
                                        <br>
                                       <small class="text-muted">Jhon Rexa | 23rd June at 5:00pm</small>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row current-chat-footer">
            <div class="panel-footer">
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Send</button>
                  </span>
                </div>
                </div>
            </div>
		</div>
	</div>
</div> --}}
