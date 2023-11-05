<?php
use App\Models\User;
use Illuminate\Support\Facades\DB;
$usuario_id = auth()->id();
#$user = DB::select("select * from users where id= ' $usuario_id' limit 1 ");
$user = User::where('id',$usuario_id)->first();

?>
@extends('layouts.user')