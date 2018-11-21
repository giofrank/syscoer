@extends('layouts.app')

@section('htmlheader_title')
    Emergencias
@endsection

@section('main-content')
<div class="box box-primary ">
    <div class="box-header">
    <h2>Emergencias</h2>
        <form >
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" value="buscar" >
                </span>

            </div>

        </form>
    </div>


    <div class=" box-body box-white">
        
        <a href="#" id="newReg" title="Eliminar Registro" class="pull-right btn bg-purple btn-flat margin" status="created">
            <i class="fa  fa-plus-circle"> Nuevo</i>
        </a> 
        <hr>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th width="20px" >ID</th>
                    <th>Fecha</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fuente</th>
                    <th>Distrito</th>
                    <th>Foto</th>
                    <center><th>Acciones</th></center>
                </tr>
            </thead>
            <tbody>

                @foreach($emergency as $key =>  $items)
                <tr>
                    <td>{{ $key+1}} </td>
                    <td>{{ $items -> date }} </td>
                    <td>{{ $items -> tittle }} </td>
                    <td>{{ $items -> description }} </td>
                    <td>{{ $items -> name }} </td>
                    <td>{{ $items -> name_district }} </td>
                    <td>
                        <img src="../storage_img/{{$items -> img_referential}}" width="100px" height="70px">
                    </td>
                    <td width="5%">
                        <center> 
                        <a href="#Model_update" title="Editar Registro" class="btnUpdate" idval="{{$items -> id}}" status="edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a> 
                        <a href="#" title="Eliminar Registro" idval="{{$items -> id}}" class="deleteReg">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a> 
                        </center>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {!! $emergency->render() !!} --}}
      </div>
</div>

<div class="modal fade modal-info" id="Model_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" enctype="multipart/form-data">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-list"></span> Formulario de Emergencias</h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
                <input type="hidden" name="pk_emergency" id="pk_emergency">
                <input type="hidden" name="type_form" id="type_form">
                <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
                <div id="load_Model_update" class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="description"> Fecha</label>
                                <input type="date" class="form-control input-sm" id="date" name="date" placeholder="Fecha">
                            </div>
                            <div class="col-xs-6">
                                <label for="district"> Distrito</label>
                                <select name="district" id="district_id" class="form-control" required="true" >
                                        <option value="">-----</option>
                                    @foreach ($district as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="tittle"> Titulo</label>
                        <input type="text" class="form-control input-sm" id="tittle" name="tittle" placeholder="">
                        <label for="action"> Acciones</label>
                        <input type="text" class="form-control input-sm" id="action" name="action" placeholder="">
                        <label for="description"> Descripcion</label>
                        <textarea class="form-control" id="description" id="description" name="description" rows="2"></textarea>
                        <label for="name"> Fuente</label>
                          <div class="row">
                            <div class="col-xs-5">
                              <input type="text" name="name" id="name" class="form-control" placeholder="Nombres">
                            </div>
                            <div class="col-xs-3">
                              <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
                            </div>
                            <div class="col-xs-4">
                              <input type="number" class="form-control" id="phone" name="phone" placeholder="Telefono">
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="lt"> Latitud</label>
                                <input type="text" class="form-control input-sm" id="latitud" name="lt" placeholder="">
                            </div>
                            <div class="col-xs-6">
                                <label for="lg"> Longuitud</label>
                                <input type="text" class="form-control input-sm" id="longuitud" name="lg" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                  <label for="exampleInputFile">Imagen Referencial</label>
                                  <input type="file" id="InputFile" name="img_ref">

                                  <p class="help-block">Suba en formatos JPG</p>
                                </div>
                                <div class="col-xs-5">
                                    <label for="ico"> Icono</label>
                                <input type="text" class="form-control input-sm" id="ico" name="ico" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div id="mensaje"></div>

                    </div>
                </div>
                <div class="modal-footer">
                        <a href="##" class="btn btn-danger cancel_data"  data-dismiss="modal">Cancelar</a>
                        <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection