<?php
use App\Models\User;
use Illuminate\Support\Facades\DB;
$usuario_id = auth()->id();
$user = User::where('id',$usuario_id)->first();
?>
@extends('layouts.user')